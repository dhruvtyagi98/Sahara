<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'order',
        'price',
        'payment_method',
        'address',
    ];

    public function getAddressAttribute($value)
    {
        return ucfirst($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strtoupper($value);
    }
}
