(function($){
$(document).ready(function(){

	////MENU////

	var menuc = urlServicios + "nav.php";

	$("#navc").load(menuc,{valor1:'primer valor', valor2:'segundo valor'}, function(response, status, xhr) {
		if (status == "error") {
		  var msg = "Error!, algo ha sucedido: ";
		  $("#navc").html(msg + xhr.status + " " + xhr.statusText);
		} 
	});
	  
	  

$('#cssmenu li.active').addClass('open').children('ul').show();
	$('#cssmenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp(200);
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
	});

});
})(jQuery);


function MM_goToURL() { //v3.0
	  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
	  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
   }

