<?php 
require_once('../Connections/cone.php'); 
header("Access-Control-Allow-Origin: *");
header('Content-type: application/json;');

$colname2_ru = "2";
if (isset($_POST['contrasena'])) {
  $colname2_ru = (get_magic_quotes_gpc()) ? $_POST['contrasena'] : addslashes(trim($_POST['contrasena']));
}
$colname_ru = "1";
if (isset($_POST['usuario'])) {
  $colname_ru = (get_magic_quotes_gpc()) ? $_POST['usuario'] : addslashes(trim($_POST['usuario']));
}
mysql_select_db($database_cone, $cone);
$query_ru = sprintf("SELECT * FROM veramo_cliente WHERE `usuario` = '%s' ", $colname_ru);
$ru = mysql_query($query_ru, $cone) or die(mysql_error());
$row_ru = mysql_fetch_assoc($ru);
$totalRows_ru = mysql_num_rows($ru);

if ($totalRows_ru == 0) {
	$erroruser=1;
}

$jsondata = array();

//vemos si el usuario
if ($totalRows_ru > 0) {
	if ($row_ru['clave']==$colname2_ru) {
		if ($row_ru['activo']=='1') {
			$jsondata['success'] = true;
			$jsondata['user'] =$row_ru['usuario'];
			$jsondata['nombreapellido'] = $row_ru['nombre'];
			$jsondata['razon_social'] = $row_ru['razon_social'];
			$jsondata['iduser'] = $row_ru['id'];
			
			/////////////////////////////////////////
			  $nombre= $_SESSION['nombreapellido'];
			  $razon_sol = $_SESSION['razon_social'];
			  $fechare = date("Y-m-d");
			  $mensajeaccion = 'Ingreso a la Tienda';
			  $insertSQL = "INSERT INTO registro (razon_social, nombre, accion, fecha) VALUES ('$razon_sol','$nombre','$mensajeaccion','$fechare')";
			  mysql_select_db($database_cone, $cone);
			  $Result1 = mysql_query($insertSQL, $cone) or die(mysql_error());			
			/////////////////////////////////////////
		} else {
			$errordeshab=1; 
		}
	} else { 
		$errorpass=1; 
	}
} 
if ($errordeshab==1){
	$jsondata['success'] = false;
	$jsondata['valor'] = 1;
}
if ($erroruser==1){
	$jsondata['success'] = false;
	$jsondata['valor'] = 2;
}
if ($errorpass==1){
	$jsondata['success'] = false;
	$jsondata['valor'] = 3;
}

	$json = json_encode($jsondata);
	var_dump($json);
?>