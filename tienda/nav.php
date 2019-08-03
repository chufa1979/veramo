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

mysql_select_db($database_cone, $cone);
$query_rs_cat = "SELECT * FROM veramo_categorias WHERE id <> 9 ORDER BY categoria ASC";
$rs_cat = mysql_query($query_rs_cat, $cone) or die(mysql_error());
$row_rs_cat = mysql_fetch_assoc($rs_cat);
$totalRows_rs_cat = mysql_num_rows($rs_cat);
?>
<div id='cssmenu'>
    <ul>
       <li><span class="bienvenido">Bienvenido/a <? echo $_SESSION['nombreapellido'];?></span></li>
       <li><a href='pedido.php' class="nav_carrito_act">Mi pedido</a></li>
       <li><a href='misdatos.php' class="bienvenido nav_user_act">Mis datos</a></li>
       <li><a href='salir.php' class="nav_salir">Salir</a></li>
       <?php do { ?>
	   <li><a href="categoria.php?vid=<?php echo $row_rs_cat['id']; ?>" class="categ"><?php echo $row_rs_cat['categoria']; ?></a></li>
		<?php } while ($row_rs_cat = mysql_fetch_assoc($rs_cat)); ?>
       <li><a href='categoria.php?vid=9' class="categdisc">DISCONTINUOS</a></li>
       <li><a href='terminos.php'>T&eacute;rminos y Condiciones</a></li>
       <li><a href='contacto.php'>Contacto</a></li>
    </ul>
</div>
<?php
mysql_free_result($rs_cat);
?>
