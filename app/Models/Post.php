<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $connection = 'mongodb';
    protected $fillable = [
        'userId', 'title', 'body'
    ];
}
