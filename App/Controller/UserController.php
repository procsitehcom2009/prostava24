<?php

namespace App\Controller;

use App\Config\Database;
use App\Lib\Helper;
use App\Lib\Render;
use App\Service\UserService;
use App\Controller\InfoController;

class UserController
{

    public static function logInUser(): string
    {
        return Render::renderContent("login", []);
    }

    public static function logOutUser(): string
    {
        Helper::destroyAuthorized();
        return InfoController::showAction();
    }

    public static function Authorized(): string
    {
        $validateEmail = $_POST['email'];
        $validatePassword = $_POST['password'];

        $user = UserService::getUserByEmail(Database::getDatabase(), $validateEmail);
        if (!isset($user))
        {
            return self::logInUser();
        }
        else
        {
            $isCorrectPassword = password_verify($validatePassword, $user->getPassword());
            if (!$isCorrectPassword)
            {
                return self::logInUser();
            }
            else
            {
                Helper::setAuthorized($user->getId(), $user->getEmail(), $user->getPassword());
                return self::profileUserAction();
            }
        }
    }

    public static function TelegramAuthorized(): string
    {
        $prepareTelegramUserData = Helper::prepareTelegramUserData($_POST['auth_date']);

        if (strcmp($prepareTelegramUserData['hash'], $prepareTelegramUserData['check_hash']) !== 0) {
            return "Data is NOT from Telegram";
        }
        if ((time() - $prepareTelegramUserData['auth_data']['auth_date']) > 86400) {
            return "Data is outdated";
        }

        return Helper::getUrl()."/user/info/";
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

    private static function profileUserAction()
    {
        $content = Render::renderContent("user-profile");
        return Render::renderLayout($content,"user");
    }

	public static function showUserAction()
	{
        if (!self::isAuthorized())
        {
            return self::logInUser();
        }
        else
        {
            return self::profileUserAction();
        }

	}

    public static function showUserInfoAction()
    {
        $content = Render::renderContent("user-info", ['user'=>Helper::getAuthorized()]);
        return Render::renderLayout($content,"user");
    }

}