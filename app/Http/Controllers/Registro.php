<?php

namespace App\Http\Controllers;

use App\Usuario as Usuario;
use App\Mail\MailRegistro as WelcomeEmail;
use App\Http\Controllers\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Registro extends Controller { 
     
	 
	public function index()		{
		
		if (Auth::check()) 
			return redirect('/encargo');
		else 
			return view('registro');
		
	}
	
	function valida( $jash )	{
		
		$Usuario = new Usuario;
		$email = base64_decode ( $jash );
		$result = $Usuario::where( 'email',$email)->get()->count(); 

		if ( $result == 0 )	{
			return view('registro-valida-error');
		} else {
			$update = $Usuario::where( 'email',$email)->get()->first();
			$update->estado='ACTIVO';
			$update->save();
			return view('registro-valida-ok'); 
		}
	
	}
	
	// CRUD
	
	public function create(Request $request)	{ 
	
		 $this->validate($request,	[
									'rut'				=>	'required',
									'nombre' 			=> 	'required',
									'fecha_nacimiento' 	=> 	'required',
									'sexo' 				=> 	'required', 
									'ciudad' 			=> 	'required',
									'pais' 				=> 	'required',
									'foto' 				=> 	'required',
									'email' 			=> 	'required|unique:usuarios,email|same:confirmar-email',
									'password' 			=> 	'required|same:confirmar-password' 
									]
		);
		
		$Usuario = new Usuario;
		$Usuario->rut = strtoupper($request->rut);
		$Usuario->nombre = strtoupper($request->nombre);
		$Usuario->fecha_nacimiento = $request->fecha_nacimiento;
		$Usuario->sexo = $request->sexo;
		$Usuario->ciudad = strtoupper($request->ciudad);
		$Usuario->pais = strtoupper($request->pais);
		$Usuario->foto = $request->foto;
		$Usuario->email = strtoupper($request->email); 
		$Usuario->password = Hash::make($request->password);
		$jash = base64_encode( strtoupper($request->email));
		$Usuario->save();
		$receivers = ['$request->email'];
		$data = array('nombre'=>$Usuario->nombre,'jash'=>$jash);
		Mail::to( $Usuario->email )->send(new WelcomeEmail( $data ) ); 
		return view('registro-ok', array('nombre'=>$Usuario->nombre,'email'=>$Usuario->email) );  
	}
	
	
}