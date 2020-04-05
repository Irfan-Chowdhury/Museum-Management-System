<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    // 1 Category have : Many Items || Many Items under : 1 Category

    public function items()
    {
        // return $this->hasMany('App\Models\Item','category_id'); //or,
        return $this->hasMany(Item::class);
    }
}
