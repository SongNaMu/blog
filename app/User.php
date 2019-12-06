<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    public function getAuthPassword() {
      return Hash::make($this->password);
    }

}
