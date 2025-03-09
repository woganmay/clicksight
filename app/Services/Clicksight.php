<?php

namespace App\Services;

use App\Models\User;

class Clicksight
{
    public function __construct(private readonly User $user)
    {
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
