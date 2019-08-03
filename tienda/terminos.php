<?php include ("seguridad.php");?>
<?php require_once('../../Connections/cone.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<title>VERAMO &bull; Tienda Mayorista</title>
<link href="styles_mobile.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<!-- Menu --> 
   <link rel="stylesheet" type="text/css" href="../js/menu/menu_left.css"  />
   <link rel="stylesheet" type="text/css" href="../js/menu/menu_desplegable.css" />
   <script type="text/javascript" src="../js/menu/script.js"></script>
   
</head>
<body>

<!-- Menu --> 
<div id="c-menu--slide-left" class="c-menu c-menu--slide-left">
  <button class="c-menu__close">
<table width="250" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="150" align="left"><img src="../img/veramo.png" width="125" height="30" alt="VERAMO &bull; Tienda Mayorista" /></td>
    <td align="right"><img src="../img/cerrar_menu.png" width="22" height="22" alt="Volver" /></td>
  </tr>
</table>
</button>
<?php include("nav.php"); ?>
</div>
<div id="c-mask" class="c-mask"></div>
<!-- fin Menu -->

<!-- TOP  -->
<div id="top">
  <div class="main">
    <div id="o-wrapper" class="o-wrapper">  
		
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		    <td width="45" align="left"><a href="#" id="c-button--slide-left"><img src="../img/menu.png" width="25" height="24" alt="MENU" /></a></td>
		    <td width="120" align="left"><a href="home.php"><img src="../img/veramo.png" width="125" height="30" alt="VERAMO &bull; Tienda Mayorista" /></a></td>
		    <td align="right"><?php include("cart.php"); ?></td>
	      </tr>
	  </table>
    </div>
  </div>
</div>
<!-- fin TOP  -->

<!-- CONTENIDO  -->
<div class="contenido_detalle">
    <div class="main">
<div class="ruta">
  Inicio &raquo; <strong>T&eacute;rminos y condiciones</strong></div>
<strong>CAMBIOS Y DEVOLUCIONES</strong><br />
La solicitud de devoluci&oacute;n o cambio debe ser hecha dentro de los 15 d&iacute;as a partir de la fecha de recepci&oacute;n del pedido. <br />
Las solicitudes recibidas despu&eacute;s de este plazo no ser&aacute;n aceptada, SIN excepci&oacute;n.<br />
<br />
<p>Las prendas s&oacute;lo ser&aacute;n aceptadas si son devueltas en las siguientes condiciones:</p>
<p>- Con etiqueta y lacre del fabricante intactas;</p>
<p>- En el packaging original, no damnificado.</p>
<p>- No lavadas ni usadas, sin olores ni manchas, ni alteraciones hechas por el cliente (ej: dobladillo, pinzas, etc.);</p>
<p>- Presentar comprobante de compra.
  <br />
  </p></div>
</div>
<!-- fin CONTENIDO  -->

<!-- FOOT  -->
<?php include("footer.php"); ?>
<!-- fin FOOT  -->

<script type="text/javascript" src="../js/menu/menu.js"></script>
<script type="text/javascript">
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
</script>
</body>
</html>