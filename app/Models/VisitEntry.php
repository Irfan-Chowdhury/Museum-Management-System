<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitEntry extends Model
{
    // Many Visit Entry under : 1 Visitor || 1 Visitor have : Many Entry
    public function visitor()  
    {
        return $this->belongsTo(Visitor::class);
        // return $this->belongsTo('App\Models\Visitor', 'foreign_key');
    }

    public function user()  
    {
        return $this->belongsTo(User::class);
        // return $this->belongsTo('App\Models\User', 'foreign_key');
    }
}
