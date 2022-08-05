<?php

namespace App\Service;

use App\Model\User;
use App\Lib\UserDBQuery;
use mysqli;

class UserService
{

    public static function prepareUserData(\mysqli_result $userData) : User
    {
        $user = mysqli_fetch_assoc($userData);
		
		if (!isset($user))
		{
			return new User(0,null,null,null,null,null,null,null,null);
		}
		else 
		{
		return
            new User(
                $user['id'],
                $user['email'],
                $user['password'],
                $user['firstName'],
                $user['lastName'],
                $user['telegramAuth'],
                $user['isAdmin'],
                $user['dateCreate'],
                $user['dateUpdate']
            );
		}
    }

    public static function getUserByEmail(mysqli $db, string $email): User
    {
        $query = UserDBQuery::getUserByEmail();

        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$result)
        {
            trigger_error(mysqli_error($db), E_USER_ERROR);
        }

        return self::prepareUserData($result);
    }

    public static function addUser(mysqli $db, User $user): User
    {
        $query = UserDBQuery::addUser();

        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "ssssii",
            $user->getEmail(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getTelegramAuth(),
            $user->getIsAdmin()
        );

        $result = mysqli_stmt_execute($stmt);

        if (!$result)
        {
            trigger_error(mysqli_error($db), E_USER_ERROR);
        }
    }

    public static function setPasswordByEmail(mysqli $db, string $userEmail, string $password): void
    {
        $query = UserDBQuery::setPasswordByEmail();

        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "ss", $password, $userEmail);
        $result = mysqli_stmt_execute($stmt);

        if (!$result)
        {
            trigger_error(mysqli_error($db), E_USER_ERROR);
        }
    }
}