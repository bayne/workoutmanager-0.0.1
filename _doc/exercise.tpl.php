<fieldset class="exercise">
	<legend>Exercise</legend>
	<label for="">Exercise Name:</label>
	<input class='name' type="text" value="<?php echo $name ?>"/>
	<fieldset class="weight-range">
		<legend>Weight Range</legend>
		<label for="">From:</label><input class='weightmin' type="text" value="<?php echo $weightmin ?>"/>
		<label for="">To:</label><input class='weightmax' type="text" value="<?php echo $weightmax ?>"/>
	</fieldset>
	<fieldset class="rep-range">	
		<legend>Rep Range</legend>
		<label for="">From:</label><input class='repmin' type="text" value="<?php echo $repmin ?>"/>
		<label for="">To:</label><input class='repmax' type="text" value="<?php echo $repmax ?>"/>
	</fieldset>
</fieldset>