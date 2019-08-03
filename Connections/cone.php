<?php
error_reporting(0);
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cone = "190.228.29.68";
$database_cone = "veramo_tienda";
$username_cone = "ver2018";
$password_cone = "Vertienda5698";
$cone = mysql_pconnect($hostname_cone, $username_cone, $password_cone) or trigger_error(mysql_error(),E_USER_ERROR); 
?>