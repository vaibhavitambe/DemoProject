<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $fillable = ['status','banner_path','title','description'];

    public static function getBanner()
    {
    	return $banner = Banner::where('status','=','active')->get();
    }
}
