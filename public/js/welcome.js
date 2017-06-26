$('#mobileform').submit(function(event) {
	event.preventDefault();
	var mob = $('#mobile').val();
	if (!$.isNumeric(mob) || mob.length < 10 || mob.length > 10) {
		Materialize.toast('Enter correct number.', 2000, 'rounded');
	}
	else {
		$.ajax({
		    method: 'POST',
		    url: '/sendotp',
		    data: {'mobile': mob},
		    success: function(response){
		    	if (response['success']) {
		    		$('html').html(response['html']);
		    		// window.location.replace("/verify");
		    	}
		    	else {
		    		Materialize.toast('Error, Please try again.', 2000, 'rounded');
		    	}
		    },
		    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
		        console.log(JSON.stringify(jqXHR));
		        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
		    }
		});
	}
});

$('#verifyform').submit(function(event) {
	event.preventDefault();
	var otp = $('#otpfield').val();
	if (!$.isNumeric(otp) || otp.length < 6 || otp.length > 6) {
		Materialize.toast('Invalid OTP', 2000, 'rounded');
	}
	else {
		$.ajax({
		    method: 'POST',
		    url: 'verify',
		    data: {'otp': otp},
		    success: function(response){
		    	$('html').html(response['html']);
		    },
		    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
		        console.log(JSON.stringify(jqXHR));
		        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
		    }
		});
	}
});