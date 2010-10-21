<?php
//TODO Remove this and use as array
class ExerciseForm
{
	private $name;
	private $weightmin;
	private $weighmax;
	private $repmin;
	private $repmax;
	private $id;
	
	public function __construct($formData=null,$id=0)
	{
		if(isset($formData))
		{
			$this->id = $id;
			$this->name = $formData['name'];
			$this->weightmin = $formData['weightmin'];
			$this->weightmax = $formData['weightmax'];
			$this->repmin = $formData['repmin'];
			$this->repmax = $formData['repmax'];
		}
		else
		{
			$this->setDefaults();
		}
	}
	public function setDefaults()
	{
		$this->id = 0;
	}
	public function renderContent()
	{
		$name = $this->name;
		$weightmin = $this->weightmin;
		$weightmax = $this->weightmax;
		$repmin = $this->repmin;
		$repmax = $this->repmax;
		$id = $this->id;
		include '_doc/exercise.tpl.php';
	}
	public function isValid()
	{
		return true;
	}
}
?>