<?php
require_once('DB.class.php');
class User
{
	public function User($name,$password)
	{
		DB::conn();
		$cleaned_name = mysql_real_escape_string($name);
		$passwordHash = sha1($password);
		$sql = sprintf("INSERT INTO 'users' ('username','password') VALUES ('%s','%s');",
				$cleaned_name,
				$passwordHash);
		$result = mysql_query($sql);
	}
	public static function getUser($name,$password)
	{
		DB::conn();
		$cleaned_name = mysql_real_escape_string($name);
		$passwordHash = sha1($password);
		$sql = sprintf("SELECT id,username FROM 'users' WHERE username='%s' AND password='%s';",
				$cleaned_name,
				$passwordHash);
		$result = mysql_query($sql);
		echo $result;
		return $result;
	}
}