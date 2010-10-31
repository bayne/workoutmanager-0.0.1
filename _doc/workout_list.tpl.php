<ul class="workout-list">
<?php foreach($workouts as $workout) {	?>
	<li class="workout">
		<h2><?php echo $workout['workout_name']; ?></h2>
		<a href="?do=design&edit&workout=<?php echo $workout['id'];?>">Edit</a>		
		<a href="">Assign</a>
	</li>
<?php }								 	?>
</ul>
<div>
<a href="?do=design&create">New Workout</a>
</div>
