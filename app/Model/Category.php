<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;

    public function product()
    {
        return $this->hasMany('App\Model\Product');
    }
    public function subcategory() {
        $this->belongsTo('App\Category');
    }
}
