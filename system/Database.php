<?php

namespace Application;


class Database
{
	private static $db_host;
	private static $db_username;
	private static $db_password;
	private static $db_name;
	private static $port;

	private static function init(){

	}
	public static function select(){
        return self::$db_host;
	}
}