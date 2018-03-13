<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //

    public function plan(){
        return $this->hasMany(Plan::class);
    }
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function Treatmentprocedures(){
        return $this->hasMany(Treatmentprocedure::class);
    }

    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }
}
