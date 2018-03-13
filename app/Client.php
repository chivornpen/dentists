<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{


    public function clients(){
        return $this->hasMany(Client::class);
    }
    public function plan()
    {
        return $this->hasMany(Plan::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function pricelists(){
        return $this->hasMany(Pricelist::class);
    }
    public function suppliers(){
        return $this->hasMany(Supply::class);
    }

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }
    public function Treatmentprocedures(){
        return $this->hasMany(Treatmentprocedure::class);
    }
}
