(function($){
$(document).ready(function(){

	////MENU////
	var menuc = urlServicios + "nav.php";
	var carga1 = $.get(menuc,  function(htmlexterno){ $("#navc").html(htmlexterno);});
	////Footer///
	var footerc = "footer.html";
	var carga2 = $.get(footerc,  function(htmlexterno){ $("#footc").html(htmlexterno);});
  	////Banner///
	var bannerc = urlServicios + "banner.php";
	var carga3 = $.get(bannerc,  function(htmlexterno){ $("#bannerc").html(htmlexterno);});
	////Cart///
	var cartc = urlServicios + "cart.php";
	var carga4 = $.get(cartc,  function(htmlexterno){ $("#cartc").html(htmlexterno);});

	$.when( carga1, carga2, carga3, carga4 ).done(function(results1, results2, results3, results4) {
		$('.loadingpage').hide(); //oculto mediante id
		$(".id_nombre_user").html($.session.get("nombreapellido"));
		
	}).fail(function() {
		// will be called if one (or both) requests fail.  If a request does fail,
		// the `done` callback will *not* be called even if one request succeeds.
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

