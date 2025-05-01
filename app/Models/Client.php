<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = ['name','email','phone'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}