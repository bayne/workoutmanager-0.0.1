<?php
require_once('_lib/ExerciseForm.class.php');
require_once('_lib/Controller.class.php');
require_once('_lib/Workout.class.php');
class WorkoutDesign extends Controller
{
	private static $exercise_forms;
	private static $workout;
	public static function process()
	{
		self::$exercise_forms = array();

		if(isset($_GET['workout']))
		{
			$id = $_GET['workout'];
			self::$workout = new Workout($user,$id);
			self::$exercise_forms = self::$workout->getExerciseForms();
		}

		if(isset($_POST['exercises']))
		{
			$exercise_forms = $_POST['exercises'];
			print_r($exercise_forms);
			$user = unserialize($_SESSION['user']);
			print_r($user);
			//$exercises = array();
			self::$workout = new Workout($user);
			print_r(self::$workout);
			$invalidForms = array();
			foreach($exercise_forms as $id => $exerciseFormData)
			{
				$exerciseForm = new ExerciseForm($exerciseFormData,$id);
				if (!$exerciseForm->isValid())
				{
					//$exercises[] = new Exercise($exerciseForm);
					$invalidForms[] = $exerciseForm;
				}
				self::$workout->addExercise($exerciseForm);
			}
			print_r(self::$workout);
			if(count($invalidForms) > 0)
			{
				//print errors
			}
			else
			{
				// if(self::$workout->id!=-1)
				// 	self::$workout->update();
				// else
				// 	self::$workout->create();
			}
			die();
		}
	}
	public static function getScripts()
	{
		return '_doc/js/workout_designer.js';
	}
	public static function renderContent()
	{
		ob_start();
		$emptyExerciseForm = new ExerciseForm();
		$exercise_forms = self::$exercise_forms;
		include '_doc/workout_designer.tpl.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}
?>