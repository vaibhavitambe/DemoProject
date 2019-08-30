<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','sku','short_description','long_description','price','special_price','special_price_from','special_price_to','status','quantity','meta_title','meta_description','meta_keywords','is_featured'];

    public function childs() 
    {
        return $this->hasMany('App\ProductImage') ;
    }

    public function association()
    {
    	return $this->belongsToMany(Attribute::class,'product_id','product_attribute_id','product_attribute_value_id');
    }
}
