<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    
    protected $fillable = [
        'name', 'category_id', 'stock', 'sell_price', 'rent_price', 'description', 'image'
    ];

    public function category()
    {
        return $this->hasOne('App\ProductCategory', 'id', 'category_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'seller_id', 'id');
    }
}
