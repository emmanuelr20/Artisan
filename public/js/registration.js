// console.log('hello');
$(document).ready(function () {
	$('#reg_mail').blur(function () {
		if ($('#reg_mail').val() != ''){
			$.ajax({
				url: '/check/mail',
				data: {email: $('#reg_mail').val()},
				method: 'GET',
				success: function(){
					$('#em_err').text(' ');
				},
				error: function(){
					$('#em_err').text('mail has already being taken or incorrect!');
				}
			});
		} else {
			$('#em_err').text('email is required!');
		}
	});

	$('#reg_usrn').blur(function () {
		if ($('#reg_usrn').val() != ''){
			$.ajax({
				url: '/check/username',
				data: {username: $('#reg_usrn').val()},
				method: 'GET',
				success: function(){
					$('#un_err').text(' ');
				},
				error: function(){
					$('#un_err').text('username has already being taken!');
				}
			});
		} else {
			$('#un_err').text('username is required!');
		}
	});
});