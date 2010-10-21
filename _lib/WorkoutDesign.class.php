<?php
require_once('_lib/ExerciseForm.class.php');
require_once('_lib/Controller.class.php');
class WorkoutDesign extends Controller
{
	private static $exerciseForms;
	private static $workout;
	public static function process()
	{
		self::$exerciseForms = array();

		if(isset($_GET['workout']))
		{
			$id = $_GET['workout']
			self::$workout = new Workout($user,$id);
			self::$exerciseForms = $workout->getExerciseForms();
		}

		if(isset($_POST['exercises']))
		{
			$exerciseForms = $_POST['exercises'];
			$user = unserialize($_SESSION['user']);
			//$exercises = array();
			self::$workout = new Workout($user);
			$invalidForms = array();
			foreach($exerciseForms as $id => $exerciseFormData)
			{
				$exerciseForm = new ExerciseForm($exerciseFormData,$id);
				if (!$exerciseForm->isValid())
				{
					//$exercises[] = new Exercise($exerciseForm);
					$invalidForms[] = $exerciseForm;
				}
				self::$workout->addExercise($exerciseForm);
			}

			if(count($invalidForms) > 0)
			{
				//print errors
			}
			else
			{
				if(self::$workout->id!=-1)
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
		$emptyExerciseForm = new ExerciseForm();
		$exerciseForms = self::$exerciseForms;
		include '_doc/workout_designer.tpl.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
}
?>