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

        return
            new User(
                $user['id'],
                $user['email'],
                $user['password'],
                $user['isAdmin'],
                $user['dateCreate'],
                $user['dateUpdate']
            );
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

}