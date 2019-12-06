<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
    public function logout(){
      Auth::logout();
      session()->forget('name');
      return redirect('/');
    }
}
