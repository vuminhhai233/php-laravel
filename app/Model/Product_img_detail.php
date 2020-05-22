<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_img_detail extends Model
{
    protected $table='product_img_detail';
    public function img()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }
}
