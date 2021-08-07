<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'name', 'email', 'password',
    ];
}
