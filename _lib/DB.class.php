<?php 
require_once('config.php');
class DB
{
	private static $db;
	public static function query($sql)
	{
		$result = mysql_query($sql,self::$db);
		debug("<div><ul><li>Query: $sql </li>");
		debug("<li>Result: $result </li></ul></div>");
		return $result;
	}
	public static function conn()
	{
		self::$db = mysql_connect(DBSERVER,USERNAME,PASSWORD);
		mysql_select_db(DBNAME,self::$db);
	}
}
?>