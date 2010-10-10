<?php
class ExerciseForm
{
	private $name;
	private $weightmin;
	private $weighmax;
	private $repmin;
	private $repmax;
	private $id;
	
	public function ExerciseForm($formData,$id)
	{
		$this->id = $id;
		$this->name = $formData['name'];
		$this->weightmin = $formData['weightmin'];
		$this->weightmax = $formData['weightmax'];
		$this->repmin = $formData['repmin'];
		$this->repmax = $formData['repmax'];
	}
	public function renderContent()
	{
		$name = $this->name;
		$weightmin = $this->weightmin;
		$weightmax = $this->weightmax;
		$repmin = $this->repmin;
		$repmax = $this->repmax;
		include '_doc/exercise.tpl.php';
	}
	public function isValid()
	{
		return true;
	}
}
?>