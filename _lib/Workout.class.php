<?php
class Workout
{
	private var $exercises;
	private var $user;
	public function Workout($exercises,$user)
	{
		$this->exercises = $exercises;
		$this->user = $user;
	}
}
?>