
$(document).ready(function(){
	//pasword hide show
	$('.fa-eye-slash').hide();
	$('.fa-eye').click(function(){
		$(this).hide();
		$('.fa-eye-slash').fadeIn();
		$('#password').prop({type:"text"});
	});
	$('.fa-eye-slash').click(function(){
		$(this).hide();
		$('.fa-eye').fadeIn();
		$('#password').prop({type:"password"});
	});

	//html validation
	$('#email').attr("oninvalid", "setCustomValidity('Emaili düzgün formatda yazın.')");
	$('#adSoyad').attr("oninvalid", "setCustomValidity('minimum 3 hərfdən ibarət olmalıdır.')");
	$('#password').attr("oninvalid", "setCustomValidity('minimum 5, maxsimum 15 simvol olmalıdır.')");

});
