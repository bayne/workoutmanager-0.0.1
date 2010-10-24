<?php
//TODO check for duplicate entries
require_once('_lib/User.class.php');
require_once('_lib/Controller.class.php');
class Login extends Controller
{
	private static $name;
	public static function process()
	{
		if(isset($_GET['submit']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$user = new User($username,$password);
			if($user->read())
			{
				$_SESSION['user'] = serialize($user);
				echo 'logged in';
			}
			else
				echo 'error';
		}
	}
	public static function renderContent()
	{
		ob_start();
		include "_doc/login.tpl.php";
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}
?>