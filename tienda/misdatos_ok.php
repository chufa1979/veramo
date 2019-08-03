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
<div class="contenido_pedido">
    <div class="main">
<div class="ruta">
	  Inicio &raquo; <strong>Mis datos</strong></div>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="250" align="left" valign="middle">Los datos fueron actualizados correctamente.</td>
        </tr>
      </table>
    </div>
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