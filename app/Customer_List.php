<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_List extends Model
{
    
    protected $guarded = [];
    
    public function customers() {
        return $this->hasMany('Customer::class');
    }
}
