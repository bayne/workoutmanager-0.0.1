<?php
require_once('config.php');
require_once('_lib/Login.class.php');
$do = $_GET['do'];
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION['user']);
}
else if($do != 'login')
{
	header('Location: /?do=login');
}
switch($do)
{
	case 'login':
	Login::process();
	Login::renderPage();
	break;
	default:
	echo 'bad';
	break;
}
?>