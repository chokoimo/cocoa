<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    
    protected $guarded = [];
    
    public function reservations() {
        return $this->belongsTo('Reservation::class');
    }
}
