<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Auth\UserProvider;
use App\Http\Controllers\RegisterController;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;
use Illuminate\Auth\GenericUser;
use App\Config\Constants;
use App\Http\Controllers\MailerController as Mailer;


class AuthController extends Controller {


  public function doLogin() {

    // Getting all post data
    $data = \Input::all();
    // Applying validation rules.
    $rules = array(
		              'email'    => 'required|email',
		              'password' => 'required|min:6',
	         );
    $validator = \Validator::make($data, $rules);
    if ($validator->fails()){
        return redirect('/auth/login')->withErrors($validator->getMessageBag()->toArray());
    }
    else {
         $userData = array(
		                        'email'    => \Input::get('email'),
		                        'password' => \Input::get('password')
		     );
      $rememberMe = true;
      if (Auth::attempt($userData,$rememberMe)) {
          return \Redirect::to('/');
       }
      else
         return redirect('/auth/login')->withErrors(array("Username/Password not correct"));
      }
  }

  function showLogin(){
  	   return view('auth.login');
  }
}