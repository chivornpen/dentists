<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatmenttype extends Model
{

    public function treatmenttypes(){
        return $this->hasMany(Treatment::class);
    }
}
