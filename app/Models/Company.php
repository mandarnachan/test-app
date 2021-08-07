<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'comp_code', 'name', 'started_at'
    ];
}

?>