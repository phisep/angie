<?php

namespace App\Http\Controllers;
use App\Usuario as User;
use App\Emisario as Emisario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class Usuario extends Controller {
	 
	public function index()		{
		return view('faq');
	}
	
	public function perfil($id)	{
		$user = new User;
		$data['user'] = $user::find($id);
		$date = $data['user']['created_at'];
		$date = $date->format('d F Y');
		$data['user']['fecha_registro'] = $date;
		return view('usuario-perfil', $data);
	}
	
	public function notificaciones()	{
		if (!Auth::check()) 
			return redirect('/login');
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		return view('usuario-notificaciones', $data); 
	}
	
	public function editar()	{ 
		if (!Auth::check()) 
			return redirect('/login');
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		return view('usuario-editar', $data); 
	}
	
	public function encargos()	{
		if (!Auth::check()) 
			return redirect('/login');
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		$data['mis_encargos'] = $user::find(Auth::id())->mis_encargos()->get();
		$data['mis_postulaciones'] = $user::find(Auth::id())->mis_postulaciones()->get();
		$data['mis_adjudicaciones'] = $user::find(Auth::id())->mis_adjudicaciones()->get();
		$data['total_mis_adjudicaciones'] = $user::find(Auth::id())->mis_adjudicaciones()->count();
		$data['total_mis_postulaciones'] = $user::find(Auth::id())->mis_postulaciones()->count();
		$data['total_mis_encargos'] = $user::find(Auth::id())->mis_encargos()->count();
		return view('usuario-encargos', $data); 
	}
	
	public function finanzas($id)	{
		if (!Auth::check()) 
			return redirect('/login');
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		return view('usuario-finanzas', $data); 
	} 
	
	public function security()	{
		if (!Auth::check()) 
			return redirect('/login');
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		return view('usuario-security', $data); 
	}
	
	/* BI */
	public function update_password(Request $request)	{
		$this->validate($request,	[
									'actual'			=>	'required',
									'password' 	=> 	'required|same:confirmar-password' 
									]
		);
		
		if (Auth::attempt(['email' => $request->email,'password' => $request->actual])) {
			$user = new User;
			$user = $user::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save(); 
			return redirect('usuario/security')->with('status-password', 'Tu contraseña ha sido actualizada'); 
		} else {
			return redirect('usuario/security')->with('status-password', 'Contraseña incorrecta');
		}
		
	}
	
	public function eliminar_postulacion($id)	 {
		if (!Auth::check()) 
			return redirect('/login');

		$emisario = new Emisario; 
		$postulacion = $emisario::where(['encargo_id'=>$id,'usuario_id'=>Auth::id()])->first()->delete();
		return redirect('usuario/encargos' )->with('status', 'Tu postulación ha sido eliminada'); 

	}
	
	public function update_email(Request $request)	{
		if (Auth::attempt(['email' => strtoupper($request->correo_actual),'password' => $request->passwd])) {
           	$usuario = new User;
			$result = $usuario::where('email',$request->correo)->get()->count();
			if ($result==1) {
				return 3;
			} else	{
				$user = new User;
				$user = $user::find($request->user_id);
				$user->email = strtoupper ($request->correo);
				$user->save();
				return 1;
			}
        } else {
			return 0;
		}
	}
	
	public function update_divisa(Request $request)		{
		if (!Auth::check()) 
			return redirect('/login');
		$user = new User;
		$user = $user::find(Auth::id());
		$user->divisa = $request->divisa;
		$user->cod_divisa = $this->get_cod_divisa($request->divisa);
		$user->save();

	}
	
	public function update_mailing(Request $request)	{
		$formato = 1;
		$noticias_anuncios = 1; 
		$noticias_anuncios_locales = 1;
		$comprador_adjudica_encargo = 1;
		$publicar_encargo = 1;
		$marketing = 1;
		$boletin = 1;
		if ($request->formato != 1) 
			$formato = 0;
		if ($request->noticias_anuncios != 1)
			$noticias_anuncios = 0;
		if ($request->noticias_anuncios_locales != 1) 
			$noticias_anuncios_locales = 0;
		if ($request->comprador_adjudica_encargo != 1) 
			$comprador_adjudica_encargo = 0;
		if ($request->publicar_encargo != 1) 
			$publicar_encargo = 0;
		if ($request->marketing != 1) 
			$marketing = 0;
		if ($request->boletin != 1) 
			$boletin = 0;
		$user = new User;
		$user = $user::find($request->user_id);
		$user->formato = $formato;
		$user->noticias_anuncios = $noticias_anuncios;
		$user->noticias_anuncios_locales = $noticias_anuncios_locales;
		$user->comprador_adjudica_encargo = $comprador_adjudica_encargo;
		$user->publicar_encargo = $publicar_encargo;
		$user->marketing = $marketing;
		$user->boletin = $boletin;
		$user->save();
	}
	
	public function update(Request $request)	{
		$Usuario = new User;
		$Usuario = $Usuario::find($request->user_id);
		$Usuario->rut = strtoupper($request->rut);
		$Usuario->nombre = strtoupper($request->nombre);
		$Usuario->descripcion = $request->descripcion;
		$Usuario->fecha_nacimiento = strtoupper($request->fecha_nacimiento);
		$Usuario->sexo = strtoupper($request->sexo);
		$Usuario->calle = strtoupper($request->calle);
		$Usuario->numero = $request->numero;
		$Usuario->block = strtoupper($request->block);
		$Usuario->comuna = strtoupper($request->comuna);
		$Usuario->pais = strtoupper($request->pais);
		$Usuario->codigo_postal = strtoupper($request->codigo_postal);
		$Usuario->telefono = strtoupper($request->telefono);
		$Usuario->save();
		return redirect('usuario/editar' )->with('status-update-usuario', 'Tu perfil ha sido actualizado'); 
	}
	
	public function foto()	{
		if (!Auth::check()) 
			return redirect('/login');
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		return view('usuario-foto', $data); 
	}
	
	public function video()		{
		if (!Auth::check()) 
			return redirect('/login');
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		return view('usuario-video', $data); 
	}
	
	public function upload(Request $request)		{
		$path = $request->file('archivo')->store('public');  
		$user = new User;
		$user = $user::find(Auth::id());
		$user->foto = $path;
		$user->save();
		return redirect('usuario/foto')->with('status-foto', 'El archivo se ha cargado exitosamente.');
	}
	
	public function upload_video(Request $request)		{
		$path = $request->file('archivo')->store('video');  
		$user = new User;
		$user = $user::find(Auth::id());
		$user->video = $path;
		$user->save();
		return redirect('usuario/video')->with('status-foto', 'El archivo se ha cargado exitosamente.');
	}
	
	private function get_cod_divisa($divisa)	{
		switch($divisa)		{
			case "PESO CHILENO"				: return "CLP"; break;
			case "PESO BOLIVIANO"			: return "BOB"; break;
			case "PESO COLOMBIANO"			: return "COP"; break;
			case "REAL BRASILEÑO"			: return "BRL"; break;
			case "PESO ARGENTINO"			: return "ARS"; break;
			case "SOL PERUANO"				: return "PEN"; break;
			case "DOLAR ESTADOUNIDENSE"		: return "USD"; break;
			case "EURO"						: return "EUR"; break;
		}
	}
	
}