<?php

use App\Controller\UserController;
use App\Lib\Router;

/** Публичная страница */

Router::add(
	"GET",
	"/",
	[UserController::class, 'showUserAction']
);