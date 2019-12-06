<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    //
    /*public function login(Request $req){
      $user = User::all();
      echo $req->email . "<br>";
      echo $req->password . "<br>";
      echo "start<br>";
      foreach($user as $us){
        echo "$us->name <br>";
      }
      echo "login";
    }*/
    public function loginform(){
      if(Auth::check()){
        return back()->with('message','이미 로그인 하셨습니다.');
      }else{
        return view('login');
      }
    }
    public function login(Request $req){
      $password = $req->password;

      if(Auth::check()){
        return back()->with('message','이미 로그인 하셨습니다.');
      }
      if(Auth::attempt(['email' => $req->email, 'password' => $password])){
        $user = User::where('email', $req->email)->get();
        session(['name' => $user[0]->name]);
        return redirect('/');
      }else{
        return 'fail';
      }
    }
}
