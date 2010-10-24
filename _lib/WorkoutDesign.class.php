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
		if(isset($_GET['edit']))
		{
			$id = $_GET['workout'];
			if(empty($id))
			{
				die("empty id");
			}
		}
		else if(isset($_GET['save']))
		{
			
		}
	}
	public static function process()
	{
		$user = unserialize($_SESSION['user']);
		if(isset($_GET['workout']))
		{
			//TODO make sure user has permission to edit this workout
			$id = $_GET['workout'];
			self::$workout = new Workout($user,$id);
		}
		else
		{
			self::$workout = new Workout($user);
			self::$workout->is_new = true;
			self::$exercise_forms = array(0=>array());
		}
		if(isset($_POST['exercises']))
		{
			self::$exercise_forms = $_POST['exercises'];

			//$exercises = array();
			$invalid_forms = array();
			foreach(self::$exercise_forms as $id => $exercise_form)
			{
				if (!Validate::exercise_form($execise_form))
				{
					$invalid_forms[] = $exercise_form;
				}
				self::$workout->addExercise($exercise_form);
			}
			if(count($invalid_forms) > 0)
			{
				//print errors
			}
			else
			{
				if(self::$workout->is_new())
					self::$workout->create();
				else
					self::$workout->update();
				//header("Location: ?do=list");
			}
		}
		else
		{
			self::$workout->read();
			self::$exercise_forms = self::$workout->getExerciseForms();
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
		print_r($exercise_forms);
		include '_doc/workout_designer.tpl.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}
?>