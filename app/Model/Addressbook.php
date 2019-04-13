<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Addressbook extends Model
{
	// Determines which database table to use
    protected $table = 'addressbook';

    /**
     * returns owner name.
    */
    public function getOwnerName()
    {
    	return $this->owner?$this->owner->name:"-";
    }

    /**
     * Get the owner of the address.
    */
    public function owner()
    {
    	return $this->belongsTo(User::class, 'owner_uid', 'uid');
    }
}
