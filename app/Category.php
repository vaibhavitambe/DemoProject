<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','parent_id','status'];

    public function childs() 
    {
        return $this->hasMany('App\Category','parent_id','id') ;
    }
    public function parent()
	{
    	return $this->belongsTo('App\Category', 'parent_id'); 
	}

    public static function getCategory()
    {
         return $category = category::where('parent_id','=',0)->get();
         // print_r($category);exit();
    }
}
