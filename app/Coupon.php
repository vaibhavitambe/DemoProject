<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $fillable = ['code','percent_off','no_of_uses','created_by','modified_by'];


     public function users()
    {
        return $this->belongsTo('App\User','created_by','id');
    }

    public function users_modify()
    {
        return $this->belongsTo('App\User','modified_by','id');
    }
}
