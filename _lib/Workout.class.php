<?php
require_once('_lib/Exercise.class.php');
require_once('_lib/DB.class.php');
class Workout
{
	private $id;
	public  $is_new = false;
	private $exercises;
	private $user;
	private $name;
	public function __construct($user,$id = -1)
	{
		DB::conn();
		$this->exercises = array();
		$this->user = $user;
		$this->id = $id;
	}

	public function getExerciseForms()
	{
		
		return $this->exercises;
		//TODO
	}
	public function is_new()
	{
		return $this->is_new;
	}
	public function get_id()
	{
		return $this->id;
	}
	public function addExercise($exercise_form)
	{
		//TODO this can probably be taken out
		$this->exercises[] = $exercise_form;
	}
	public function create()
	{
		$sql = sprintf("INSERT INTO workouts (user_id,workout_name) VALUES ('%s','%s')",
			$this->user->userid,
			$this->name);
		$result = DB::query($sql);
		$this->id = mysql_insert_id();
		$sql = array();
		$id = 0;
		foreach($this->exercises as $exercise)
		{
			$sql[] = sprintf("('%s','%s','%s','%s','%s','%s','%s','%s')",
								$id++,
								$this->id,
								$exercise['name'],
								$exercise['number_of_sets'],
								$exercise['weight_min'],
								$exercise['weight_max'],
								$exercise['rep_min'],
								$exercise['rep_max']);
		}
		$sql = sprintf("INSERT INTO exercises (id,workout_id,name,number_of_sets,weight_min,weight_max,rep_min,rep_max) VALUES ".implode(',',$sql));
		$result = DB::query($sql);
		return $result;
	}
	public function read()
	{
		//get the workout name and the exercises associated with the workout id
	
		//Will return nothing if the user doesn't own this workout
		$sql = sprintf("SELECT workout_name FROM workouts WHERE user_id='%s' and id='%s'",$this->user->userid,$this->id);
		$result = DB::query($sql);
		if(empty($result))
		{
			die('Not authorized');
		}
		$this->name = mysql_result($result,0);
		$sql = sprintf("SELECT * FROM exercises WHERE workout_id='%s'",$this->id);
		$result = DB::query($sql);
		while($row = mysql_fetch_assoc($result))
		{
			//TODO Limit this so as to not overflow page
			$this->exercises[] = $row;
		}
	}
	public function update()
	{
		//TODO drops then readds
		$sql = "DELETE FROM exercises WHERE workout_id='$this->id'";
		DB::query($sql);
		$sql = array();
		$id = 0;
		foreach($this->exercises as $exercise)
		{
			$sql[] = sprintf("('%s','%s','%s','%s','%s','%s','%s','%s')",
								$id++,
								$this->id,
								$exercise['name'],
								$exercise['number_of_sets'],
								$exercise['weight_min'],
								$exercise['weight_max'],
								$exercise['rep_min'],
								$exercise['rep_max']);
		}
		$sql = sprintf("INSERT INTO exercises (id,workout_id,name,number_of_sets,weight_min,weight_max,rep_min,rep_max) VALUES ".implode(',',$sql));
		$result = DB::query($sql);
		return $result;
	}
	public function delete()
	{
		
	}
}
?>