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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE veramo_cliente SET razon_social=%s, direccion=%s, provincia=%s, nombre=%s, email=%s, cuit=%s, localidad=%s, cp=%s, telefono=%s, celular=%s WHERE id=%s",
                       GetSQLValueString($_POST['razonsocial'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"),
                       GetSQLValueString($_POST['provincia'], "text"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['cuit'], "text"),
                       GetSQLValueString($_POST['localidad'], "text"),
                       GetSQLValueString($_POST['cp'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['celular'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_cone, $cone);
  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());

  $updateGoTo = "misdatos_ok.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$idclit = $_SESSION['iduser'];
mysql_select_db($database_cone, $cone);
$query_rscf = "SELECT * FROM veramo_cliente WHERE id = '$idclit'";
$rscf = mysql_query($query_rscf, $cone) or die(mysql_error());
$row_rscf = mysql_fetch_assoc($rscf);
$totalRows_rscf = mysql_num_rows($rscf);
?>
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
          Inicio &raquo; <strong>Mis datos</strong></div>
  </div>
  <div class="main">
  <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
    <div class="listado_misdatos">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="100" align="left" valign="middle">Raz&oacute;n Social:</td>
              <td width="400" align="left" valign="middle" class="misdatos"><input name="razonsocial" type="text" class="campos" id="razonsocial" value="<?php echo $row_rscf['razon_social']; ?>" /></td>
              <td width="100" align="left" valign="middle">CUIT:</td>
              <td width="400" align="left" valign="middle" class="misdatos"><input name="cuit" type="text" class="campos" id="cuit" value="<?php echo $row_rscf['cuit']; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle">Direcci&oacute;n:</td>
              <td align="left" valign="middle" class="misdatos"><input name="direccion" type="text" class="campos" id="direccion" value="<?php echo $row_rscf['direccion']; ?>" /></td>
              <td align="left" valign="middle">Localidad:</td>
              <td align="left" valign="middle" class="misdatos"><input name="localidad" type="text" class="campos" id="localidad" value="<?php echo $row_rscf['localidad']; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle">Provincia:</td>
              <td align="left" valign="middle" class="misdatos"><input name="provincia" type="text" class="campos" id="provincia" value="<?php echo $row_rscf['provincia']; ?>" /></td>
              <td align="left" valign="middle">CP:</td>
              <td align="left" valign="middle" class="misdatos"><input name="cp" type="text" class="campos" id="cp" value="<?php echo $row_rscf['cp']; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle">Nombre:</td>
              <td align="left" valign="middle" class="misdatos"><input name="nombre" type="text" class="campos" id="nombre" value="<?php echo $row_rscf['nombre']; ?>" /></td>
              <td align="left" valign="middle">Tel&eacute;fono:</td>
              <td align="left" valign="middle" class="misdatos"><input name="telefono" type="text" class="campos" id="telefono" value="<?php echo $row_rscf['telefono']; ?>" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle">Email:</td>
              <td align="left" valign="middle" class="misdatos"><input name="email" type="text" class="campos" id="email" value="<?php echo $row_rscf['email']; ?>" /></td>
              <td align="left" valign="middle">Celular:</td>
              <td align="left" valign="middle" class="misdatos"><input name="celular" type="text" class="campos" id="celular" value="<?php echo $row_rscf['celular']; ?>" /></td>
            </tr>
        </table>
      </div>
        <div class="pedido_botones">
          <input name="id" type="hidden" id="id" value="<?php echo $row_rscf['id']; ?>" />
          <input name="button" type="submit" class="finalizar_pedido" id="button" value="ACTUALIZAR DATOS" />
        </div>
        <input type="hidden" name="MM_update" value="form1" />
    </form>
  </div>
</div>
<!-- fin PRODUCTO -->

<!-- FOOT  -->
<?php include("footer.php"); ?>
<!-- fin FOOT  -->
    
</body>
</html>
<?php
mysql_free_result($rscf);
?>