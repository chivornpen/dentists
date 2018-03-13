<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
<<<<<<< HEAD
    public function languages(){
        return $this->belongsToMany(Language::class)->withTimestamps()->withPivot('id','name');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_added');
=======
    public function products(){
        return $this->hasMany(Product::class);
>>>>>>> aad6970dd43ac7795bd50acede401a769aa325b8
    }
}
