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
		self::$exercise_forms = array(0=>array());

		if(isset($_GET['workout']))
		{
			$id = $_GET['workout'];
			self::$workout = new Workout($user,$id);
			self::$workout->read();
			self::$exercise_forms = self::$workout->getExerciseForms();
		}
		else
		{
			die();
		}

		if(isset($_POST['exercises']))
		{
			self::$exercise_forms = $_POST['exercises'];
			$user = unserialize($_SESSION['user']);
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
				if(self::$workout->get_id()!=-1)
					self::$workout->update();
				else
					self::$workout->create();
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