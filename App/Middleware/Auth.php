<?php

namespace App\Middleware;

use App\Controller\UserController;

class Auth extends Middleware
{

    public function check(array $request): bool
    {
        if (!UserController::isAuthorized())
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}