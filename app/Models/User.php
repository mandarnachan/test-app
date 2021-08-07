<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'user_code', 'name', 'age'
    ];
}

?>