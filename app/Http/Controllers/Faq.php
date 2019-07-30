<?php

namespace App\Http\Controllers;
use App\Usuario as User;
use Illuminate\Support\Facades\Auth;

class Faq extends Controller {
     
	 
	public function index()		{
		
		$user = new User;
		$data['user'] = $user::find(Auth::id());
		return view('faq', $data);
		
	}
}