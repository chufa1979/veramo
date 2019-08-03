<?php include ("seguridad.php");?>
<?php require_once('../../Connections/cone.php'); ?>
<?php
session_start();
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$iduser = $_SESSION['iduser'];
mysql_select_db($database_cone, $cone);
$query_rscv = "SELECT * FROM veramo_cliente WHERE id = $iduser";
$rscv = mysql_query($query_rscv, $cone) or die(mysql_error());
$row_rscv = mysql_fetch_assoc($rscv);
$totalRows_rscv = mysql_num_rows($rscv);
?>
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

<!-- Enviar -->
	<script type='text/javascript'>
    function guardar(){
     var url = "contacto_ok.php"; // El script a dónde se realizará la petición.
        $.ajax({
               type: "POST",
               url: url,
               data: $("#formu").serialize(), // Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $(".contact_form").html(data); // Mostrar la respuestas del script PHP.
               }
             });
        return false; // Evitar ejecutar el submit del formulario.
     }
    </script>
    
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
      <form id="formu" name="formu" method="post" action="javascript:void();" onsubmit="guardar()">
        <div class="ruta">Inicio &raquo; <strong>Contacto</strong></div>
        <div class="listado_misdatos">
        <div class="contact_form">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="30" align="left" valign="middle">Raz&oacute;n Social</td>
            </tr>
            <tr>
              <td align="left" valign="top"><input name="razonsocial" type="text" class="campos" id="razonsocial" value="<?php echo $row_rscv['razon_social']; ?>" /></td>
            </tr>
            <tr>
              <td height="30" align="left" valign="middle">Nombre</td>
            </tr>
            <tr>
              <td align="left" valign="top"><input name="nombre" type="text" class="campos" id="nombre" value="<?php echo $row_rscv['nombre']; ?>" /></td>
            </tr>
            <tr>
              <td height="30" align="left" valign="middle">Email</td>
            </tr>
            <tr>
              <td align="left" valign="top"><input name="email" type="text" class="campos" id="email" value="<?php echo $row_rscv['usuario']; ?>" /></td>
            </tr>
            <tr>
              <td height="30" align="left" valign="middle"> Consulta*</td>
            </tr>
            <tr>
              <td align="left" valign="top"><textarea name="consulta" cols="20" class="campo_comentarios" id="consulta" required="required" ></textarea></td>
            </tr>
          </table>
          <div class="pedido_botones">
          <input name="button" type="submit" class="agregar_pedido" id="button" value="ENVIAR" />
        	</div>
          </div>
        </div>
        
      </form>
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