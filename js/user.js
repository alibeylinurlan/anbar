$(document).ready(function(){
	$('.fa-eye-slash').hide();
	$('.fa-eye').click(function(){
		$('.fa-eye').hide();
		$('.fa-eye-slash').fadeIn();
		$('.password').prop({type:"text"});
	});
	$('.fa-eye-slash').click(function(){
		$('.fa-eye-slash').hide();
		$('.fa-eye').fadeIn();
		$('.password').prop({type:"password"});
	});

	//parol deyisme prosesi ajaxla
	$(".tesdiq").click(function(){
		
		var evvelki = $('.evvel').val();
		var yeni = $('.yeni').val();
		
		var data = "evvelki="+evvelki+"&yeni="+yeni;        
	    $.ajax({
	       type: "post",
	       url:   "ajaxs/paroldeyisajx.php",
	       data: data, 
	       // beforeSend: function(){                 
	       //    	 
	       //    	},
	       success: function(result){ 
	      		 $(".notifi").html(result);
	         }
	    });
	});
});