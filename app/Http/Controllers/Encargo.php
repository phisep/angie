<?php
namespace App\Http\Controllers;

use DB;
use App\Encargo as Gestion;
use App\Comprador as Comprador; 
use App\Emisario as Emisario; 
use App\Usuario as User;
use App\Adjudicacion as Adjudica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Encargo extends Controller {
	
	private $id;										// id del encargo
	private $validacion_postulacion_propia = false;		// estado de la validacion para postulacion a propio encargo
	private $validacion_postulacion_unica = false;		// estado de la validacion para postulacion unica a encargo
	 
	public function index()		{
		
		/*
		switch($tipo )	{
			case "compra"	: 	$data['registros'] = $this->listar_compra();
								$data['tipo'] = "compra";
								$user = new User;
								$data['user'] = $user::find(Auth::id());
								return view('encargo', $data);
								break;
			case "tramite"	:	$data['registros'] = $this->listar_tramite();
								$data['tipo'] = "tramite";
								$user = new User;
								$data['user'] = $user::find(Auth::id());
								return view('encargo', $data);
								break;
		}
		*/
		$user = new User;
		$data['registros'] = $this->listar();
		$data['user'] = $user::find(Auth::id());
		return view('encargo', $data);
	} 
	
	public function publicar($tipo = null)	{
		if (Auth::check()) {
			$user = new User;
			$data['user'] = $user::find(Auth::id());
			$data['tipo'] = $tipo;
			return view('publicar-encargo', $data);
		} else {
			$user = new User;
			$data['user'] = $user::find(Auth::id());
			return view('publicar-encargo-error', $data);
		}
	}
	
	public function detalle($id)	{
		$detalle = new Gestion;
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		$data['comprador'] = $detalle::find($id)->comprador()->first();
		$data['encargo'] = $detalle::find($id);
		$data['emisarios'] = $detalle::find($id)->emisarios()->get(); 
		$data['adjudicado'] = $detalle::find($id)->adjudicaciones()->first(); 
		$data['total_emisarios'] = $detalle::find($id)->emisarios()->count();  
		return view('publicar-detalle', $data);
	}
	
	public function postular($id)	{ 
		if (Auth::check()) {
			/* validar que el encargo no sea del propio usuario */
			$this->id = $id;
			$user = new User;
			$data['user'] = $user::find( Auth::id() );
			$this->validar_postulacion_propia();
			$this->validar_postulacion_unica();
			if (!$this->validacion_postulacion_propia)	{
				$data['msg'] = "No puedes postular a tu propio encargo.";
				return view('postular-encargo-error', $data);
			}
			if (!$this->validacion_postulacion_unica)	{
				$data['msg'] = "Ya te has postulado al encargo.";
				return view('postular-encargo-error', $data);
			}
			$Postula = New Emisario;
			$Postula->encargo_id = $id;
			$Postula->usuario_id = Auth::id();
			$Postula->save();
			$data['codigo'] = $id;
			return view('postular-encargo-success', $data); 
		} else {
			$data['msg'] = "Para postular a un encargo de compra o trámite debes iniciar sesión.";
			return view('postular-encargo-error', $data);
		}
	}
	
	public function emisarios($id)	{
		$emisarios = new Gestion;
		$data['emisarios'] = $emisarios::find($id)->emisarios(); 
		return $data;
	}
	
	public function adjudicar($usuario_id, $encargo_id)		{
		if (!Auth::check()) 
			return redirect('/login');
		$adjudicar = new Adjudica;
		$adjudicar->usuario_id = $usuario_id;
		$adjudicar->encargo_id = $encargo_id;
		$adjudicar->save();
		$encargo = new Gestion;
		$encargo = $encargo::find($encargo_id);
		$encargo->estado = "ADJUDICADO";
		$encargo->save();
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		$data['adjudicado'] = $user::find($usuario_id);
		return view('adjudicar-encargo', $data); 
	}
	
	public function cierre($encargo_id)		{
		if (!Auth::check()) 
			return redirect('/login');
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		return view('usuario-encargo-cierre', $data);
		
	}
	
	public function eliminar_adjudicacion($encargo_id)	{
		if (!Auth::check()) 
			return redirect('/login');
		$adjudicacion = new Adjudica;
		$adjudicacion::where('encargo_id', $encargo_id)->delete();
		$encargo = new Gestion;
		$encargo = $encargo::find($encargo_id);
		$encargo->estado = 'DISPONIBLE';
		$encargo->save();
		return redirect('usuario/encargos')->with('status-publicacion', 'Se ha eliminado la adjudicación');
	}
	
	/* CRUD */
	
	public function create(Request $request)	{
		 $this->validate($request,	[
									'producto'			=>	'required',
									'descripcion' 		=> 	'required',
									'ciudad' 			=> 	'required',
									'pais' 				=> 	'required', 
									'tipo_encargo'		=> 	'required',
									'comision' 			=> 	'required',
									'tiempo_entrega' 	=> 	'required'
									]
		);
		$Encargo = new Gestion;
		$Encargo->producto = strtoupper($request->producto);
		$Encargo->descripcion = strtoupper($request->descripcion);
		$Encargo->ciudad = strtoupper($request->ciudad);
		$Encargo->pais = strtoupper($request->pais);
		$Encargo->tipo_encargo = strtoupper($request->tipo_encargo);
		$Encargo->comision = $request->comision;
		$Encargo->tiempo_entrega = strtoupper($request->tiempo_entrega);
		$Encargo->save();
		/* creamos la relacion encargo-comprador */
		$Compra = new Comprador;
		$Compra->encargo_id = $Encargo->id;
		$Compra->usuario_id = Auth::id();
		$Compra->save(); 
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		return view('publicar-encargo-success', $data); 
	}
	
	public function eliminar($id)	{
		if (!Auth::check()) 
			return redirect('/login');
		$encargo = new Gestion;
		$encargo = $encargo::find($id)->delete();
		return redirect('usuario/encargos')->with('status-publicacion', 'Tu encargo ha sido eliminado');
	}
	
	/* SQL */
	
	private function listar()	{
		$encargos = new Gestion;
		return $encargos::all();
	}
	
	
	private function listar_compra()	{

		$result = DB::table('encargos')	->where('tipo_encargo', 'COMPRA')
										->join('compradores', 'encargos.id', '=', 'compradores.encargo_id')
										->select('encargos.*', 'compradores.usuario_id')
										->get();
		return $result;
	}
	
	private function listar_tramite()	{
		$encargos = new Gestion;
		$result = $encargos::where('tipo_encargo','TRAMITE')->get();
		return $result;
	}
	
	private function validar_postulacion_propia()		{

		$emisario = DB::table('compradores')	->where('encargo_id', $this->id )->get()->first();
		if ( $emisario->usuario_id != Auth::id() ) 
			$this->validacion_postulacion_propia = true;

	}
	
	private function validar_postulacion_unica()	{
		$postulacion = DB::table('emisarios')	->where([
														['encargo_id', $this->id],
														['usuario_id',  Auth::id()]
														] )->get()->first();

		if ($postulacion==NULL)		{
			$this->validacion_postulacion_unica = true;
		}
	
	}
	
	
}