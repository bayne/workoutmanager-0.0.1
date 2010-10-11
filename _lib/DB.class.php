<?php 
require_once('config.php');
class DB
{
	private static $db;
	public static function query($sql)
	{
		return mysql_query($sql,self::$db);
	}
	public static function conn()
	{
		self::$db = mysql_connect(DBSERVER,USERNAME,PASSWORD);
		mysql_select_db(DBNAME,self::$db);
	}
}
?>