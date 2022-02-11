$(document).ready(function(){
	//plus minus proses
	$(".plusy").click(function(){
		$(this).hide();
		$(".plusx").show();
		$(".plusx, .plusy").css({"transform" : "rotateZ(45deg)"});
		$('.yeni').show(300);
		$('#ad').focus();
	});
	$(".plusx").click(function(){
		$(this).hide();
		$(".plusy").show();
		$(".plusx, .plusy").css({"transform" : "rotateZ(0deg)"});
		$('.yeni').hide(300);
	});

	
	//silme prosesi ajaxla
	var silinen_sayi = $(".silinenler").attr('id'); 
	$(".sil").click(function(){
		silinen_sayi++;
	    var id  = $(this).attr('id'); 
	    var data   = "id="+id;        
	    $.ajax({
	       type: "post",
	       url:   "ajaxs/softdeleteajx.php",
	       data: data, 
	       // beforeSend: function(){                 
	       //    	 
	       //    	},
	       success: function(result){ 
	      		$(".s" + id).parent().parent().fadeOut(300); 
	      		$('.silinenler').html('Silinənlər : ' + silinen_sayi);
	         }
	    });   
	});

	//update prosesi ajaxla
	$(".duzelt").click(function(){
		$(this).parent().parent().hide();
		$(this).parent().parent().next('.mehsul_form').fadeIn(300); 
	});
	$(".geri").click(function(){
		$(this).parent().parent().hide();
		$(this).parent().parent().prev('tr').fadeIn(300); 
	});
	$(".tesdiq").click(function(){
		var id = $(this).attr('id');
		var ad = $('#fad'+id).val();
		var miqdar = $('#fmiqdar'+id).val();
		var mayadeyeri = $('#fmayadeyeri'+id).val();
		var satisqiymeti = $('#fsatisqiymeti'+id).val();
		var qazanc = (satisqiymeti-mayadeyeri)*miqdar;
		
		var data = "id="+id+"&ad="+ad+"&miqdar="+miqdar+
		"&mayadeyeri="+mayadeyeri+"&satisqiymeti="+satisqiymeti;        
	    $.ajax({
	       type: "post",
	       url:   "ajaxs/duzeltajx.php",
	       data: data, 
	       // beforeSend: function(){                 
	       //    	 
	       //    	},
	       success: function(result){ 
	      		$('#ad'+id).html(ad);
	      		$('#miqdar'+id).html(miqdar);
	      		$('#mayadeyeri'+id).html(mayadeyeri + ' azn');
	      		$('#satisqiymeti'+id).html(satisqiymeti + ' azn');
	      		$('#qazanc'+id).html(qazanc + ' azn');

	      		$('#fad'+id).parent().parent().hide();
				$('#fad'+id).parent().parent().prev('tr').fadeIn(300); 
	         }
	    });
	});

	//axtaris prosesi
	$('#axtar').click(function(){
		$('#gelen').show(300);
		$('.bagla').fadeIn();
	});
	$('.bagla').click(function(){
		$('#gelen').hide(300);
		$(this).fadeOut();
	});  
    $("input[name=axtar]").keyup(function(){
    	var value  = $(this).val(); 
    	var data   = "data="+value;        
    	$.ajax({
	        type: "post",
	        url:   "ajaxs/axtarajx.php",
	        data: data, 
	        beforeSend: function(){                 
	          $("#gelen").fadeIn().html('...');
	          },
	        success: function(result){ 
	          $("#gelen").html(result); 
	          }
        });   
    }); 


    //yukleme prosesi
    $(".yukle").click(function(){
    	
		
		var ad = $('input[name=ad]').val();
		var miqdar = $('input[name=miqdar]').val();
		var olcuvahidi = $('select[name=olcuvahidi]').val();
		var mayadeyeri = $('input[name=mayadeyeri]').val();
		var satisqiymeti = $('input[name=satisqiymeti]').val();		
		
		var data = "ad="+ad+"&miqdar="+miqdar+"&olcuvahidi="+olcuvahidi+
		"&mayadeyeri="+mayadeyeri+"&satisqiymeti="+satisqiymeti;        
	    $.ajax({
	       type: "post",
	       url:   "ajaxs/yenimehsulajx.php",
	       data: data, 
	       // beforeSend: function(){                 
	       //    	 
	       //    	},
	       success: function(result){ 
	      		$('tbody').prepend(result);
	      		$('tbody tr:first-child').hide();
	      		$('tbody tr:first-child').show(800);

	      		$('input[name=ad]').val('');
				$('input[name=miqdar]').val('');
				$('input[name=mayadeyeri]').val('');
				$('input[name=satisqiymeti]').val('');
				$('input[name=ad]').focus();
	         }
	    });
	});

        

});