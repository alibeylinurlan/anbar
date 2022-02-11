$(document).ready(function(){

	//inzibatci etme  inzibatci terefinden
	$('.inzet').click(function(){
		var id = $(this).attr('id');
		var data = "id="+id;        
	    $.ajax({
	       type: "post",
	       url:   "ajaxs/inzetajx.php",
	       data: data, 
	       // beforeSend: function(){                 
	       //    	 
	       //    	},
	       success: function(result){ 
	      		$('.innoadmin'+id).hide();
				$('.st'+id).addClass('inzibatci').html('inzibatci');
	         }
	    });
	});

	//izibatci etme bas admin terefinden
	$('.inzetadmin').click(function(){
		var id = $(this).attr('id');
		var data = "id="+id;        
	    $.ajax({
	       type: "post",
	       url:   "ajaxs/inzetajx.php",
	       data: data, 
	       // beforeSend: function(){                 
	       //    	 
	       //    	},
	       success: function(result){ 
	      		$('.inadmin'+id).hide();
	      		$('.inadmin'+id).next('.modadmin'+id).fadeIn();
				$('.st'+id).addClass('inzibatci').html('inzibatci');
	         }
	    });
	});
	//moderator etme bas admin terefinden
	$('.modetadmin').click(function(){
		var id = $(this).attr('id');
		var data = "id="+id;        
	    $.ajax({
	       type: "post",
	       url:   "ajaxs/modetajx.php",
	       data: data, 
	       // beforeSend: function(){                 
	       //    	 
	       //    	},
	       success: function(result){ 
	      		$('.modadmin'+id).hide();
	      		$('.modadmin'+id).prev('.inadmin'+id).fadeIn();
				$('.st'+id).removeClass('inzibatci').addClass('moderator').html('moderator');
	         }
	    });
	});

});