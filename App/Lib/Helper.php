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

    public static function destroyAuthorized(): void
    {
        session_start();
        $_SESSION = [];
        session_destroy();
    }

    public static function getPathToApp(): string
    {
        return str_replace("Public","App",$_SERVER['DOCUMENT_ROOT']);
    }

    public static function prepareTelegramUserData(array $auth_data): array
    {
        $ini = parse_ini_file(self::getPathToApp().'/Config/config.ini');
        $botToken= $ini['botToken'];

        $check_hash = $auth_data['hash'];
        unset($auth_data['hash']);

        $data_check_arr = [];
        foreach ($auth_data as $key => $value) {
            $data_check_arr[] = $key . '=' . $value;
        }

        sort($data_check_arr);
        $data_check_string = implode("\n", $data_check_arr);
        $secret_key = hash('sha256', $botToken, true);
        $hash = hash_hmac('sha256', $data_check_string, $secret_key);

        return array("check_hash"=>$check_hash,"hash"=>$hash,"auth_data"=>$auth_data);
    }

}