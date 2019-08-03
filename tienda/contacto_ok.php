<?php
include ("seguridad.php");
?><?php 
	// Mandamos el mail

	$headers = array
	(
		'From: '.$_POST['email'].' <'.$_POST['email'].'>',
		'Reply-to: '.$_POST['email'].' <'.$_POST['email'].'>',
		'Content-type: text/html',
	);

	$headers = join("\n",$headers)."\n\n";

	$body  = '<html><head><style type="text/css"> p,ul { font-family: Arial; font-size: 12px } </style></head><body>';
	$body .= '<p><b>Datos de la consulta:</b></p>';
	$body .= '<p>';
	$body .= '<b>Razon Social: </b> '.$_POST['razonsocial'].'<br>';
	$body .= '<b>Nombre: </b> '.$_POST['nombre'].'<br>';
	$body .= '<b>E-mail: </b> '.$_POST['email'].'<br>';
	$body .= '<b>Consulta: </b> '.$_POST['consulta'].'<br>';
	$body .= '</p>';
	$body .= '</body></html>';
	@mail('veritomika@gmail.com','VERAMO - Consulta Tienda Mayorista Mobile',$body,$headers);
	//@mail('luz@iconteam.com','VERAMO - Consulta Tienda Mayorista Mobile',$body,$headers);
	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="200" align="center" valign="middle"><span class="contacto">Tu consulta ha sido enviada.<br />
Te responderemos a la brevedad.<br />
<br />
Muchas gracias! <br />
VERAMO </span></td>
  </tr>
</table>
