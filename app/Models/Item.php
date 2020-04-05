<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     // Many Items under : 1 User || 1 User have : Many Items
     public function user()  
     {
         return $this->belongsTo(User::class);
     }
     
    // Many Items under : 1 Category || 1 Category have : Many Items
    public function category()  
    {
        return $this->belongsTo(Category::class);
        // return $this->belongsTo(Category::class,'category_id'); //or you can write this line
    }
}
