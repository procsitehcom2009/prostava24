<?php

namespace App\Lib;

use App\Config\Settings;

class Helper
{
	private static $instance;

	public static function getInstance(): Helper
	{
		if (self::$instance)
		{
			return self::$instance;
		}

		self::$instance = new self();

		return self::$instance;
	}

	public static function getUrl(): string
	{
		return ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
	}

    public static function setAuthorized(int $id, string $userEmail, string $userPasswordHash): void
    {
        session_start();

        $_SESSION['userId'] = $id;
        $_SESSION['userEmail'] = $userEmail;
        $_SESSION['userPasswordHash'] = $userPasswordHash;
    }

    public static function getAuthorized(): array
    {
        session_start();

        return $sessionUserData = array(
            'userId' => $_SESSION['userId'],
            'userEmail' => $_SESSION['userEmail'],
            'userPasswordHash' =>  $_SESSION['userPasswordHash']
        );
    }

    public static function destroyAuthorized()
    {
        session_start();
        $_SESSION = [];
        session_destroy();
    }

}