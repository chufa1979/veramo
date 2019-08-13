(function($){
	$(document).ready(function(){
	
		////MENU////
		var menuc = urlServicios + "nav.php";
		var carga1 = $.get(menuc,  function(htmlexterno){ $("#navc").html(htmlexterno);});
		////Footer///
		var footerc = "footer.html";
		var carga2 = $.get(footerc,  function(htmlexterno){ $("#footc").html(htmlexterno);});
		  ////Banner///
		
		var vid = getParameterByName('vid');
		var contenidoc = urlServicios + "producto.php?vid="+vid;

		var carga3 = $.get(contenidoc,  function(htmlexterno){ $("#contenidopro").html(htmlexterno);});
		////Cart///
		var cartc = urlServicios + "cart.php";
		var carga4 = $.get(cartc,  function(htmlexterno){ $("#cartc").html(htmlexterno);});
	
		$.when( carga1, carga2, carga3, carga4 ).done(function(results1, results2, results3, results4) {
			$('.loadingpage').hide(); //oculto mediante id
			$(".id_nombre_user2").html("Bienvenido/a "+$.session.get("nombreapellido"));
			$('#columna2').zoom();	
		}).fail(function() {
			// will be called if one (or both) requests fail.  If a request does fail,
			// the `done` callback will *not* be called even if one request succeeds.
		});
	
		///////////LLama a genera Meni
		genera_menu();
		  
	
	
	
	});
	})(jQuery);
	
	function getParameterByName(name) {
		name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
		return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
	
	function MM_goToURL() { //v3.0
		  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
		  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
	   }

	   function cambiai(imageso){
		///alert(imageso);
		$("#imagesource").attr("src",imageso);
		$(".zoomImg").attr("src",imageso);
		$(".zoomImg").css({'min-width':'1000px','min-height':'1500px'});
	}
	
	