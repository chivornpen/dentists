<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function treatment(){
        return $this->belongsTo(Treatment::class);
    }

}
