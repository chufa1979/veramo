<?php include ("seguridad.php");?>
<?php require_once('../Connections/cone.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<title>VERAMO &bull; Tienda Mayorista</title>
<link href="js/styles.css" rel="stylesheet" type="text/css" />
<link href="js/styles-media.css" rel="stylesheet" type="text/css" />
</head>

<body>

<!-- TOP  -->
<div id="top">
<div class="encabezado">
    <div class="logo"><a href="home.php"><img src="img/veramo.png" width="230" height="55" alt="VERAMO &middot; Tienda Mayorista" /></a></div>
    <?php include("cart.php"); ?>
    </div>
	<?php include("nav.php"); ?>
</div>
<!-- fin TOP  -->

<!-- PRODUCTO  -->
<div class="contenido_prod">
  <div class="main">
  <div class="ruta2">
          Inicio &raquo; <strong>T&eacute;rminos y condiciones</strong></div>
  </div>
  <div class="main">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="250" align="left" valign="top"><br />
          <strong>          CAMBIOS Y DEVOLUCIONES</strong><br />
        La solicitud de devoluci&oacute;n o cambio debe ser hecha dentro de los 15 d&iacute;as     a partir de la fecha de recepci&oacute;n del pedido. <br />
        Las solicitudes   recibidas despu&eacute;s de este plazo no ser&aacute;n aceptada, SIN excepci&oacute;n.<br />
        <br />
        <p>Las prendas s&oacute;lo ser&aacute;n aceptadas si son devueltas en las siguientes condiciones:</p>
        <p>- Con etiqueta y lacre del fabricante intactas;</p>
        <p>-   En el packaging original, no damnificado.</p>
        <p>- No lavadas ni usadas, sin   olores ni manchas, ni alteraciones hechas por el   cliente (ej: dobladillo, pinzas, etc.);</p>
        <p>- Presentar comprobante de compra.</p></td>
      </tr>
    </table>
  </div>
</div>
<!-- fin PRODUCTO -->

<!-- FOOT  -->
<?php include("footer.php"); ?>
<!-- fin FOOT  -->
    
</body>
</html>