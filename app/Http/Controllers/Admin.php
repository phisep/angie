<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Usuario as Usuario;
use App\Encargo as Encargo;

class Admin extends Controller {
	
	public function index(Request $request)	{
		$user = $request->session()->get('user');
		if ( $user == 'admin')	{
			$data['user'] = $request->session()->get('user'); 
			$registros = new Usuario;
			$data['usuarios'] = $registros::all();
			return view('admin-login-success', $data );  
		} else 
			return view('admin-login');
	}
	
	public function login(Request $request)		{ 
		 
		 $this->validate($request,	[
									'user'				=>	'required',
									'password' 			=> 	'required'
									]
		);
		if ( $request->user == "admin" and $request->password == "araucania2018;")	{
			session(['user' => 'admin']);
			$data['user'] = $request->session()->get('user'); 
			$registros = new Usuario;
			$data['usuarios'] = $registros::all();
			return view('admin-login-success', $data );  
		} else {
			return view('admin-login-error');
		}
	}
	
	public function logout(Request $request)	{
		$request->session()->flush();
		return redirect('/');
	}
	
	public function usuarios(Request $request)	{ 
		$registros = new Usuario;
		$data['usuarios'] = $registros::all();
		$data['user'] = $request->session()->get('user'); 
		return view('admin-login-success', $data );  
	}
	
	public function encargos(Request $request)		{
		$registros = new Encargo;
		$data['encargos'] = $registros::all();
		$data['user'] = $request->session()->get('user'); 
		return view('admin-encargos', $data);
		
	}
	
}