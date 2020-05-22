<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    protected $table='product_detail';
    public function detail()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }
}
