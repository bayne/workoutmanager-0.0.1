<?php
require_once('_lib/User.class.php');
require_once('_lib/DB.class.php');
class WorkoutList
{
	private $workouts;
	private $user;

	public function WorkoutList($user)
	{
		DB::conn();
		$this->user = $user;
		$this->workouts = array();
	}
	public function get_workouts()
	{
		return $this->workouts;
	}
	public function create()
	{
			
	}
	public function read()
	{
		$sql = sprintf("SELECT * FROM workouts WHERE userid='%s'",$this->user->name);
		$result = DB::query($sql);
		if($result)
		{
			$rows = mysql_fetch_assoc($result);
			foreach($rows as $row)
			{
				$workouts[] = new Workout($row);
			}
		}
		else
		{
			//no workouts
		}

	}
	public function update()
	{
		
	}
	public function delete()
	{
		
	}
	
}?>