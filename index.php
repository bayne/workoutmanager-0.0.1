<?php
require_once('config.php');
require_once('_lib/Login.class.php');
require_once('_lib/WorkoutDesign.class.php');
require_once('_lib/Page.class.php');

$styles = array();
$scripts = array('_doc/js/jquery.js');
$header = '';
$footer = '';
$content ='';
$do = $_GET['do'];
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION['user']);
}
else if($do != 'login')
{
	//header('Location: /?do=login');
}
switch($do)
{
	case 'login':
		Login::process();
		$content = Login::renderContent();
		$styles[] = Login::getStyles();
		$scripts[] = Login::getScripts();
	break;
	case 'design':
		WorkoutDesign::process();
		$content = WorkoutDesign::renderContent();
		$styles[] = WorkoutDesign::getStyles();
		$scripts[] = WorkoutDesign::getScripts();
	break;
	default:
	echo 'bad';
	break;
}

Page::renderPage($styles,$scripts,$header,$content,$footer);

?>