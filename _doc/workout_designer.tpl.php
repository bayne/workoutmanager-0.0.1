<form action="?do=design" method="post" id="exercise-list">
<?php $emptyExerciseForm->renderContent(); ?>
<?php foreach( $exerciseForms as $exerciseForm) {?>
<?php $exerciseForm->renderContent(); ?>
<?php }?>
<a id='add-new-exercise'>Add</a>
<br/>
<input type="submit" id="save-exercises" />
<input type="hidden" value="1" id="exercise-count" name="exercise-count"/>
</form>