$(document).ready(function(){
	
	//silmenin berpa prosesi
	var silinen_sayi = $(".silinenler").attr('id'); 
	$(".geriyukle").click(function(){
		silinen_sayi--;
	    var id  = $(this).attr('id'); 
	    var data   = "id="+id;        
	    $.ajax({
	       type: "post",
	       url:   "ajaxs/geriyukleajx.php",
	       data: data, 
	       // beforeSend: function(){                 
	       //    	 
	       //    	},
	       success: function(result){ 
	      		$(".s" + id).parent().parent().fadeOut(300); 
	      		$('.silinenler').html('Cəmi : ' + silinen_sayi);
	         }
	    });   
	});

	$(".tamsil").click(function(){
		silinen_sayi--;
	    var id  = $(this).attr('id'); 
	    var data   = "id="+id;
	    if (confirm("Bu məhsulu həmişəlik silmək istəyirsiniz? ")) 
	    {        
		    $.ajax({
		       type: "post",
		       url:   "ajaxs/tamsilajx.php",
		       data: data, 
		       // beforeSend: function(){                 
		       //    	 
		       //    	},
		       success: function(result){ 
		      		$(".s" + id).parent().parent().fadeOut(300); 
		      		$('.silinenler').html('Cəmi : ' + silinen_sayi);
		         }
		    });
	    }   
	});

});