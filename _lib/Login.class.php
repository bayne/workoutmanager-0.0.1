<?php
require_once('_lib/User.class.php');
class Login
{
	private static $name;
	public static function process()
	{
		if(isset($_GET['submit']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$user = User::getUser($username,$password);
		}
	}
	public static function renderContent()
	{
		include "_doc/login.tpl.php";
	}
}
?>