<?php
require_once('config.php');
require_once('_lib/MainPage.class.php');
require_once('_lib/Login.class.php');
require_once('_lib/WorkoutDesign.class.php');
require_once('_lib/Register.class.php');
require_once('_lib/Page.class.php');
require_once('_lib/WorkoutListing.class.php');
session_start();
$styles = array();
$scripts = array('_doc/js/jquery.js');

$footer = '';
$content ='';
$do = $_GET['do'];
ob_start();
if(isset($_SESSION['user']))
{
	$user = unserialize($_SESSION['user']);
}
else
{
	$user = null;
	if($do != 'login')
	{
		//header('Location: /?do=login');
	}
}

// if(strpos($_SERVER['HTTP_USER_AGENT'],"Android") and !isset($_REQUEST['mobile']))
// {
// 	$_GET['mobile'] = '';
// }

switch($do)
{
	case 'login':
		Login::process();
		$content .= Login::renderContent();
		$styles[] = Login::getStyles();
		$scripts[] = Login::getScripts();
	break;
	case 'logout':
		session_destroy();
	break;
	case 'design':
		WorkoutDesign::process();
		$content .= WorkoutDesign::renderContent();
		$styles[] = WorkoutDesign::getStyles();
		$scripts[] = WorkoutDesign::getScripts();
	break;
	case 'register':
		Register::process();
		$styles[] = WorkoutDesign::getStyles();
		$content .= Register::renderContent();
	break;
	case 'assign':
		WorkoutAssign::process();
		$content .= WorkoutAssign::renderContent();
	break;
	case 'list':
		WorkoutListing::process();
		$content .= WorkoutListing::renderContent();
	break;
	case 'workout':
		Workingout::process();
		$content .= Workingout::renderContent();
	break;
	default:
		MainPage::process();
		$content .= MainPage::renderContent();
	break;
}

ob_end_clean();

ob_start();
include '_doc/page_start.tpl.php';
$header = ob_get_contents();
ob_end_clean();

Page::renderPage($styles,$scripts,$header,$content,$footer);

?>