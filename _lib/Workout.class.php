<?php
require_once('_lib/Exercise.class.php');
require_once('_lib/DB.class.php');
class Workout
{
	private $id;
	private $exercises;
	private $user;
	private $name;
	public function Workout($user,$id = -1)
	{
		DB::conn();
		$this->exercises = $exercises;
		$this->user = $user;
	}

	public function getExerciseForms()
	{
		//TODO
	}
	public function display()
	{
		ob_start();
		include '_doc/workout.tpl.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	public function addExercise($exercise_form)
	{
		$name = $exercise_form['name'];
		$setcount = $exercise_form['setcount'];
		$repmin = $exercise_form['repmin'];
		$repmax = $exercise_form['repmax'];
		$weightmin = $exercise_form['weightmin'];
		$weightmax = $exercise_form['weightmax'];
		$this->exercises[] = new Exercise($this->id,$name,$setcount,$repmin,$repmax,$weightmin,$weightmax);
	}
	public function create()
	{
		$sql = sprintf("INSERT INTO workouts (user_id,workout_name) VALUES ('%s','%s')",
				$this->user->userid,
				$this->name);
		foreach($exercises as $exercise)
		{
			$exercise->create();
		}
		return DB::query($sql);
	}
	public function read()
	{
		//get the workout name and the exercises associated with the workout id
		$sql = sprintf("SELECT workout_name FROM workouts WHERE id='%s'",$this->id);
		$result = DB::query($sql);
		$row = mysql_fetch_assoc($result);
		$sql = sprintf("SELECT * FROM exercises WHERE workout_id='%s'",$this->id);
		$result = DB::query($sql);
		$rows = mysql_fetch_assoc($result);
		$this->exercises = $rows;
		
	}
	public function update()
	{
		$sql = sprintf("UPDATE workouts SET (user_id,workout_name) VALUES ('%s','%s')",
				$this->user->userid,
				$this->name);
		
	}
	public function delete()
	{
		
	}
}
?>