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
		//TODO store workouts in session
		$sql = sprintf("SELECT * FROM workouts WHERE user_id='%s'",$this->user->userid);
		$result = DB::query($sql);
		if($result)
		{
			while($row = mysql_fetch_assoc($result))
			{
				$this->workouts[] = $row;
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