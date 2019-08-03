<?php include ("seguridad.php");?>
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

$colname_rs = "-1";
if (isset($_GET['vid'])) {
  $colname_rs = $_GET['vid'];
}
mysql_select_db($database_cone, $cone);
$query_rs = sprintf("SELECT * FROM veramo_productos WHERE id = %s", GetSQLValueString($colname_rs, "int"));
$rs = mysql_query($query_rs, $cone) or die(mysql_error());
$row_rs = mysql_fetch_assoc($rs);
$totalRows_rs = mysql_num_rows($rs);

$cate = $row_rs ['categoria'];

mysql_select_db($database_cone, $cone);
$query_rs_cate_ver = "SELECT * FROM veramo_categorias WHERE id = '$cate'";
$rs_cate_ver = mysql_query($query_rs_cate_ver, $cone) or die(mysql_error());
$row_rs_cate_ver = mysql_fetch_assoc($rs_cate_ver);
$totalRows_rs_cate_ver = mysql_num_rows($rs_cate_ver);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<title>VERAMO &bull; Tienda Mayorista</title>
<link href="js/styles.css" rel="stylesheet" type="text/css" />
<link href="js/styles-media.css" rel="stylesheet" type="text/css" />
<!-- Zoom -->
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script type="text/javascript" src='js/zoom/jquery.zoom.js'></script>
    <script type="text/javascript">
    $(document).ready(function(){
                $('#columna2').zoom();
            });
	function cambiai(imageso){
		///alert(imageso);
		$("#imagesource").attr("src",imageso);
		$(".zoomImg").attr("src",imageso);
		$(".zoomImg").css({'min-width':'1000px','min-height':'1500px'});
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
  <div class="ruta">
          Inicio &raquo; <?php echo ucwords(strtolower($row_rs_cate_ver['categoria'])); ?>  &raquo; <strong><?php echo $row_rs['nombre']; ?></strong>
        </div>
        </div>
  <div class="main">
    <div id="columna1">
    
      <div class="prod_thumb"><a href="javascript:void(0);"><?php if ($row_rs['imagen1']<>'') { ?><img src="<?php echo $row_rs['imagen1']; ?>" alt="<?php echo $row_rs['nombre']; ?>" onclick="cambiai('<?php echo $row_rs['imagen1']; ?>')" /></a><?php } ?></div>
      
      
      <div class="prod_thumb"><a href="javascript:void(0);"><?php if ($row_rs['imagen2']<>'') { ?><img src="<?php echo $row_rs['imagen2']; ?>" alt="<?php echo $row_rs['nombre']; ?>" onclick="cambiai('<?php echo $row_rs['imagen2']; ?>')" /><?php } ?></a></div>
      
      
      <div class="prod_thumb"><a href="javascript:void(0);"><?php if ($row_rs['imagen3']<>'') { ?><img src="<?php echo $row_rs['imagen3']; ?>" alt="<?php echo $row_rs['nombre']; ?>" onclick="cambiai('<?php echo $row_rs['imagen3']; ?>')" /><?php } ?></a></div>
      
      
      <div class="prod_thumb"><a href="javascript:void(0);"><?php if ($row_rs['imagen4']<>'') { ?><img src="<?php echo $row_rs['imagen4']; ?>" alt="<?php echo $row_rs['nombre']; ?>" onclick="cambiai('<?php echo $row_rs['imagen4']; ?>')" /><?php } ?></a></div>
      
      
    </div>
    <div id="columna2" class="zoom"><img src="<?php echo $row_rs['imagen1']; ?>" alt="<?php echo $row_rs['nombre']; ?>" name="imagesource" id="imagesource" /></div>
    <div id="columna3">
<script type="text/javascript">

function checkRadios(form) {
   var btns = form.color;
   for (var i=0; el=btns[i]; i++) {
     if (el.checked) return true;
   }
   alert('Por favor seleccione un color');
   return false;
}
</script>    
      <form id="form1" name="form1" method="post" action="pedir.php" onsubmit="return checkRadios(this);">
        <div class="prod_descripcion">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="530" align="left" valign="top">
            <div class="prod_nombre"><?php echo $row_rs['nombre']; ?></div>
          <div class="prod_art">Art. <?php echo $row_rs['articulo']; ?></div>
<?php if ($row_rs['stock']==0) { ?>
<div class="prod_pedir"><br />

		<span class="sinstock">SIN STOCK</span></div>

<?php } ?>          
          
          <?php if ($row_rs['stock']<>0) { ?>
          <div class="prod_colores">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="80" align="left" valign="top" class="prod_subtitulo1">COLORES</td>
                <td align="left">
                <?php if ($row_rs['color1']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color1']; ?>" class="rad"/>
                  <label for="color"><?php echo $row_rs['color1']; ?></label>
                </div>
				<?php } ?>  
                <?php if ($row_rs['color2']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color2']; ?>" class="rad" />
                  <label for="color"><?php echo $row_rs['color2']; ?></label>
                </div>
				<?php } ?>                  
                 <?php if ($row_rs['color3']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color3']; ?>" class="rad" />
                  <label for="color3"><?php echo $row_rs['color3']; ?></label>
                </div>
				<?php } ?> 
                <?php if ($row_rs['color4']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color4']; ?>" class="rad" />
                  <label for="color"><?php echo $row_rs['color4']; ?></label>
                </div>
				<?php } ?>      
                <?php if ($row_rs['color5']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color5']; ?>" class="rad" />
                  <label for="color5"><?php echo $row_rs['color5']; ?></label>
                </div>
				<?php } ?>    
                <?php if ($row_rs['color6']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color6']; ?>" class="rad" />
                  <label for="color"><?php echo $row_rs['color6']; ?></label>
                </div>
				<?php } ?>  
                <?php if ($row_rs['color7']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color7']; ?>" class="rad" />
                  <label for="color"><?php echo $row_rs['color7']; ?></label>
                </div>
				<?php } ?>      
                <?php if ($row_rs['color8']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color8']; ?>" class="rad" />
                  <label for="color8"><?php echo $row_rs['color8']; ?></label>
                </div>
				<?php } ?>
                <?php if ($row_rs['color9']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color9']; ?>" class="rad" />
                  <label for="color"><?php echo $row_rs['color9']; ?></label>
                </div>
				<?php } ?>
                <?php if ($row_rs['color10']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color10']; ?>" class="rad" />
                  <label for="color"><?php echo $row_rs['color10']; ?></label>
                </div>
				<?php } ?>
                <?php if ($row_rs['color11']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color11']; ?>" class="rad" />
                  <label for="color"><?php echo $row_rs['color11']; ?></label>
                </div>
				<?php } ?>
                <?php if ($row_rs['color12']<>'') { ?>
                <div class="prod_colores_listado">
                  <input type="radio" name="color" id="radio" value="<?php echo $row_rs['color12']; ?>" class="rad" />
                  <label for="color"><?php echo $row_rs['color12']; ?></label>
                </div>
				<?php } ?>
                <input type="radio" name="color" id="radio" value="" class="rad" style="display:none"/>                                                                                                                   
                </td>
              </tr>
            </table>
            <div class="prod_precios">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="120" align="left" class="prod_subtitulo2">PRECIO</td>
                  <td width="140" align="left" class="prod_precio_unid"><?php if (($row_rs['precio1']<>'') && ($row_rs['precio1']<>0)) { ?>
                  $<?php echo $row_rs['precio1']; ?>
                  <?php } ?></td>
                  <td align="left" class="prod_precio_unid">
                  <?php if (($row_rs['precio2']<>'') && ($row_rs['precio2']<>0)) { ?>
                  $<?php echo $row_rs['precio2']; ?>
                  <?php } ?>
                  </td>
                </tr>
              </table>
            </div>
            <?php if ($row_rs['stock']<>0) { ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="80" align="left" valign="top" class="prod_subtitulo1">TALLES</td>
                <td width="150" align="left" valign="top">
				<?php if ($row_rs['talle_s']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m1']; ?></td>
                      <td width="110"><select name="talle_s" class="cant_prenda" id="talle_s">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
                
                <?php if ($row_rs['talle_m']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m2']; ?></td>
                      <td width="110"><select name="talle_m" class="cant_prenda" id="talle_m">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
                
                <?php if ($row_rs['talle_l']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m3']; ?></td>
                      <td width="110"><select name="talle_l" class="cant_prenda" id="talle_l">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
                
                <?php if ($row_rs['talle_xl']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m4']; ?></td>
                      <td width="110"><select name="talle_xl" class="cant_prenda" id="talle_xl">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
                
                <?php if ($row_rs['talle_xxl']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m5']; ?></td>
                      <td width="110"><select name="talle_xxl" class="cant_prenda" id="talle_xxl">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
                
                <?php if ($row_rs['talle_xxxl']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m6']; ?></td>
                      <td width="110"><select name="talle_xxxl" class="cant_prenda" id="talle_xxxl">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>   

                <?php if ($row_rs['talle_xxxxl']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m7']; ?></td>
                      <td width="110"><select name="talle_xxxxl" class="cant_prenda" id="talle_xxxxl">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>                                 
                
                </td>
                <td align="left" valign="top">
                
                <?php if ($row_rs['talle_1']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m8']; ?></td>
                      <td width="110"><select name="talle_1" class="cant_prenda" id="talle_1">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
                
                <?php if ($row_rs['talle_2']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m9']; ?></td>
                      <td width="110"><select name="talle_2" class="cant_prenda" id="talle_2">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
                
                <?php if ($row_rs['talle_3']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m10']; ?></td>
                      <td width="110"><select name="talle_3" class="cant_prenda" id="talle_3">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
                
                <?php if ($row_rs['talle_4']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m11']; ?></td>
                      <td width="110"><select name="talle_4" class="cant_prenda" id="talle_4">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
                
                <?php if ($row_rs['talle_5']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m12']; ?></td>
                      <td width="110"><select name="talle_5" class="cant_prenda" id="talle_5">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>
                
			<?php if ($row_rs['talle_6']==1){ ?>
                <div>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="40"><?php echo $row_rs['m13']; ?></td>
                      <td width="110"><select name="talle_6" class="cant_prenda" id="talle_6">
                  <option value="0" selected="selected">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select></td>
                    </tr>
                  </table>
                </div>
                <?php } ?>                
                
                </td>
              </tr>
            </table>
            <?php } ?>
          </div>
          <?php } ?>
          </td>
          </tr>
        </table>
        </div>
        <?php if ($row_rs['stock']<>0) { ?>
        <div class="prod_pedir">
				<input name="vid" type="hidden" id="vid" value="<?php echo $row_rs['id']; ?>" />
                <input name="a" type="hidden" id="a" value="agregar" />
                <input name="id" type="hidden" id="id" value="<?php echo $row_rs['id']; ?>" />
                <input name="titulo" type="hidden" id="titulo" value="<?php echo $row_rs['nombre']; ?>" />
          <input name="button" type="submit" class="agregar_pedido" id="button" value="PEDIR" />
        </div>
        
        <div class="prod_guia">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="20" align="left" valign="top">&raquo; Gu&iacute;a de talles</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#CCC;">
          <tr>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">S</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">M</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">L</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">XL</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF" class="linea">XXL</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">1</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">2</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">3</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">4</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">5</td>
          </tr>
          <tr>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">40/42</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">44</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">46</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">48</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF" class="linea">50</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">52</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">54</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">56</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">58</td>
            <td width="10%" height="25" align="center" valign="middle" bgcolor="#FFFFFF">60</td>
          </tr>
        </table>
      </div>
      <?php } ?>
      </form>
    </div>
  </div>
  <div class="main">
    <div class="prod_relacionados">COMPLET&Aacute; EL LOOK</div>
    <?php $rela1 =  $row_rs['producto_relacionado_1'];
mysql_select_db($database_cone, $cone);
$query_relac01 = "SELECT * FROM veramo_productos WHERE id = $rela1";
$relac01 = mysql_query($query_relac01, $cone) or die(mysql_error());
$row_relac01 = mysql_fetch_assoc($relac01);
$totalRows_relac01 = mysql_num_rows($relac01);	
if ($totalRows_relac01<>0){
	 ?>
    <div class="prod_listado">
      <div class="foto"><a href="producto.php?vid=<?php echo $row_relac01['id']; ?>"><img src="<?php echo $row_relac01['imagen1']; ?>" alt="<?php echo $row_relac01['nombre']; ?>" /></a></div>
      <div class="nombre"><span><?php echo $row_relac01['nombre']; ?></span><br />
        <?php if ($row_relac01['precio1']<>0) {
			echo '$'.$row_relac01['precio1']; 
		} else {
			if ($row_relac01['precio2']<>0) {
		echo '$'.$row_relac01['precio2'];
			}
		}
			 ?>
             </div>
    </div>
    <?php } ?>
    
<?php $rela1 =  $row_rs['producto_relacionado_2'];
mysql_select_db($database_cone, $cone);
$query_relac01 = "SELECT * FROM veramo_productos WHERE id = $rela1";
$relac01 = mysql_query($query_relac01, $cone) or die(mysql_error());
$row_relac01 = mysql_fetch_assoc($relac01);
$totalRows_relac01 = mysql_num_rows($relac01);	
if ($totalRows_relac01<>0){
	 ?>
    <div class="prod_listado">
      <div class="foto"><a href="producto.php?vid=<?php echo $row_relac01['id']; ?>"><img src="<?php echo $row_relac01['imagen1']; ?>" alt="<?php echo $row_relac01['nombre']; ?>" /></a></div>
      <div class="nombre"><span><?php echo $row_relac01['nombre']; ?></span><br />
        <?php if ($row_relac01['precio1']<>0) {
			echo '$'.$row_relac01['precio1']; 
		} else {
			if ($row_relac01['precio2']<>0) {
		echo '$'.$row_relac01['precio2'];
			}
		}
			 ?></div>
    </div>
    <?php } ?>
    
<?php $rela1 =  $row_rs['producto_relacionado_3'];
mysql_select_db($database_cone, $cone);
$query_relac01 = "SELECT * FROM veramo_productos WHERE id = $rela1";
$relac01 = mysql_query($query_relac01, $cone) or die(mysql_error());
$row_relac01 = mysql_fetch_assoc($relac01);
$totalRows_relac01 = mysql_num_rows($relac01);	
if ($totalRows_relac01<>0){
	 ?>
    <div class="prod_listado">
      <div class="foto"><a href="producto.php?vid=<?php echo $row_relac01['id']; ?>"><img src="<?php echo $row_relac01['imagen1']; ?>" alt="<?php echo $row_relac01['nombre']; ?>" /></a></div>
      <div class="nombre"><span><?php echo $row_relac01['nombre']; ?></span><br />
        <?php if ($row_relac01['precio1']<>0) {
			echo '$'.$row_relac01['precio1']; 
		} else {
			if ($row_relac01['precio2']<>0) {
		echo '$'.$row_relac01['precio2'];
			}
		}
			 ?></div>
    </div>
    <?php } ?>    
  </div>
</div>
<!-- fin PRODUCTO -->

<!-- FOOT  -->
<?php include("footer.php"); ?>
<!-- fin FOOT  -->
    
</body>
</html>
<?php
mysql_free_result($rs);

mysql_free_result($relac01);
?>
