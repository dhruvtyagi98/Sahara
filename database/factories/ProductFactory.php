<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Items;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Items::class, function (Faker $faker) {
    return [
        'name'          => $faker->word,
        'description'   => $faker->text,
        'category'      => Arr::random(['sneakers','shirt','tshirt','trouser','jean','jacket','watch']),
        'gender'        => Arr::random(['male','female','unisex']),
        'size'          => $faker->numerify('EU-#'),
        'quantity'      => rand(0,1000),
        'quantity_sold' => rand(0,1000),
        'price'         => rand(100,50000),
        'location'      => $faker->city,
        'seller_id'     => rand(1,1000),
        'picture'       => 'default_product.png',
    ];
});
