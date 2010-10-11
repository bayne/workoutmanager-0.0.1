<?php
class Exercise
{
	private var $name;
	private var $sets;
	public function Exercise($exerciseForm)
	{
		$this->name = $exerciseForm['name'];
		$this->sets = array();
		foreach(range(0,$exerciseForm['setcount']) as $i)
		{
			$reprange = array($exerciseForm['repmin'],$exerciseForm['repmax']);
			$weightrange = array($exerciseForm['weightmin'],$exerciseForm['weightmax']);
			$sets[] = new Set($reprange,$weightrange);
		}
	}
	
}
?>