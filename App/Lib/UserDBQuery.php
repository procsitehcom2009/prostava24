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
	
	public static function addUser(): string
    {
        return "
			INSERT INTO `up_user`
			(`EMAIL`, `PASSWORD`, `firstName`, `lastName`, `telegramAuth`, `ISADMIN`, `DATE_CREATE`, `DATE_UPDATE`)
			VALUES
			(?,?,?,?,?,?,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)
		";
    }
	
	public static function setPasswordByEmail() : string
    {
        return "
			UPDATE up_user 
			SET 
				PASSWORD = ?
			WHERE EMAIL = ?;
		";
    }
}