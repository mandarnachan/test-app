<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class CompUsers extends Model
{
    protected $table = 'company_users';

    protected $fillable = [
        'user_id', 'comp_id'
    ];
}

?>