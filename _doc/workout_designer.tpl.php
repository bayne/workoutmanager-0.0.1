<form action="?do=design&save&workout=<?php echo self::$workout->get_id();?>" method="post" id="exercise-list">
<?php foreach( $exercise_forms as $id => $exercise_form) {?>
<fieldset class="exercise">
	<input type="hidden" value="<?php echo $exercise_form['exercise_id'];?>"/>
	<legend>Exercise</legend>
	<label for="exercises[<?php echo $id;?>][name]" class='name'>Exercise Name:</label>
	<input class='name' type="text" value="<?php echo $exercise_form['name']; ?>" name="exercises[<?php echo $id;?>][name]" id="exercises[<?php echo $id;?>][name]"/>
	<label for="exercises[<?php echo $id;?>][number_of_sets]" class='number_of_sets'>Number of sets:</label>
	<input type="text" class="number_of_sets" value="<?php echo $exercise_form['number_of_sets'];?>" name="exercises[<?php echo $id; ?>][number_of_sets]" id="exercises[<?php echo $id; ?>][number_of_sets]" />
	<fieldset class="weight-range">
		<legend>Weight Range</legend>
		<label for="exercises[<?php echo $id;?>][weight_min]" class='weight_min'>From:</label><input class='weight_min' type="text" value="<?php echo $exercise_form['weight_min']; ?>" name="exercises[<?php echo $id;?>][weight_min]" id="exercises[<?php echo $id;?>][weight_min]"/>
		<label for="exercises[<?php echo $id;?>][weight_max]" class='weight_max'>To:</label><input class='weight_max' type="text" value="<?php echo $exercise_form['weight_max']; ?>" name="exercises[<?php echo $id;?>][weight_max]" id="exercises[<?php echo $id;?>][weight_max]"/>
	</fieldset>
	<fieldset class="rep-range">	
		<legend>Rep Range</legend>
		<label for="exercises[<?php echo $id;?>][rep_min]" class='rep_min'>From:</label><input class='rep_min' type="text" value="<?php echo $exercise_form['rep_min']; ?>" name="exercises[<?php echo $id;?>][rep_min]" id="exercises[<?php echo $id;?>][rep_min]"/>
		<label for="exercises[<?php echo $id;?>][rep_max]" class='rep_max'>To:</label><input class='rep_max' type="text" value="<?php echo $exercise_form['rep_max']; ?>" name="exercises[<?php echo $id;?>][rep_max]" id="exercises[<?php echo $id;?>][rep_max]"/>
	</fieldset>
</fieldset>
<?php }?>
<a id='add-new-exercise'>Add</a>
<br/>
<input type="submit" id="save-exercises" />
<input type="hidden" value="<?php echo count(self::$workout->exercises);?>" id="exercise-count" name="exercise-count"/>
</form>