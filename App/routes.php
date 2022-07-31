<?php

use App\Controller\UserController;
use App\Controller\InfoController;
use App\Lib\Router;

/** Публичная страница */

Router::add(
	"GET",
	"/",
	[InfoController::class, 'showAction']
);

Router::add(
    "GET",
    "/user/",
    [UserController::class, 'showUserAction']
);