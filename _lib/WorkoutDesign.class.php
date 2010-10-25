<?php
require_once('_lib/Controller.class.php');
require_once('_lib/Workout.class.php');
require_once('_lib/Validate.class.php');

class WorkoutDesign extends Controller
{
	private static $exercise_forms;
	private static $workout;
	public static function process()
	{
		$user = unserialize($_SESSION['user']);
		if(isset($_GET['edit']))
		{
			$id = $_GET['workout'];
			if(empty($id))
			{
				die("empty id");
			}
			self::$workout = new Workout($user,$id);
			self::$workout->read();
			self::$exercise_forms = self::$workout->exercises;
		}
		else if(isset($_GET['create']))
		{
			self::$workout = new Workout($user);
			self::$exercise_forms = array(0=>array());
		}
		else if(isset($_GET['save']))
		{
			$id = $_GET['workout'];
			self::$workout = new Workout($user,$id);
			self::$exercise_forms = $_POST['exercises'];
			if(empty(self::$exercise_forms))
			{
				die("no exercises submitted");
			}
			$invalid_forms = array();
			foreach(self::$exercise_forms as $id => $exercise_form)
			{
				if (!Validate::exercise_form($execise_form))
				{
					$invalid_forms[] = $exercise_form;
				}
				
			}
			if(count($invalid_forms) > 0)
			{
				//print errors
			}
			else
			{
				self::$workout->exercises = self::$exercise_forms;
				if(self::$workout->is_new())
					self::$workout->create();
				else
					self::$workout->update();
				//header("Location: ?do=list");
			}
		}
	}
	
	public static function getScripts()
	{
		return '_doc/js/workout_designer.js';
	}
	public static function renderContent()
	{
		ob_start();
		$exercise_forms = self::$exercise_forms;
		include '_doc/workout_designer.tpl.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}
?>