<fieldset class="exercise">
	<legend>Exercise</legend>
	<label for="exercises[<?php echo $id;?>][name]" class='name'>Exercise Name:</label>
	<input class='name' type="text" value="<?php echo $name ?>" name="exercises[<?php echo $id;?>][name]" id="exercises[<?php echo $id;?>][name]"/>
	<label for="exercises[<?php echo $id;?>][setcount]" class='setcount'>Number of sets:</label>
	<input type="text" class="setcount" value="<?php echo $setcount?>" name="exercises[<?php echo $id ?>][setcount]" id="exercises[<?php echo $id ?>][setcount]" />
	<fieldset class="weight-range">
		<legend>Weight Range</legend>
		<label for="exercises[<?php echo $id;?>][weightmin]" class='weightmin'>From:</label><input class='weightmin' type="text" value="<?php echo $weightmin ?>" name="exercises[<?php echo $id;?>][weightmin]" id="exercises[<?php echo $id;?>][weightmin]"/>
		<label for="exercises[<?php echo $id;?>][weightmax]" class='weightmax'>To:</label><input class='weightmax' type="text" value="<?php echo $weightmax ?>" name="exercises[<?php echo $id;?>][weightmax]" id="exercises[<?php echo $id;?>][weightmax]"/>
	</fieldset>
	<fieldset class="rep-range">	
		<legend>Rep Range</legend>
		<label for="exercises[<?php echo $id;?>][repmin]" class='repmin'>From:</label><input class='repmin' type="text" value="<?php echo $repmin ?>" name="exercises[<?php echo $id;?>][repmin]" id="exercises[<?php echo $id;?>][repmin]"/>
		<label for="exercises[<?php echo $id;?>][repmax]" class='repmax'>To:</label><input class='repmax' type="text" value="<?php echo $repmax ?>" name="exercises[<?php echo $id;?>][repmax]" id="exercises[<?php echo $id;?>][repmax]"/>
	</fieldset>
</fieldset>