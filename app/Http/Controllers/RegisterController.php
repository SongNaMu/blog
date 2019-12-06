<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class RegisterController extends Controller
{
    //회원가입 폼 요청
    public function registerform(Request $req){
      if(Auth::check()){
        return back()->with('message', '이미 로그인 하셨습니다.');
      }else{
        return view('register');
      }
    }

    //회원가입 요청
    public function register(Request $req){
      if(Auth::check()){//이미 로그인 한 상태
        return back()->with('message', '이미 로그인 하셨습니다.');
      }else{
        $user = User::where('email',$req->email)->get();
        if(isset($user[0]->id)){//중복 아이디입니다.
          return back()->with('message', '중복된 아이디입니다.');
        }else{ // 중복이 없습니다. 회원가입 처리
          User::insert(
            ['email' => $req->email, 'password' => $req->password, 'name' => $req->name]
          );

          return redirect('/')->with('message', '회원가입이 완료되었습니다.');
        }
      }
    }
}
