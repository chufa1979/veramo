<?php require_once('../../Connections/cone.php'); ?>
<? include ("seguridad.php"); ?>
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

/********************************************************************************/
$total =0;
if ((isset($_POST["enviarp"])) || (isset($_POST["enviarp_x"]))) {

	$idcli = $_POST['idcli'];
	$comentarios = $_POST['comentarios'];
	$fecha = date ("Y-m-d");
	$totalc = $_POST['total'];

	mysql_select_db($database_cone, $cone);
	$query_rs1 = "INSERT INTO veramo_pedidos (fecha,comentario,total,cliente) values ('$fecha','$comentarios','$totalc','$idcli')";
	$rs1 = mysql_query($query_rs1, $cone) or die(mysql_error());

	
	$id_compra = mysql_insert_id();
	
	/**************/

						
							
		while (list($id,$info) = each($_SESSION['productos']))
		{
			while (list($titulo,$varios) = each($info))
			{
				while (list($color,$cantidad) = each($varios))
				{		

					mysql_select_db($database_cone, $cone);
					$query_rs1 = "INSERT INTO veramo_pedidos_productos (id_producto,id_compra) values ('$id','$id_compra')";
					$rs1 = mysql_query($query_rs1, $cone) or die(mysql_error());
					$id_compra_prod = mysql_insert_id();
							
					mysql_select_db($database_cone, $cone);
					$query_rs_pro_de = "SELECT * FROM veramo_productos WHERE id = $id";
					$rs_pro_de = mysql_query($query_rs_pro_de, $cone) or die(mysql_error());
					$row_rs_pro_de = mysql_fetch_assoc($rs_pro_de);
					$totalRows_rs_pro_de = mysql_num_rows($rs_pro_de);	
					$nombrep = $row_rs_pro_de['nombre'];
					$articulo = $row_rs_pro_de['articulo'];
					$totales = 0;
					$talleok = '';
											
					if ($_SESSION['productos_talle_s'][$id][$titulo][$color]<>''){
						
						$cantidad = $_SESSION['productos_talle_s'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio1'];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;	
						$m = $row_rs_pro_de['m1'];		
					
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo',s ='$cantidad',m1 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= 'S'; } else { $talleok .= ' - S'; }
						  

									
					}
					if ($_SESSION['productos_talle_m'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_m'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio1'];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$m = $row_rs_pro_de['m2'];		
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', m ='$cantidad',m2 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= 'M'; } else { $talleok .= ' - M'; }
					}
					if ($_SESSION['productos_talle_l'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_l'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio1'];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$m = $row_rs_pro_de['m3'];
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', l ='$cantidad',m3 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= 'L'; } else { $talleok .= ' - L'; }
					}
					if ($_SESSION['productos_talle_xl'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_xl'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio1'];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$m = $row_rs_pro_de['m4'];
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', xl ='$cantidad',m4 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= 'XL'; } else { $talleok .= ' - XL'; }
					}
					if ($_SESSION['productos_talle_xxl'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_xxl'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio1'];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$m = $row_rs_pro_de['m5'];
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', xxl ='$cantidad',m5 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= 'XXL'; } else { $talleok .= ' - XXL'; }
					}
					if ($_SESSION['productos_talle_xxxl'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_xxxl'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio1'];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$m = $row_rs_pro_de['m6'];
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', xxxl ='$cantidad',m6 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= 'XXXL'; } else { $talleok .= ' - XXXL'; }
					}	
					
					if ($_SESSION['productos_talle_xxxxl'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_xxxxl'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio1'];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$m = $row_rs_pro_de['m7'];
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', xxxxl ='$cantidad',m7 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= 'XXXXL'; } else { $talleok .= ' - XXXXL'; }
					}						
									
					if ($_SESSION['productos_talle_1'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_1'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio2'];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$m = $row_rs_pro_de['m8'];
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', t1 ='$cantidad',m8 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= '1'; } else { $talleok .= ' - 1'; }
					}
					if ($_SESSION['productos_talle_2'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_2'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio2'];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$m = $row_rs_pro_de['m9'];
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', t2 ='$cantidad',m9 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= '2'; } else { $talleok .= ' - 2'; }
					}
					if ($_SESSION['productos_talle_3'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_3'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio2'];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$m = $row_rs_pro_de['m10'];
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', t3 ='$cantidad',m10 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= '3'; } else { $talleok .= ' - 3'; }
					}
					if ($_SESSION['productos_talle_4'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_4'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio2'];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$m = $row_rs_pro_de['m11'];
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', t4 ='$cantidad',m11 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= '4'; } else { $talleok .= ' - 4'; }
					}
					if ($_SESSION['productos_talle_5'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_5'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio2'];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$m = $row_rs_pro_de['m12'];
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', t5 ='$cantidad',m12 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= '5'; } else { $talleok .= ' - 5'; }
					}	
					if ($_SESSION['productos_talle_6'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_6'][$id][$titulo][$color];
						$precio = $row_rs_pro_de['precio2'];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$m = $row_rs_pro_de['m13'];
						
						$updateSQL = "UPDATE veramo_pedidos_productos SET precio='$precio', cantidad='$cantidad', nombre='$nombrep', color='$color', articulo='$articulo', t6 ='$cantidad',m13 = '$m' WHERE id='$id_compra_prod'";
						  mysql_select_db($database_cone, $cone);
						  $Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());
						  
						  if ($talleok=='') { $talleok .= '6'; } else { $talleok .= ' - 6'; }
					}					

						$updateSQL = "UPDATE veramo_pedidos_productos SET talle='$talleok',total='$totales' WHERE id='$id_compra_prod'";
						mysql_select_db($database_cone, $cone);
						$Result1 = mysql_query($updateSQL, $cone) or die(mysql_error());																																																	
				}
			}	
		}
	/**************/

			/////////////////////////////////////////
			  $nombre= $_SESSION['nombreapellido'];
			  $razon_sol = $_SESSION['razon_social'];
			  $fechare = date("Y-m-d");
			  $mensajeaccion = 'Realizó un pedido';
			  $insertSQL = "INSERT INTO registro (razon_social, nombre, accion, fecha) VALUES ('$razon_sol','$nombre','$mensajeaccion','$fechare')";
			  mysql_select_db($database_cone, $cone);
			  $Result1 = mysql_query($insertSQL, $cone) or die(mysql_error());			
			/////////////////////////////////////////	
	$_SESSION['productos'] = array();

/**************************************************************/
	$idweb = $_SESSION['iduser'];
	mysql_select_db($database_cone, $cone);
	$query_rs_micuenta = "SELECT * FROM veramo_cliente WHERE id = '$idweb'";
	$rs_micuenta = mysql_query($query_rs_micuenta, $cone) or die(mysql_error());
	$row_rs_micuenta = mysql_fetch_assoc($rs_micuenta);
	$totalRows_rs_micuenta = mysql_num_rows($rs_micuenta);
	

	$_SESSION['productos'] = array();
	
	mysql_select_db($database_cone, $cone);
	$query_rsp = "SELECT * FROM veramo_productos WHERE id = '$id_compra'";
	$rsp = mysql_query($query_rsp, $cone) or die(mysql_error());
	$row_rsp = mysql_fetch_assoc($rsp);
	$totalRows_rsp = mysql_num_rows($rsp);
	
	mysql_select_db($database_cone, $cone);
	$query_rs_prot = "SELECT * FROM veramo_pedidos_productos WHERE id_compra = $id_compra";
	$rs_prot = mysql_query($query_rs_prot, $cone) or die(mysql_error());
	$row_rs_prot = mysql_fetch_assoc($rs_prot);
	$totalRows_rs_prot = mysql_num_rows($rs_prot);	
	
  //////////////////////////////////////////////////////////////////////////
	$baseurl ="http://www.veramo.com.ar/tienda/email_pedido.php?idpedido=".$id_compra;
	$contenido2 = stripslashes(file_get_contents($baseurl));	
	$asunto = "Veramo - Pedido Tienda Mayorista"; 
	$mailes = $row_rs_micuenta['usuario'];
	///echo $mailes;
	
	$headers = array
	(
		'From: no-responder@veramo.com.ar <no-responder@veramo.com.ar>',
		'Reply-to: no-responder@veramo.com.ar <no-responder@veramo.com.ar>',
		'Content-type: text/html',
	);
	$headers = join("\n",$headers)."\n\n";
   
    @mail('veritomika@gmail.com',$asunto,$contenido2,$headers);
	@mail('administracion@veramo.com.ar',$asunto,$contenido2,$headers);
	@mail($mailes,$asunto,$contenido2,$headers);
	//////////////////////////////////////
/**************************************************************/
}
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
  Inicio &raquo; <strong>Pedido enviado</strong></div>
<div class="refresh"><br />
    Tu pedido ha sido procesado con &eacute;xito!<br />
    <br />
Recibi&aacute; un email con su pedido. Nos comunicaremos a para coordinar la entrega y pago. <br />
<br />
Muchas gracias por su compra.<br />
  <br />
  <strong>VERAMO</strong></div>
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