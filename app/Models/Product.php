<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['order_date', 'price','description','quantity','item_id','seller_id'];

    public function sellers()
    {
        return $this->belongsTo(Seller::class);
    }

    public function itens()
    {
        return $this->belongsTo(Item::class);
    }
}
