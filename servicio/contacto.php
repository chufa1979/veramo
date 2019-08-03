<?php include ("seguridad.php");?>
<?php require_once('../Connections/cone.php'); ?>
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
<link href="js/styles.css" rel="stylesheet" type="text/css" />
<link href="js/styles-media.css" rel="stylesheet" type="text/css" />
<!-- Enviar -->
	<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
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
          Inicio &raquo; <strong>Contacto</strong></div>
  </div>
  <div class="main">
  <form id="formu" name="formu" method="post" action="javascript:void();" onsubmit="guardar()">
    <div class="listado_misdatos">
        <div class="contact_form">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="100" align="left" valign="middle">Raz&oacute;n Social:</td>
              <td align="left" valign="middle" class="misdatos"><input name="razonsocial" type="text" class="campos_consulta" id="razonsocial" value="<?php echo $row_rscv['razon_social']; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle">Nombre:</td>
              <td align="left" valign="middle" class="misdatos"><input name="nombre" type="text" class="campos_consulta" id="nombre" value="<?php echo $row_rscv['nombre']; ?>" /></td>
            </tr>
            <tr>
              <td align="left">Email</td>
              <td align="left" valign="middle" class="misdatos"><input name="email" type="text" class="campos_consulta" id="email" value="<?php echo $row_rscv['usuario']; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="top"><br />
              Consulta*:</td>
              <td align="left" valign="middle" class="misdatos"><textarea name="consulta" cols="20" class="campo_comentarios" id="consulta" required="required" ></textarea></td>
            </tr>
          </table>
        </div>
      </div>
        <div class="pedido_botones">
          <input name="button" type="submit" class="finalizar_pedido" id="button" value="ENVIAR" />
        </div>
    </form>
  </div>
</div>
<!-- fin PRODUCTO -->

<!-- FOOT  -->
<?php include("footer.php"); ?>
<!-- fin FOOT  -->
    
</body>
</html>