<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function detail()
    {
    return $this->hasMany('App\Model\OrderDetail');
    }

}
