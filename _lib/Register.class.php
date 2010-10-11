<?php
class Register extends Controller
{
	private static function validate($username,$password)
	{
		return true;
	}
	public static function process()
	{
		$auth_token = $_SESSION['auth_token'];
		if(isset($_GET['submit']) and $_POST['auth_token'] == $auth_token)
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(self::validate($username,$password))
			{
				$user = new User($username,$password);
				if($user->create())
				{
					$_SESSION['user'] = serialize($user);
					echo 'user created';
				}
				else
					echo 'failed';
			}
		}
		else
		{
			$_SESSION['auth_token'] = sha1(rand());
		}
	}
	public static function renderContent()
	{
		$auth_token = $_SESSION['auth_token'];
		ob_start();
		include '_doc/register.tpl.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}
?>