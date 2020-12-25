<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderTransaction extends Model
{
    protected $table = 'header_transactions';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    
    protected $fillable = [
        'user_id', 'payment_type'
    ];

    public function detail_transaction()
    {
        return $this->hasMany('App\DetailTransaction', 'transaction_id', 'id');
    }

}
