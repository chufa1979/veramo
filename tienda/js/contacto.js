(function($){
$(document).ready(function(){
	var usuario = $.session.get("user");
	if (usuario === undefined) {
		window.location.href = "index.html";
	} 

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
	var cartc = '<a href="pedido.html" class="cart">$'+muestracarromin()+' ('+muestracarromax()+' &iacute;tems)</a>';muestracarromin();
	var carga4 = $("#cartc").html(cartc);

	$.when( carga1, carga2, carga3, carga4 ).done(function(results1, results2, results3, results4) {
		$('.loadingpage').hide(); //oculto mediante id
        $(".id_nombre_user2").html("Bienvenido/a "+$.session.get("nombreapellido"));
        
        $('#razonsocial').val($.session.get("razon_social"));
        $('#nombre').val($.session.get("nombreapellido"));
        $('#email').val($.session.get("email"));

		
		
	}).fail(function() {
		// will be called if one (or both) requests fail.  If a request does fail,
		// the `done` callback will *not* be called even if one request succeeds.
	});

	///////////LLama a genera Meni
	genera_menu();
	  



});
})(jQuery);


function MM_goToURL() { //v3.0
	  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
	  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
   }

