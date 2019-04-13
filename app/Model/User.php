<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Addressbook;

class User extends Authenticatable
{
    /**
     * returns addresse belong to user
    */
    public function addresses()
    {
        return $this->hasMany(Addressbook::class, 'owner_uid', 'uid');
    }
}
