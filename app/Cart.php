<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    
    protected $fillable = [
        'name', 'user_id', 'product_id', 'quantity', 'status', 'duration'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
