<?php require_once('../Connections/cone.php'); ?>
<?php
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

$colname_rsp = "-1";
if (isset($_GET['idpedido'])) {
  $colname_rsp = $_GET['idpedido'];
}
mysql_select_db($database_cone, $cone);
$query_rsp = sprintf("SELECT * FROM veramo_pedidos WHERE id = %s", GetSQLValueString($colname_rsp, "int"));
$rsp = mysql_query($query_rsp, $cone) or die(mysql_error());
$row_rsp = mysql_fetch_assoc($rsp);
$totalRows_rsp = mysql_num_rows($rsp);

$colname_rs_cliente = $row_rsp['cliente'];
mysql_select_db($database_cone, $cone);
$query_rs_cliente = sprintf("SELECT * FROM veramo_cliente WHERE id = %s", GetSQLValueString($colname_rs_cliente, "int"));
$rs_cliente = mysql_query($query_rs_cliente, $cone) or die(mysql_error());
$row_rs_cliente = mysql_fetch_assoc($rs_cliente);
$totalRows_rs_cliente = mysql_num_rows($rs_cliente);

$colname_rs_productos = "-1";
if (isset($_GET['idpedido'])) {
  $colname_rs_productos = $_GET['idpedido'];
}
mysql_select_db($database_cone, $cone);
$query_rs_productos = sprintf("SELECT * FROM veramo_pedidos_productos WHERE id_compra = %s", GetSQLValueString($colname_rs_productos, "int"));
$rs_productos = mysql_query($query_rs_productos, $cone) or die(mysql_error());
$row_rs_productos = mysql_fetch_assoc($rs_productos);
$totalRows_rs_productos = mysql_num_rows($rs_productos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>VERAMO &bull; Tienda Mayorista</title>
<style type="text/css">
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: normal;
	color: #333333;
	margin: 0px;
	}
.titulo {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #339999;
	font-weight:bold;
	padding:10px;
	border-bottom: solid 2px #339999;
	}
a { color: #000;}
.top {
	background-color:#339999;
	padding:10px;
	color:#FFF;
	font-weight: bold;
	}
.recuadro { padding:10px; }
.listado { padding-top:5px; padding-bottom:5px; }
.pie {	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color:#339999;
	font-weight:bold;
	}
	
.lineav {
    border-right: 1px solid #CCC;
}	
</style>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" bgcolor="#339999" class="recuadro"><img src="http://www.veramo.com.ar/tienda/img/veramo_mail.png" alt="VERAMO &bull; Tienda Mayorista" width="230" height="55" /></td>
  </tr>
  <tr>
    <td align="left" class="recuadro"><strong>PEDIDO N&deg; <?php echo $row_rsp['id']; ?>&nbsp;&nbsp;|  &nbsp;
      Fecha:
	<?php
    $cadenars1  = $row_rsp['fecha'];
    list($anio,$mes,$dia)=explode("-",$cadenars1); 
    echo $dia.".".$mes.".".$anio; 
    ?>
    </strong></td>
  </tr>
  <tr>
    <td align="left" class="titulo">Cliente</td>
  </tr>
  <tr>
    <td align="left" class="recuadro"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="150" align="left" class="listado">Raz&oacute;n Social:</td>
        <td width="250" align="left"><strong><?php echo $row_rs_cliente['razon_social']; ?></strong></td>
        <td width="150" align="left">CUIT:</td>
        <td align="left"><strong><?php echo $row_rs_cliente['cuit']; ?></strong></td>
      </tr>
      <tr>
        <td align="left" class="listado">Direcci&oacute;n:</td>
        <td align="left"><strong><?php echo $row_rs_cliente['direccion']; ?></strong></td>
        <td align="left">Localidad:</td>
        <td align="left"><strong><?php echo $row_rs_cliente['localidad']; ?></strong></td>
      </tr>
      <tr>
        <td align="left" class="listado">Provincia:</td>
        <td align="left"><strong><?php echo $row_rs_cliente['provincia']; ?></strong></td>
        <td align="left">CP:</td>
        <td align="left"><strong><?php echo $row_rs_cliente['cp']; ?></strong></td>
      </tr>
      <tr>
        <td align="left" class="listado">Nombre:</td>
        <td align="left"><strong><?php echo $row_rs_cliente['nombre']; ?></strong></td>
        <td align="left">Tel&eacute;fono:</td>
        <td align="left"><strong><?php echo $row_rs_cliente['telefono']; ?></strong></td>
      </tr>
      <tr>
        <td align="left" class="listado">Email:</td>
        <td align="left"><strong><?php echo $row_rs_cliente['email']; ?></strong></td>
        <td align="left">Celular:</td>
        <td align="left"><strong><?php echo $row_rs_cliente['celular']; ?></strong></td>
      </tr>
      <tr>
        <td align="left" class="listado">Comentarios:</td>
        <td colspan="3" align="left"><strong><?php echo $row_rsp['comentario']; ?></strong></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" class="titulo">Detalle del pedido</td>
  </tr>
  <tr>
    <td align="left" class="recuadro"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="listado">
        <td width="80" align="left"><strong>Art.</strong></td>
        <td width="400" align="left"><strong>Producto</strong></td>
        <td width="120" align="left" ><strong>Color</strong></td>
        <td align="left"><strong>Talles</strong><strong></strong></td>
        <td width="120" align="right" ><strong>Sub total</strong></td>
      </tr>
    </table>
      <?php do { ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="80" align="left" class="listado"><?php echo $row_rs_productos['articulo']; ?></td>
              <td width="400" align="left" class="listado"><?php echo $row_rs_productos['nombre']; ?></td>
              <td width="120" align="left" class="listado"><?php echo $row_rs_productos['color']; ?></td>
              <td align="center" class="listado"><?php if ($row_rs_productos['s']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['s']; ?></strong> x <?php echo $row_rs_productos['m1']; ?></div><?php } ?>
<?php if ($row_rs_productos['m']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['m']; ?></strong> x <?php echo $row_rs_productos['m2']; ?></div><?php } ?>                     
<?php if ($row_rs_productos['l']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['l']; ?></strong> x <?php echo $row_rs_productos['m3']; ?></div><?php } ?>               
<?php if ($row_rs_productos['xl']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['xl']; ?></strong> x <?php echo $row_rs_productos['m4']; ?></div><?php } ?>  
<?php if ($row_rs_productos['xxl']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['xxl']; ?></strong> x <?php echo $row_rs_productos['m5']; ?></div><?php } ?>   
<?php if ($row_rs_productos['xxxl']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['xxxl']; ?></strong> x <?php echo $row_rs_productos['m6']; ?></div><?php } ?>  
<?php if ($row_rs_productos['xxxxl']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['xxxxl']; ?></strong> x <?php echo $row_rs_productos['m7']; ?></div><?php } ?>   
<?php if ($row_rs_productos['t1']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['t1']; ?></strong> x <?php echo $row_rs_productos['m8']; ?></div><?php } ?>    
<?php if ($row_rs_productos['t2']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['t2']; ?></strong> x <?php echo $row_rs_productos['m9']; ?></div><?php } ?>      
<?php if ($row_rs_productos['t3']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['t3']; ?></strong> x <?php echo $row_rs_productos['m10']; ?></div><?php } ?>  
<?php if ($row_rs_productos['t4']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['t4']; ?></strong> x <?php echo $row_rs_productos['m11']; ?></div><?php } ?>
<?php if ($row_rs_productos['t5']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['t5']; ?></strong> x <?php echo $row_rs_productos['m12']; ?></div><?php } ?>
<?php if ($row_rs_productos['t6']<>'') { ?><div class="lineav" style="width:50px; height:20px; float:left"><strong><?php echo $row_rs_productos['t6']; ?></strong> x <?php echo $row_rs_productos['m13']; ?></div><?php } ?></td>
              <td width="120" align="right" class="listado">$<?php echo $row_rs_productos['total']; ?>&nbsp;</td>
          </tr>
        </table>
        <?php } while ($row_rs_productos = mysql_fetch_assoc($rs_productos)); ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td class="content"><div class="listadototal">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" class="listado">&nbsp;</td>
                <td width="150" align="right"><strong>TOTAL</strong></td>
                <td width="120" align="right"><strong>$<?php echo $row_rsp['total']; ?></strong></td>
              </tr>
            </table>
          </div></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="70" align="left" class="recuadro">Muchas gracias por su compra!<br />
      <br />
      <span class="pie">VERAMO Tienda Mayorista</span><br />
      <a href="http://www.veramo.com.ar">www.veramo.com.ar</a><br />
      <a href="mailto:ventas@veramo.com.ar">ventas@veramo.com.ar</a></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($rsp);

mysql_free_result($rs_cliente);

mysql_free_result($rs_productos);
?>
