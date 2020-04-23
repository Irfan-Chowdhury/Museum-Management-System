<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    // Many Items under : 1 User || 1 User have : Many Items
    public function user()  
    {
        return $this->belongsTo(User::class);
    }
}
