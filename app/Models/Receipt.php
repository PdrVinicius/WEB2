<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['order_id', 'client_id'];

    public function clients()
    {
        return $this->belongsTo(Client::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
