<?php

namespace DejeuCrew\User;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $table = 'users';

    protected $fillable = [
      'emial',
      'username',
      'password',
      'active',
      'active_hash',
      'remember_identifier',
      'remember_token',
    ];
}