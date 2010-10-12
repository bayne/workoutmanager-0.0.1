<?php
require_once('_lib/WorkoutList.class.php');
class WorkoutListing extends Controller
{
	private $user;
	private static $workoutList;
	public static function process()
	{
		$user = unserialize($_SESSION['user']);
		self::$workoutList = new WorkoutList($user);
		self::$workoutList->read();
	}	
	public static function renderContent()
	{
		$workouts = self::$workoutList->get_workouts();
		ob_start();
		include '_doc/workout_list.tpl.php';
		$content = ob_get_clean();
		ob_end_clean();
		return $content;
	}
}
?>