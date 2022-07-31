<?php

namespace App\Controller;

use App\Config\Database;
use App\Lib\Render;

class UserController
{

	public static function showUserAction()
	{
        $content = Render::renderContent("admin-user-change");
        return Render::renderLayout($content,"admin");

	}

}