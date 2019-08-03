<?php // error_reporting(E_ALL);?>
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
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
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
          Inicio &raquo; Mi pedido</div>
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
          <td width="80" align="center">Quitar</td>
        </tr>
      </table>
    </div>
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
    <form id="form1" name="form1" method="post" action="pedir.php">
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
                        <input name="talle_s" type="text" class="pedido_cant" id="talle_s" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&id=<?php echo $id;?>&titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&tama=1"><img src="img/quitar.png" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                        <input name="talle_m" type="text" class="pedido_cant" id="talle_m" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=2"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                        <input name="talle_l" type="text" class="pedido_cant" id="talle_l" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=3"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                        <input name="talle_xl" type="text" class="pedido_cant" id="talle_xl" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=4"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                        <input name="talle_xxl" type="text" class="pedido_cant" id="talle_xxl" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=5"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                        <input name="talle_xxxl" type="text" class="pedido_cant" id="talle_xxl" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=6"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                        <input name="talle_xxxxl" type="text" class="pedido_cant" id="talle_xxxxl" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio1'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio1']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=7"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                        <input name="talle_1" type="text" class="pedido_cant" id="talle_1" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=8"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                        <input name="talle_2" type="text" class="pedido_cant" id="talle_2" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=9"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                        <input name="talle_3" type="text" class="pedido_cant" id="talle_3" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=10"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                        <input name="talle_4" type="text" class="pedido_cant" id="talle_4" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=11"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                        <input name="talle_5" type="text" class="pedido_cant" id="talle_5" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=12"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
                      <td width="80" align="left"><?php echo $row_rs_pro_de['m12'];?></td>
                      <td width="45" align="left">
                        <input name="talle_6" type="text" class="pedido_cant" id="talle_6" value="<?php echo $cantidad;?>" /></td>
                      <td width="45" align="left"><input name="imageField2" type="image" class="bot" id="imageField2" src="img/refresh.png" alt="Actualizar" /></td>
                      <td width="100" align="right">$<?php echo $row_rs_pro_de['precio2'];?></td>
                      <td width="100" align="right">$<?php echo ($row_rs_pro_de['precio2']*$cantidad);?></td>
                      <td width="80" align="center"><a href="pedir.php?a=quitauno&amp;id=<?php echo $id;?>&amp;titulo=<?php echo $titulo;?>&color=<?php echo $color;?>&amp;tama=13"><img src="img/quitar.png" alt="" width="16" height="16" style=" width:16px; height:16px;"/></a></td>
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
      </form>
    	<?php  $vig++;?>
<? }}} ?>     
  
<?php } else { ?>
<div class="listado_misdatos">     
      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="200" align="center" valign="middle">No hay productos en el carrito</td>
        </tr>
      </table>
    </div>
<?php } ?>        
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
      <div class="pedido_botones">
          <input name="button2" type="button" class="seguir_pedido" id="button2" onclick="MM_goToURL('parent','home.php');return document.MM_returnValue" value="SEGUIR COMPRANDO" />
          &nbsp;&nbsp;
		  <input name="button" type="submit" class="finalizar_pedido" id="button" onclick="MM_goToURL('parent','pedido_confirmar.php');return document.MM_returnValue" value="FINALIZAR PEDIDO" />
        </div>
    
  </div>
</div>
<!-- fin PRODUCTO -->

<!-- FOOT  -->
<?php include("footer.php"); ?>
<!-- fin FOOT  -->
    
</body>
</html>