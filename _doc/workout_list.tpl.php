<ul class="workout-list">
	<li class="workout">
		<?php foreach($workouts as $workout) {	?>
		<?php 	$workout->display();  			?>
		<?php }								 	?>
	</li>
</ul>
