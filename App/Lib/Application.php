<?php

namespace App\Lib;

use App\Config\Database;
use App\Config\Settings;
use App\Controller\MessageController;
use App\Database\Migration;

class Application
{
	/**
	 * @throws Exception
	 */
	public static function run(): ?Response
	{
		$settings = Settings::getInstance();
		$database = Database::getInstance();

		try
		{
			$database->connect();
		}
		catch (NoConnectionToDataBaseException $exception)
		{
			#Починить
			return Response::error(404,"not found");

		}

		if ($settings->isDev())
		{
			$migration = new Migration(Database::getDatabase());
			$migration->up();
		}


		try
		{
			$route =  Router::route($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
		}
		catch (PathNotFoundEcxeption $e)
		{
			MessageController::showErrorPage();

			return Response::text(MessageController::showErrorPage());
		}

		return $route;
	}
}