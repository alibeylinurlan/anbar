
$(document).ready(function(){
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
});
