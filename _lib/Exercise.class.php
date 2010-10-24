<?php
require_once('_lib/DB.class.php');
class Exercise
{
	private $workout_id;
	private $name;
	private $setcount;
	private $repmin;
	private $repmax;
	private $weightmin;
	private $weightmax;

	public function __construct($workout_id,$name,$setcount,$repmin,$repmax,$weightmin,$weightmax)
	{
		 $this->workout_id = $workout_id;
		 $this->name = $name;
		 $this->setcount = $setcount;
		 $this->repmin = $repmin;
		 $this->repmax = $repmax;
		 $this->weightmin = $weightmin;
		 $this->weightmax = $weightmax;
	}
	public function create($id)	
	{
		//TODO clean output
		$this->workout_id = $id;
		$sql = sprintf("INSERT INTO exercises (workout_id,name,rep_min,rep_max,weight_min,weight_max,number_of_sets) VALUES ('%s','%s','%s','%s','%s','%s','%s')",
						$this->workout_id,
						$this->name,
						$this->setcount,
						$this->repmin,
						$this->repmax,
						$this->weightmin,
						$this->weightmax);
		return DB::query($sql);
	}
}
?>