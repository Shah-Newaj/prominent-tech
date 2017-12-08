<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pro_cat extends Model
{
    protected $table = 'pro_cat';

    public function products(){
    	return $this->belongsTo('Product','pro_cat');
    }
}
