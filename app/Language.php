<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    public function categoryproducts(){
        return $this->belongsToMany(Categoryproduct::class)->withTimestamps()->withPivot('id','name');
    }
}
