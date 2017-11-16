<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
   protected $fillable = [
    	'product_name','category_id','product_description','old_price','new_price','product_image','product_type',
    ];


    public function category(){
    	return $this->belongsTo('App\models\Category');
    }

    
}
