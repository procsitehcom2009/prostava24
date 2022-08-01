<?php

namespace App\Lib;

class UserDBQuery
{

    public static function getUserByEmail() : string
    {
        return "
			SELECT
				ID as 'id',
				EMAIL as 'email',
				PASSWORD as 'password',
				ISADMIN as 'isAdmin',
				DATE_CREATE as 'dateCreate',
				DATE_UPDATE as 'dateUpdate'
			FROM up_user WHERE EMAIL = ?
			LIMIT 1
		";
    }
}