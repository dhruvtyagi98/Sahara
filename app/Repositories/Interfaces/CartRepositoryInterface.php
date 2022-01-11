<?php

namespace App\Repositories\Interfaces;

use App\Cart;

interface CartRepositoryInterface
{
    public function getUserCart($id);
    public function addToCart($request);
    public function deleteById($id);
    public function deleteByUserId($id);
    public function getCart($id);
}