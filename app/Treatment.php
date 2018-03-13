<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{


    public function treatmenttype(){

        return $this->belongsTo(Treatmenttype::class);
    }

    public function plans(){
        return $this->belongsToMany(Plan::class)->withTimestamps()->withPivot('teeNo','qty','price','amount','appointment_id');

    }
    public function Treatmentprocedures(){
        return $this->hasMany(Treatmentprocedure::class);
    }

    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }
}
