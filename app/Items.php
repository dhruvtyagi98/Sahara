<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'description', 
        'picture', 
        'category', 
        'gender', 
        'size',
        'quantity',
        'quantity_sold',
        'price',
        'location',
        'seller_id',
    ];
}
