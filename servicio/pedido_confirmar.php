<?php require_once('../Connections/cone.php');
include ("seguridad.php");

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
$query_rsuser = "SELECT * FROM veramo_cliente WHERE id = $iduser";
$rsuser = mysql_query($query_rsuser, $cone) or die(mysql_error());
$row_rsuser = mysql_fetch_assoc($rsuser);
$totalRows_rsuser = mysql_num_rows($rsuser);

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
          Inicio &raquo; Confirmar pedido</div>
  </div>
  <div class="main">
    <div class="pedido_top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left">Producto</td>
          <td width="80" align="left">Art&iacute;culo</td>
          <td width="100" align="left">Color</td>
          <td width="80" align="left">Talle</td>
          <td width="90" align="left">Cant</td>
          <td width="100" align="right">P. Unitario</td>
          <td width="100" align="right">SubTotal</td>
          <td width="80" align="center">&nbsp;</td>
        </tr>
      </table>
    </div>
    <form id="form1" name="form1" method="post" action="pedido_ok.php">
<?
if (is_array($_SESSION['productos']) && count($_SESSION['productos'])){
		while (list($id,$info) = each($_SESSION['productos']))
		{
			while (list($titulo,$varios) = each($info))
			{
				while (list($color,$cantidad) = each($varios))
				{
				mysql_select_db($database_cone, $cone);
				$query_rs_pro_de = "SELECT * FROM veramo_productos WHERE id = $id";
				$rs_pro_de = mysql_query($query_rs_pro_de, $cone) or die(mysql_error());
				$row_rs_pro_de = mysql_fetch_assoc($rs_pro_de);
				$totalRows_rs_pro_de = mysql_num_rows($rs_pro_de);	
				$titulo = $row_rs_pro_de['nombre'];
				?>	     
    
      <div class="pedido_listado">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="150" align="left">
            <img src="<?php echo $row_rs_pro_de['imagen1'];?>" width="1000" height="1500" alt="<?php echo $row_rs_pro_de['nombre'];?>" /></td>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top" class="prod"><?php echo $row_rs_pro_de['nombre'];?></td>
                <td width="80" align="left" valign="top" class="prod"><?php echo $row_rs_pro_de['articulo'];?></td>
                <td width="100" align="left" valign="top" class="prod"><? 
		 // if ($_SESSION['color'][$id][titulo]<>''){
		  	echo $color;
		  //}
		  ?></td>
                <td width="450" align="left">
                <?php
				if ($_SESSION['productos_talle_s'][$id][$titulo][$color]<>''){
				$cantidad = $_SESSION['productos_talle_s'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m1'];?></td>
                      <td width="45" align="left"><label for="talle_m"></label>
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio1'] * $cantidad;?>
                <?php } ?>
                
                <?php
				if ($_SESSION['productos_talle_m'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_m'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m2'];?></td>
                      <td width="45" align="left"><label for="talle_m"></label>
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio1'] * $cantidad;?>
                <?php } ?>     

                <?php
				if ($_SESSION['productos_talle_l'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_l'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m3'];?></td>
                      <td width="45" align="left">
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio1'] * $cantidad;?>
                <?php } ?>    
                
			<?php
				if ($_SESSION['productos_talle_xl'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_xl'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m4'];?></td>
                      <td width="45" align="left">
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio1'] * $cantidad;?>
                <?php } ?>   
                
			<?php
				if ($_SESSION['productos_talle_xxl'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_xxl'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m5'];?></td>
                      <td width="45" align="left">
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio1'] * $cantidad;?>
                <?php } ?>    
                
			<?php
				if ($_SESSION['productos_talle_xxxl'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_xxxl'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m6'];?></td>
                      <td width="45" align="left">
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio1'] * $cantidad;?>
                <?php } ?>                      
                
<?php
				if ($_SESSION['productos_talle_xxxxl'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_xxxxl'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m7'];?></td>
                      <td width="45" align="left">
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio1'] * $cantidad;?>
                <?php } ?>  
                
<?php
				if ($_SESSION['productos_talle_1'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_1'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m8'];?></td>
                      <td width="45" align="left">
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio2'] * $cantidad;?>
                <?php } ?>                  
                
<?php
				if ($_SESSION['productos_talle_2'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_2'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m9'];?></td>
                      <td width="45" align="left">
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio2'] * $cantidad;?>
                <?php } ?>   
 <?php
				if ($_SESSION['productos_talle_3'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_3'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m10'];?></td>
                      <td width="45" align="left">
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio2'] * $cantidad;?>
                <?php } ?>                  
 <?php
				if ($_SESSION['productos_talle_4'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_4'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m11'];?></td>
                      <td width="45" align="left">
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio2'] * $cantidad;?>
                <?php } ?>  
                
 <?php
				if ($_SESSION['productos_talle_5'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_5'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m12'];?></td>
                      <td width="45" align="left">
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio2'] * $cantidad;?>
                <?php } ?>    
                
 <?php
				if ($_SESSION['productos_talle_6'][$id][$titulo][$color]<>''){
					$cantidad = $_SESSION['productos_talle_6'][$id][$titulo][$color];
				?>
                <div class="pedido_listadotalle">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m13'];?></td>
                      <td width="45" align="left">
                        <?php echo $cantidad;?></td>
                      <td width="45" align="left">&nbsp;</td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center">&nbsp;</td>
                    </tr>
                  </table>
                </div>
                <?php $total += $row_rs_pro_de['precio2'] * $cantidad;?>
                <?php } ?>                                                                                                                                 
                </td>
              </tr>
            </table></td>
          </tr>
        </table>
				<input name="vid" type="hidden" id="vid" value="<?php echo $row_rs_pro_de['id']; ?>" />
                <input name="a" type="hidden" id="a" value="agregar" />
                <input name="id" type="hidden" id="id" value="<?php echo $row_rs_pro_de['id']; ?>" />
                <input name="titulo" type="hidden" id="titulo" value="<?php echo $row_rs_pro_de['nombre']; ?>" />   
                <input name="color" type="hidden" id="color" value="<?php echo $color; ?>" />       
      </div>
    
    	<?php  $vig++;?>
<? }}} ?>     
  
<?php } else { ?>
  <br />
  <strong>No hay productos en el carrito</strong>
<?php } ?>
<div class="pedido_listado"></div>
    <div class="pedido_total">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left">&nbsp;</td>
          <td width="100" align="right">TOTAL</td>
          <td width="130" align="right">$<?php echo $total;?></td>
          <td width="50" align="center">&nbsp;</td>
        </tr>
      </table>
    </div>
    <br />
    <br />
    <div class="pedido_top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left"><strong>MIS DATOS</strong>  -  <span class="datos_modif">Si desea modificar sus datos haga <strong><a href="misdatos.php" class="datos_modif">click aqu&iacute;</a></strong></span></td>
        </tr>
      </table>
    </div>
    <div class="misdatos_listado">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="100" align="left">Raz&oacute;n Social</td>
          <td width="40%" align="left"><strong><?php echo $row_rsuser['razon_social']; ?></strong></td>
          <td width="100" align="left">CUIT</td>
          <td align="left"><strong><?php echo $row_rsuser['cuit']; ?></strong></td>
        </tr>
      </table>
    </div>
    <div class="misdatos_listado">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="100" align="left">Direcci&oacute;n</td>
          <td width="40%" align="left"><strong><?php echo $row_rsuser['direccion']; ?></strong></td>
          <td width="100" align="left">Localidad</td>
          <td align="left"><strong><?php echo $row_rsuser['localidad']; ?></strong></td>
        </tr>
      </table>
    </div>
    <div class="misdatos_listado">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="100" align="left">Provincia</td>
          <td width="40%" align="left"><strong><?php echo $row_rsuser['provincia']; ?></strong></td>
          <td width="100" align="left">C.P.</td>
          <td align="left"><strong><?php echo $row_rsuser['cp']; ?></strong></td>
        </tr>
      </table>
    </div>
    <div class="misdatos_listado">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="100" align="left">Nombre</td>
          <td width="40%" align="left"><strong><?php echo $row_rsuser['nombre']; ?></strong></td>
          <td width="100" align="left">Tel&eacute;fono</td>
          <td align="left"><strong><?php echo $row_rsuser['telefono']; ?></strong></td>
        </tr>
      </table>
    </div>
    <div class="misdatos_listado">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="100" align="left">Email</td>
          <td width="40%" align="left"><strong><?php echo $row_rsuser['email']; ?></strong></td>
          <td width="100" align="left">Celular</td>
          <td align="left"><strong><?php echo $row_rsuser['celular']; ?></strong></td>
        </tr>
      </table>
    </div>
    <br />
    <div class="comentarios"><strong>Comentarios sobre su pedido</strong></div>
    <textarea name="comentarios" cols="30" rows="3" class="campo_comentarios" id="comentarios"></textarea>
    <div class="pedido_botones">
      <input name="idcli" type="hidden" id="idcli" value="<?php echo $_SESSION['iduser'];?>" />
      <input name="total" type="hidden" id="total" value="<?php echo $total; ?>" />
<input name="button2" type="submit" class="imprimir" id="button2" value="IMPRIMIR" onclick="window.print();"/>
        &nbsp;&nbsp;
	    <input name="enviarp" type="submit" class="finalizar_pedido" id="enviarp" value="ENVIAR PEDIDO" />
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