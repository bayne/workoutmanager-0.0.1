<?php
require_once('_lib/Exercise.class.php');
class Workout
{
	private var $id;
	private var $exercises;
	private var $user;
	private var $name;
	public function Workout($user,$id = -1)
	{
		DB::conn();
		$this->exercises = $exercises;
		$this->user = $user;
	}
	public function display()
	{
		ob_start();
		include '_doc/workout.tpl.php';
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	public function addExercise($exerciseForm)
	{
		$this->exercises[] = new Exercise($exerciseForm,$this->id);
	}
	public function create()
	{
		$sql = sprintf("INSERT INTO workouts (user_id,workout_name) VALUES ('%s','%s')",
				$this->user->userid,
				$this->name);
		foreach($exercises as $exercise)
		{
			$exercise->save();
		}
		return DB::query($sql);
	}
	public function read()
	{
		//get the workout name and the exercises associated with the workout id
		$sql = sprintf("SELECT workout_name FROM workouts WHERE id='%s'",$this->id);
		$result = DB::query($sql);
		$row = mysql_fetch_assoc($result);
		$sql = sprintf("SELECT * FROM exercises WHERE workout_id='%s'",$this->id)
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