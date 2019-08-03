<?php require_once('../../Connections/cone.php'); 

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
//vemos si el usuario
if ($totalRows_ru > 0) {
	if ($row_ru['clave']==$colname2_ru) {
		if ($row_ru['activo']=='1') {
			session_start();
			$_SESSION['user']=$row_ru['usuario'];
			$_SESSION['nombreapellido']=$row_ru['nombre'];
			$_SESSION['razon_social']=$row_ru['razon_social'];
			$_SESSION['iduser']=$row_ru['id'];
			
			/////////////////////////////////////////
			  $nombre= $_SESSION['nombreapellido'];
			  $razon_sol = $_SESSION['razon_social'];
			  $fechare = date("Y-m-d");
			  $mensajeaccion = 'Ingresó a la Tienda';
			  $insertSQL = "INSERT INTO registro (razon_social, nombre, accion, fecha) VALUES ('$razon_sol','$nombre','$mensajeaccion','$fechare')";
			  mysql_select_db($database_cone, $cone);
			  $Result1 = mysql_query($insertSQL, $cone) or die(mysql_error());			
			/////////////////////////////////////////
			header("location:home.php?".SID);
		} else {
			$errordeshab=1; 
		}
	} else { 
		$errorpass=1; 
	}
} 
if ($errordeshab==1){
header("Location: index.php?errorusuario=0"); 
}
if ($erroruser==1){
header("Location: index.php?errorusuario=1"); 
}
if ($errorpass==1){
header("Location: index.php?errorusuario=2"); 
}
?>