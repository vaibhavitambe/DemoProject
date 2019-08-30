<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributevalue extends Model
{
    protected $table = 'product_attribute_values';
    protected $fillable = ['product_attribute_id','attribute_value'];

    public function values()
	{
    	return $this->belongsTo('App\Attribute'); 
	}
}
