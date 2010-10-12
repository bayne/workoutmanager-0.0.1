<?php
require_once('_lib/ExerciseForm.class.php');
require_once('_lib/Controller.class.php');
class WorkoutDesign extends Controller
{
	private static $exerciseForms;
	public static function process()
	{
		self::$exerciseForms = array();
		if(isset($_POST['exercises']))
		{
			$exerciseForms = $_POST['exercises'];
			$user = unserialize($_SESSION['user']);
			//$exercises = array();
			$workout = new Workout($user);
			$invalidForms = array();
			foreach($exerciseForms as $id => $exerciseFormData)
			{
				$exerciseForm = new ExerciseForm($exerciseFormData,$id);
				if (!$exerciseForm->isValid())
				{
					//$exercises[] = new Exercise($exerciseForm);
					$invalidForms[] = $exerciseForm;
				}
				$workout->addExercise($exerciseForm);
			}

			if(count($invalidForms) > 0)
			{
				//print errors
			}
			else
			{
				$workout->save();
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