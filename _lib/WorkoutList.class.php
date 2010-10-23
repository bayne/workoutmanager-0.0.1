<?php
require_once('_lib/User.class.php');
require_once('_lib/DB.class.php');
class WorkoutList
{
	var $workouts;
	private $user;

	public function WorkoutList($user)
	{
		DB::conn();
		$this->user = $user;
		$this->workouts = array();
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
				$this->workouts[] = new Workout($row);
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