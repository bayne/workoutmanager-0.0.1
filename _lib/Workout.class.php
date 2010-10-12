<?php
require_once('_lib/Exercise.class.php');
class Workout
{
	private var $id;
	private var $exercises;
	private var $user;
	private var $name;
	public function Workout($user,$exercises = array())
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
		$sql = sprintf("INSERT INTO workouts (user_id,name) VALUES ('%s''%s')",
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
		$sql = sprintf("SELECT * FROM workouts WHERE user_id='%s'",$this->user->get_id());
		$result = DB::query($sql);
		$row = mysql_fetch_assoc($result);
		$result[]
	}
	public function update()
	{
		
	}
	public function delete()
	{
		
	}
}
?>