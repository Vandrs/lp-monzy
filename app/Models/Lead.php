<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lead extends Authenticatable
{
    protected $dates = [
        'created_at','updated_at','deleted_at'
    ];
    
    protected $fillable = [
        'name', 'email', 'phone', 'profile',
    ]; 
}
