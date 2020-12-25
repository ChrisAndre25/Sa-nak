<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    
    protected $fillable = [
        'name',
    ];

    public function product()
    {
        return $this->hasMany('App\Product', 'category_id', 'id');
    }
}
