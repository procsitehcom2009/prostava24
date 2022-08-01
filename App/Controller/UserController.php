<?php

namespace App\Controller;

use App\Config\Database;
use App\Lib\Helper;
use App\Lib\Render;
use App\Service\UserService;

class UserController
{

    public static function logInUser(): string
    {
        return Render::renderContent("login", []);
    }

    public static function logOutUser(): string
    {
        Helper::destroyAuthorized();
        $content = Render::renderContent("index-info");
        return Render::renderLayout($content,"index");
    }

    public static function Authorized(): string
    {
        $validateEmail = $_POST['email'];
        $validatePassword = $_POST['password'];

        $user = UserService::getUserByEmail(Database::getDatabase(), $validateEmail);
        if (!isset($user))
        {
            return Render::renderContent("login", []);
        }
        else
        {
            $isCorrectPassword = password_verify($validatePassword, $user->getPassword());
            if (!$isCorrectPassword)
            {
                return Render::renderContent("login", []);
            }
            else
            {
                Helper::setAuthorized($user->getId(), $user->getEmail(), $user->getPassword());
                $content = Render::renderContent("user-profile");
                return Render::renderLayout($content,"user");
            }
        }
    }

    public static function isAuthorized(): bool
    {
        $sessionUserData = Helper::getAuthorized();
        if (!isset($sessionUserData['userEmail']))
        {
            return false;
        }
        else
        {
            $user = UserService::getUserByEmail(Database::getDatabase(), $sessionUserData['userEmail']);
            if ($sessionUserData['userPasswordHash']===$user->getPassword())
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

	public static function showUserAction()
	{
        if (!self::isAuthorized())
        {
            return Render::renderContent("login", []);
        }
        else
        {
            $content = Render::renderContent("user-profile");
            return Render::renderLayout($content,"user");
        }

	}

}