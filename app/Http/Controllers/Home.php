<?php

namespace App\Http\Controllers;

use App\Usuario as User;
use App\Encargo as Encargo;
use Illuminate\Support\Facades\Auth;

class Home extends Controller {
     
	 
	public function index()		{
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		$data['perfiles'] = $user::all();
		$data['encargos'] = $this->listar();
		return view('home', $data);

	}
	
	private function listar()	{
		$encargos = new Encargo;
		return $encargos::all();
	}
}