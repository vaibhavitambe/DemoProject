<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'product_attributes';
    protected $fillable = ['name'];

    public function childs() 
    {
        return $this->hasMany('App\Attributevalue','product_attribute_id','id');
    }
    public function assocproduct() 
    {
        return $this->belongsToMany(Product::class,'product_id','product_attribute_id','product_attribute_value_id');
    }

}
