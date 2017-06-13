<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Lead extends Authenticatable
{

	use SoftDeletes;

    protected $dates = [
        'created_at','updated_at','deleted_at'
    ];
    
    protected $fillable = [
        'name', 'email', 'phone', 'profile',
    ]; 
}
