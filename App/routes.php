<?php

use App\Controller\UserController;
use App\Controller\InfoController;
use App\Lib\Router;
use App\Middleware\Auth;

/** Публичная страница */

Router::add(
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
    "/logout/",
    [UserController::class, 'logOutUser']
);

Router::add(
    "GET",
    "/user/",
    [UserController::class, 'showUserAction']
);

Router::add(
    "GET",
    "/user/info/",
    [UserController::class, 'showUserInfoAction']
);

Router::add(
    "POST",
    "/user/",
    [UserController::class, 'Authorized']
);

Router::add(
    "POST",
    "/auth/telegram/",
    [UserController::class, 'TelegramAuthorized']
);