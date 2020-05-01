<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'user_id',
        'visitor_name' ,
        'visitor_email',
        'visitor_phone',
        'visitor_address',
        'visitor_id_no',
    ];
}
