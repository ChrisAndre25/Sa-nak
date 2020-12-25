<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    
    protected $fillable = [
        'user_id', 'product_id', 'rating', 'status', 'duration'
    ];

    public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
