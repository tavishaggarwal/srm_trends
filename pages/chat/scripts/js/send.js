$('#form_input').submit(function() {
	var message = $('#message').val();
	var sender 	= $('#sender').val();
	
	$.ajax({
		url: 'scripts/php/Send.php',
		data: { sender: sender, message: message }, 
		success: function(data) {
				
			$('#message').val('');
			
		}
	});
	
	return false;
});