<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $table = 'detail_transactions';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    
    protected $fillable = [
        'transaction_id', 'product_id', 'quantity', 'status', 'duration'
    ];

    public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
