<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class User extends Model
{
    protected $table = 'user_apis';
    protected $connection = 'mongodb';
    protected $fillable = [
        'id',
        'name',
        'username',
        'email',
        'phone',
        'website',
        'address',
        'company',
    ];
    
    // protected $casts = [
    //     'address' => 'array',
    //     'company' => 'array',
    // ];
}
