<?php include ("seguridad.php");?>
<?php require_once('../../Connections/cone.php'); ?>
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

$colname_rs_cate_ver = "-1";
if (isset($_GET['vid'])) {
  $colname_rs_cate_ver = $_GET['vid'];
}
mysql_select_db($database_cone, $cone);
$query_rs_cate_ver = sprintf("SELECT * FROM veramo_categorias WHERE id = %s", GetSQLValueString($colname_rs_cate_ver, "int"));
$rs_cate_ver = mysql_query($query_rs_cate_ver, $cone) or die(mysql_error());
$row_rs_cate_ver = mysql_fetch_assoc($rs_cate_ver);
$totalRows_rs_cate_ver = mysql_num_rows($rs_cate_ver);

$colname_rspr = "-1";
if (isset($_GET['vid'])) {
  $colname_rspr = $_GET['vid'];
}

	if (isset($_GET['ordenar'])) {
		$b = $_GET['ordenar'];
		if ($b==1) {
			$orden = ' ORDER BY precio1 ASC';
		}
		if ($b==2) {
			$orden = ' ORDER BY precio1 DESC';
		}
		if ($b==3) {
			$orden = ' ORDER BY nombre ASC';
		}
		if ($b==4) {
			$orden = ' ORDER BY nombre DESC';
		}	
		if ($b==5) { $mas = "AND nuevo = '1'";
			$orden = ' ORDER BY id ASC';
		}								
	} else {
		$orden = ' ORDER BY nuevo DESC, id DESC';
	}
	
mysql_select_db($database_cone, $cone);
if ($colname_rs_cate_ver==9) {
	$query_rspr = "SELECT * FROM veramo_productos WHERE sale = '1' and mostrar<>'0' $orden";

} else {
	$query_rspr = sprintf("SELECT * FROM veramo_productos WHERE categoria = %s and mostrar<>'0' $mas $orden", GetSQLValueString($colname_rspr, "int"));

}
$rspr = mysql_query($query_rspr, $cone) or die(mysql_error());
$row_rspr = mysql_fetch_assoc($rspr);
$totalRows_rspr = mysql_num_rows($rspr);
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
    <script>
        function pasa(){
            document.form_1.submit();
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

<!-- ENCABEZADO  -->
<div class="imagen_resp">
    <img src="../<?php echo $row_rs_cate_ver['imagen2']; ?>" alt="<?php echo $row_rs_cate_ver['categoria']; ?>" />
    <div class="vacia">
      <div id="categoria_titulo"><?php echo $row_rs_cate_ver['categoria']; ?></div>
    </div>
</div>
<!-- fin ENCABEZADO  -->

<!-- CONTENIDO  -->
<div class="contenido">
    <div class="main">
      <form id="form_1" name="form_1" method="get" action="">
        <div class="ruta">Inicio &raquo; <strong><?php echo ucwords(strtolower($row_rs_cate_ver['categoria'])); ?></strong>
        <input name="vid" type="hidden" id="vid" value="<?php echo $_GET['vid']; ?>" />
        </div>
		<?php if ($totalRows_rspr<>0) { ?>
        <div class="ordenar"> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="70">Ordenar</td>
              <td>
            <select name="ordenar" class="desplegable" id="ordenar" onchange="pasa();">
            <option selected="selected" value="" <?php if (!(strcmp("", $_GET['ordenar']))) {echo "selected=\"selected\"";} ?>>Por defecto</option>
            <option value="1" <?php if (!(strcmp(1, $_GET['ordenar']))) {echo "selected=\"selected\"";} ?>>Precio (Menor a mayor)</option>
            <option value="2" <?php if (!(strcmp(2, $_GET['ordenar']))) {echo "selected=\"selected\"";} ?>>Precio (Mayor a menor)</option>
            <option value="3" <?php if (!(strcmp(3, $_GET['ordenar']))) {echo "selected=\"selected\"";} ?>>Alfab&eacute;ticamente (A-Z)</option>
            <option value="4" <?php if (!(strcmp(4, $_GET['ordenar']))) {echo "selected=\"selected\"";} ?>>Alfab&eacute;ticamente (Z-A)</option>
            <option value="5" <?php if (!(strcmp(5, $_GET['ordenar']))) {echo "selected=\"selected\"";} ?>>Nuevo</option>
            </select>
          </td>
            </tr>
          </table>
        </div>
        
	
    <?php do { ?>
      <div class="prod_listado">
        <div class="foto"><a href="producto.php?vid=<?php echo $row_rspr['id']; ?>"><img class="lazy" data-original="../<?php echo $row_rspr['imagen1']; ?>" alt="<?php echo $row_rspr['nombre']; ?>" /></a></div>
        <div class="nombre">
        <div class="vacia">
        <?php if ($row_rspr['nuevo']==1) { ?>
        <div class="tags"><img src="../img/tag_nuevo.png" width="105" height="40" alt="NUEVO" /></div>
        <?php } ?>
        <?php if ($row_rspr['sale']==1) { ?>
        <div class="tags"><img src="../img/tag_sale.png" width="105" height="40" alt="SALE!" /></div>
        <?php } ?>
        <?php if ($row_rspr['stock']==0) { ?>
        <div class="tags"><img src="../img/tag_sinstock.png" width="105" height="40" alt="SIN STOCK" /></div>
        <?php } ?>
      </div>        
        <span><?php echo $row_rspr['nombre']; ?></span><br />
        <?php if ($row_rspr['precio1']<>0) {
			echo '$'.$row_rspr['precio1']; 
		} else {
			if ($row_rspr['precio2']<>0) {
		echo '$'.$row_rspr['precio2'];
			}
		}
			
			
			 ?></div>
      </div>
      <?php } while ($row_rspr = mysql_fetch_assoc($rspr)); ?>
      <?php } else { ?>
    <div class="listado_misdatos">     
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="200" align="center" valign="middle">No hay productos en esta categor&iacute;a&nbsp;</td>
        </tr>
      </table>
    </div>
	<?php } ?>
      </form>
    </div>
</div>
<!-- fin CONTENIDO  -->

<!-- FOOT  -->
<?php include("footer.php"); ?>
<!-- fin FOOT  -->

<!-- Lazy Load -->
<script src="../js/lazyload/jquery.lazyload.js?v=1.9.1"></script>
<script type="text/javascript" charset="utf-8">
	  $(function() {
		 $("img.lazy").lazyload({
		effect : "fadeIn"
		});
	  });
</script>
    
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