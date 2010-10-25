<?php
require_once('_lib/Controller.class.php');
class MainPage extends Controller
{
	public static function process()
	{
		
	}
	public static function renderContent()
	{
		ob_start();
		include "_doc/mainpage.tpl.php";
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}
?>