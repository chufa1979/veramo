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
	  ////Contenido///
	var vid = getParameterByName('vid');
	var contenidoc = urlServicios + "categoria.php?vid="+vid;
	
	var carga3 = $.get(contenidoc,  function(htmlexterno){ $(".contenido").html(htmlexterno);});
	////Cart///
	var cartc = urlServicios + "cart.php";
	var carga4 = $.get(cartc,  function(htmlexterno){ $("#cartc").html(htmlexterno);});

	////Cart///
	var encabc = urlServicios + "encabezado.php?vid="+vid;
	var carga5 = $.get(encabc,  function(htmlexterno){ $("#encabezado").html(htmlexterno);});


	$.when( carga1, carga2, carga3, carga4, carga5 ).done(function(results1, results2, results3, results4, results5) {
		$('.loadingpage').hide(); //oculto mediante id
		$(".id_nombre_user2").html("Bienvenido/a "+$.session.get("nombreapellido"));
		////////

		$("img.lazy").lazyload({
			effect : "fadeIn"
		});

		var slideLeft = new Menu({
			wrapper: '#o-wrapper',
			type: 'slide-left',
			menuOpenerClass: '.c-button',
			maskId: '#c-mask'
		});
		
		var slideLeftBtn = document.querySelector('#c-button--slide-left');
		  
		slideLeftBtn.addEventListener('click', function(e) {
			e.preventDefault;
			slideLeft.open();
		});
		
		
	}).fail(function() {
		// will be called if one (or both) requests fail.  If a request does fail,
		// the `done` callback will *not* be called even if one request succeeds.
	});

	///////////LLama a genera Meni
	genera_menu();
	  
	

		///////////////



});
})(jQuery);


function MM_goToURL() { //v3.0
	  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
	  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
   }

   function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function pasa(){
	document.form_1.submit();
}

