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
			$exercises = array();
			$invalidForms = array();
			foreach($exerciseForms as $id => $exerciseFormData)
			{
				$exerciseForm = new ExerciseForm($exerciseFormData,$id);
				if ($exerciseForm->isValid())
				{
					$exercise = new Exercise($exerciseForm);
				}
				else
				{
					$invalidForms[] = $exerciseForm;
				}
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