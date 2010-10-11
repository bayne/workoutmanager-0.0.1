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
	public function create()
	{
			
	}
	public function read()
	{
		$sql = sprintf("SELECT * FROM workouts WHERE userid='%s'",$this->user->get_user_id());
		$result = DB::query($sql);
		$rows = mysql_fetch_assoc($result);
		for($rows as $row)
		{
			$workouts[] = new Workout($row);
		}

	}
	public function update()
	{
		
	}
	public function delete()
	{
		
	}
	
}?>