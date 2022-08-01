<?php

use App\Controller\UserController;
use App\Controller\InfoController;
use App\Lib\Router;

/** Публичная страница */

$rout = Router::add(
	"GET",
	"/",
	[InfoController::class, 'showAction']
);

Router::add(
    "GET",
    "/login/",
    [UserController::class, 'logInUser']
);

Router::add(
    "GET",
    "/logout",
    [UserController::class, 'logOutUser']
);

Router::add(
    "GET",
    "/user/",
    [UserController::class, 'showUserAction']
);

Router::add(
    "POST",
    "/user/",
    [UserController::class, 'Authorized']
);