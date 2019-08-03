<?php
$cantidades = 0;
$totales = 0;
$_SESSION['productost'] = $_SESSION['productos'];
reset($_SESSION['productost']);
if (is_array($_SESSION['productost']) && count($_SESSION['productost'])){
		while (list($id,$info) = each($_SESSION['productost']))
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
					if ($_SESSION['productos_talle_s'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_s'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$cantidades +=  $cantidad;
					}
					if ($_SESSION['productos_talle_m'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_m'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$cantidades +=  $cantidad;
					}
					if ($_SESSION['productos_talle_l'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_l'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$cantidades +=  $cantidad;
					}
					if ($_SESSION['productos_talle_xl'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_xl'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$cantidades +=  $cantidad;
					}
					if ($_SESSION['productos_talle_xxl'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_xxl'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$cantidades +=  $cantidad;
					}
					if ($_SESSION['productos_talle_xxxl'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_xxxl'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$cantidades +=  $cantidad;
					}					
					if ($_SESSION['productos_talle_xxxxl'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_xxxxl'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio1'] * $cantidad;
						$cantidades +=  $cantidad;
					}					
					if ($_SESSION['productos_talle_1'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_1'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$cantidades +=  $cantidad;
					}
					if ($_SESSION['productos_talle_2'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_2'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$cantidades +=  $cantidad;
					}
					if ($_SESSION['productos_talle_3'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_3'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$cantidades +=  $cantidad;
					}
					if ($_SESSION['productos_talle_4'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_4'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$cantidades +=  $cantidad;
					}
					if ($_SESSION['productos_talle_5'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_5'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$cantidades +=  $cantidad;
					}	
					if ($_SESSION['productos_talle_6'][$id][$titulo][$color]<>''){
						$cantidad = $_SESSION['productos_talle_6'][$id][$titulo][$color];
						$totales += $row_rs_pro_de['precio2'] * $cantidad;
						$cantidades +=  $cantidad;
					}																																																		
				}
			}
				
				
		}
		
}

?>
<a href="pedido.php" class="cart">$<?php echo $totales;?> (<?php echo $cantidades;?> &iacute;tems)</a>