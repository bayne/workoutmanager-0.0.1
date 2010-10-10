$(document).ready( function(){
	$('a#add-new-exercise').click( function(){
		var exerciseCount = $('input#exercise-count').val();
		var exercise = $('fieldset.exercise:first').clone();
		var exerciseID = 'exercises['+exerciseCount+']';
		$('input',exercise).val('');
		$('input',exercise).each( function(){
			var inputType = $(this).attr('class');
			$(this).attr('name',exerciseID+'['+inputType+']');
			$(this).attr('id',exerciseID+'['+inputType+']');			
		});
		$('label',exercise).each( function(){
			var inputType = $(this).attr('class');
			$(this).attr('for',exerciseID+'['+inputType+']');
		});
		$(this).before(exercise);
		$('input#exercise-count').val(parseInt(exerciseCount)+1);
		});
	});