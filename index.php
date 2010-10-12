<?php
require_once('config.php');
require_once('_lib/Login.class.php');
require_once('_lib/WorkoutDesign.class.php');
require_once('_lib/Register.class.php');
require_once('_lib/Page.class.php');
require_once('_lib/WorkoutListing.class.php');
session_start();
$styles = array();
$scripts = array('_doc/js/jquery.js');
$header = '';
$footer = '';
$content ='';
$do = $_GET['do'];
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION['user']);
	echo 'logged in as:'.$user->name;
}
else
{
	echo 'not logged in';
	if($do != 'login')
	{
		//header('Location: /?do=login');
	}
}
switch($do)
{
	case 'login':
		Login::process();
		$content = Login::renderContent();
		$styles[] = Login::getStyles();
		$scripts[] = Login::getScripts();
	break;
	case 'logout':
		session_destroy();
	break;
	case 'design':
		WorkoutDesign::process();
		$content = WorkoutDesign::renderContent();
		$styles[] = WorkoutDesign::getStyles();
		$scripts[] = WorkoutDesign::getScripts();
	break;
	case 'register':
		Register::process();
		$styles[] = WorkoutDesign::getStyles();
		$content = Register::renderContent();
	break;
	case 'list':
		WorkoutListing::process();
		$content = WorkoutListing::renderContent();
	break;
	default:
		echo 'bad';
	break;
}

Page::renderPage($styles,$scripts,$header,$content,$footer);

?>