<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps()->withPivot('id','name');
    }
}
