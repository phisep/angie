<?php
namespace App\Http\Controllers;
use App\Usuario as Usuario;
use App\Mail\Recover as RecoverMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class Login extends Controller {
	 
	public function index()		{ 
		if (Auth::check()) 
			return redirect('/encargo/tramite');
		else 
			return view('login');
	}
	
	public function signin(Request $request)		{
		if (Auth::attempt(['email' => strtoupper($request->user),'password' => $request->password,'estado' => 'ACTIVO'])) {
            return redirect('/encargo/tramite'); 
        } else {
			return view('login-error');
		}
	}
	
	public function logout()	{
		Auth::logout(); 
		return redirect('/');
	}
	
	public function message(Request $request)	{
		$user = new Usuario;
		$user = $user::where( 'email', $request->user )->first();
		$jash = base64_encode( $request->user );
		$data = ['nombre'=>$user->nombre,'jash'=>$jash,'email'=>$request->user];
		Mail::to( $request->user )->send(new RecoverMail( $data ) ); 
		return view('login-message', $data);
	}
	
	public function recover()	{
		return view('login-recover');
	}
	
	public function change($jash)	{
		$email =  base64_decode( $jash  );
		$user = new Usuario;
		$data['user'] = $user::where( 'email', $email )->first();
		return view('login-change-password', $data);
	}
	
	public function update(Request $request)	{

		$user = new Usuario;
		$user = $user::find($request->id);
		$user->password = Hash::make($request->password);
		$user->save();
		return view('login-change-password-success');
	}
}