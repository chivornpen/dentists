<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{


    public function clients(){
        return $this->hasMany(Client::class);
    }
    public function plan(){
        return $this->hasMany(Plan::class);
    }

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
    public function Treatmentprocedures(){
        return $this->hasMany(Treatmentprocedure::class);
    }
}
