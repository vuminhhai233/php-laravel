<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    public $timestamps=false;
    public function category(){
        return $this->belongsTo('App\Model\Category','cate_id');
    }
    public function user(){
      return  $this->belongsToMany('App\Users');
    }
    public function product(){
       return $this->belongsToMany('App\Admins');
    }
    public function detailproduct(){
       return $this->hasMany('App\Model\Product_detail');
    }
    public function detail_img_product()
    {
        return $this->hasMany('App\Model\Product_img_detail');
    }
}
