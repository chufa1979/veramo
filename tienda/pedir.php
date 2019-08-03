<?php 
session_start();
require_once('../../Connections/cone.php');
/******************************************************************************/
if ($_GET['a'] == 'quitauno' && $_GET['id'] != '' && $_GET['titulo'] != '' && $_GET['tama'] != '')
{
	if ($_GET['tama']==1) {
		unset($_SESSION['productos_talle_s'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}
	if ($_GET['tama']==2) {
		unset($_SESSION['productos_talle_m'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}
	if ($_GET['tama']==3) {
		unset($_SESSION['productos_talle_l'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}
	if ($_GET['tama']==4) {
		unset($_SESSION['productos_talle_xl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}
	if ($_GET['tama']==5) {
		unset($_SESSION['productos_talle_xxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}
	if ($_GET['tama']==6) {
		unset($_SESSION['productos_talle_xxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}	
	if ($_GET['tama']==7) {
		unset($_SESSION['productos_talle_xxxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}		
	if ($_GET['tama']==8) {
		unset($_SESSION['productos_talle_1'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}
	if ($_GET['tama']==9) {
		unset($_SESSION['productos_talle_2'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}
	if ($_GET['tama']==10) {
		unset($_SESSION['productos_talle_3'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}
	if ($_GET['tama']==11) {
		unset($_SESSION['productos_talle_4'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}
	if ($_GET['tama']==12) {
		unset($_SESSION['productos_talle_5'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}
	if ($_GET['tama']==13) {
		unset($_SESSION['productos_talle_6'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	}	
		if ( 

		(count($_SESSION['productos_talle_s'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_m'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_l'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_xl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_xxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_xxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_xxxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_1'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_2'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_3'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_4'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_5'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_6'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) 
		)
		{
			unset($_SESSION['productos'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_s'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_m'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_l'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_xl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_xxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_xxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_xxxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_1'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_2'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_3'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_4'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_5'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_6'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
		}	
									
}

if ($_REQUEST['a'] == 'agregar' && $_REQUEST['id'] != '' && $_REQUEST['titulo'] != '')
{
		$_SESSION['productos'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = 1;		

		$_SESSION['productos_talle_s'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_s'];
		if (($_POST['talle_s']==0) || ($_POST['talle_s']<0)){ unset($_SESSION['productos_talle_s'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }
		
		$_SESSION['productos_talle_m'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_m'];
		if (($_POST['talle_m']==0) || ($_POST['talle_m']<0)){ unset($_SESSION['productos_talle_m'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }
		
		$_SESSION['productos_talle_l'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_l'];
		if (($_POST['talle_l']==0) || ($_POST['talle_l']<0)){ unset($_SESSION['productos_talle_l'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }
		
		$_SESSION['productos_talle_xl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_xl'];
		if (($_POST['talle_xl']==0) || ($_POST['talle_xl']<0)){ unset($_SESSION['productos_talle_xl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }
		
		$_SESSION['productos_talle_xxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_xxl'];
		if (($_POST['talle_xxl']==0) || ($_POST['talle_xxl']<0)){ unset($_SESSION['productos_talle_xxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }
		
		$_SESSION['productos_talle_xxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_xxxl'];
		if (($_POST['talle_xxxl']==0) || ($_POST['talle_xxxl']<0)){ unset($_SESSION['productos_talle_xxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }		

		$_SESSION['productos_talle_xxxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_xxxxl'];
		if (($_POST['talle_xxxxl']==0) || ($_POST['talle_xxxxl']<0)){ unset($_SESSION['productos_talle_xxxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }				
		
		$_SESSION['productos_talle_1'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_1'];
		if (($_POST['talle_1']==0) || ($_POST['talle_1']<0)){ unset($_SESSION['productos_talle_1'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }
		
		$_SESSION['productos_talle_2'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_2'];
		if (($_POST['talle_2']==0) || ($_POST['talle_2']<0)){ unset($_SESSION['productos_talle_2'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }
		
		$_SESSION['productos_talle_3'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_3'];
		if (($_POST['talle_3']==0) || ($_POST['talle_3']<0)){ unset($_SESSION['productos_talle_3'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }
		
		$_SESSION['productos_talle_4'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_4'];
		if (($_POST['talle_4']==0) || ($_POST['talle_4']<0)){ unset($_SESSION['productos_talle_4'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }
		
		$_SESSION['productos_talle_5'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_5'];
		if (($_POST['talle_5']==0) || ($_POST['talle_5']<0)){ unset($_SESSION['productos_talle_5'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }

$_SESSION['productos_talle_6'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']] = $_POST['talle_6'];
		if (($_POST['talle_6']==0) || ($_POST['talle_6']<0)){ unset($_SESSION['productos_talle_6'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]); }		
		
		$_SESSION['color'][$_REQUEST['id']][$_REQUEST['titulo']] = $_POST['color'];
		
		if ( 

		(count($_SESSION['productos_talle_s'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_m'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_l'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_xl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_xxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_xxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_xxxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_1'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_2'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_3'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_4'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_5'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) &&
		(count($_SESSION['productos_talle_6'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]) == 0) 
		)
		{
			unset($_SESSION['productos'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_s'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_m'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_l'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_xl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_xxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_xxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_xxxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_1'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_2'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_3'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_4'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_5'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
			unset($_SESSION['productos_talle_6'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
		}

}

if ($_GET['a'] == 'eliminar' && $_GET['id'] != '' && $_GET['titulo'] != '')
{
	unset($_SESSION['productos'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_s'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_m'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_l'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_xl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_xxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_xxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_xxxxl'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_1'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_2'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_3'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_4'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_5'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
	unset($_SESSION['productos_talle_6'][$_REQUEST['id']][$_REQUEST['titulo']][$_REQUEST['color']]);
}

if ($_REQUEST['a'] == 'setear' && $_REQUEST['id'] != '' && $_REQUEST['titulo'] != '')
{
	if ($_REQUEST['cantidad'] < 0)
		$_REQUEST['cantidad'] = 0;

	$_SESSION['productos'][$_REQUEST['id']][$_REQUEST['titulo']] = $_REQUEST['cantidad'];

	if ($_SESSION['productos'][$_REQUEST['id']][$_REQUEST['titulo']] == 0)
		unset($_SESSION['productos'][$_REQUEST['id']][$_REQUEST['titulo']]);

	if (count($_SESSION['productos'][$_REQUEST['id']]) == 0)
		unset($_SESSION['productos'][$_REQUEST['id']]);
}

if ($_REQUEST['a'] == 'eliminatodo')
{
	$_SESSION['productos']= array();
	$_SESSION['productos_talle_s'] = array();
	$_SESSION['productos_talle_m'] = array();
	$_SESSION['productos_talle_l'] = array();
	$_SESSION['productos_talle_xl'] = array();
	$_SESSION['productos_talle_xxl'] = array();
	$_SESSION['productos_talle_xxxl'] = array();
	$_SESSION['productos_talle_xxxxl'] = array();
	$_SESSION['productos_talle_1'] = array();
	$_SESSION['productos_talle_2'] = array();
	$_SESSION['productos_talle_3'] = array();
	$_SESSION['productos_talle_4'] = array();
	$_SESSION['productos_talle_5'] = array();
	$_SESSION['productos_talle_6'] = array();
}

/******************************************************************************/
	header("Location: pedido.php"); 	

?>
