<?php 

namespace App\Repositories\Interfaces;

use App\User;

interface UserInterface
{
    public function all();

    public function getByUser(User $user);
}