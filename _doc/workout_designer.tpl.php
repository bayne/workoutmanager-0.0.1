<form action="?do=design" method="post" id="exercise-list">
<?php foreach( $exercise_forms as $id => $exercise_form) {?>
<fieldset class="exercise">
	<input type="hidden" value="<?php echo $exercise_form['exercise_id'];?>"/>
	<legend>Exercise</legend>
	<label for="exercises[<?php echo $id;?>][name]" class='name'>Exercise Name:</label>
	<input class='name' type="text" value="<?php echo $exercise_form['name']; ?>" name="exercises[<?php echo $id;?>][name]" id="exercises[<?php echo $id;?>][name]"/>
	<label for="exercises[<?php echo $id;?>][setcount]" class='setcount'>Number of sets:</label>
	<input type="text" class="setcount" value="<?php echo $exercise_form['setcount'];?>" name="exercises[<?php echo $id; ?>][setcount]" id="exercises[<?php echo $id; ?>][setcount]" />
	<fieldset class="weight-range">
		<legend>Weight Range</legend>
		<label for="exercises[<?php echo $id;?>][weightmin]" class='weightmin'>From:</label><input class='weightmin' type="text" value="<?php echo $exercise_form['weightmin']; ?>" name="exercises[<?php echo $id;?>][weightmin]" id="exercises[<?php echo $id;?>][weightmin]"/>
		<label for="exercises[<?php echo $id;?>][weightmax]" class='weightmax'>To:</label><input class='weightmax' type="text" value="<?php echo $exercise_form['weightmax']; ?>" name="exercises[<?php echo $id;?>][weightmax]" id="exercises[<?php echo $id;?>][weightmax]"/>
	</fieldset>
	<fieldset class="rep-range">	
		<legend>Rep Range</legend>
		<label for="exercises[<?php echo $id;?>][repmin]" class='repmin'>From:</label><input class='repmin' type="text" value="<?php echo $exercise_form['repmin']; ?>" name="exercises[<?php echo $id;?>][repmin]" id="exercises[<?php echo $id;?>][repmin]"/>
		<label for="exercises[<?php echo $id;?>][repmax]" class='repmax'>To:</label><input class='repmax' type="text" value="<?php echo $exercise_form['repmax']; ?>" name="exercises[<?php echo $id;?>][repmax]" id="exercises[<?php echo $id;?>][repmax]"/>
	</fieldset>
</fieldset>
<?php }?>
<a id='add-new-exercise'>Add</a>
<br/>
<input type="submit" id="save-exercises" />
<input type="hidden" value="1" id="exercise-count" name="exercise-count"/>
</form>