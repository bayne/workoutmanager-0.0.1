<fieldset class="exercise">
	<legend>Exercise</legend>
	<label for="exercise[<?php echo $id;?>][name]" class='name'>Exercise Name:</label>
	<input class='name' type="text" value="<?php echo $name ?>" name="exercise[<?php echo $id;?>][name]" id="exercise[<?php echo $id;?>][name]"/>
	<label for="exercise[<?php echo $id;?>][setcount]" class='setcount'>Number of sets:</label>
	<input type="text" class="setcount" value="<?php echo $setcount?>" name="exercise[<?php echo $id ?>][setcount]" id="exercise[<?php echo $id ?>][setcount]" />
	<fieldset class="weight-range">
		<legend>Weight Range</legend>
		<label for="exercise[<?php echo $id;?>][weightmin]" class='weightmin'>From:</label><input class='weightmin' type="text" value="<?php echo $weightmin ?>" name="exercise[<?php echo $id;?>][weightmin]" id="exercise[<?php echo $id;?>][weightmin]"/>
		<label for="exercise[<?php echo $id;?>][weightmax]" class='weightmax'>To:</label><input class='weightmax' type="text" value="<?php echo $weightmax ?>" name="exercise[<?php echo $id;?>][weightmax]" id="exercise[<?php echo $id;?>][weightmax]"/>
	</fieldset>
	<fieldset class="rep-range">	
		<legend>Rep Range</legend>
		<label for="exercise[<?php echo $id;?>][repmin]" class='repmin'>From:</label><input class='repmin' type="text" value="<?php echo $repmin ?>" name="exercise[<?php echo $id;?>][repmin]" id="exercise[<?php echo $id;?>][repmin]"/>
		<label for="exercise[<?php echo $id;?>][repmax]" class='repmax'>To:</label><input class='repmax' type="text" value="<?php echo $repmax ?>" name="exercise[<?php echo $id;?>][repmax]" id="exercise[<?php echo $id;?>][repmax]"/>
	</fieldset>
</fieldset>