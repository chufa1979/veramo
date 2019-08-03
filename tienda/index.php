<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<title>VERAMO &bull; Tienda Mayorista</title>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
body {
	background-color: #339999;
	margin:0;
	}
html { -webkit-text-size-adjust: 100%;	}
.top {
	background-color:#FFF;
	text-align:center;
	padding:15px;
	}
.top img { height:40px; width:auto; }
.login {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
	}
.login_campo {
	width:300px;
	font-family: 'Raleway', sans-serif;
	font-size:20px;
	letter-spacing: 0.1em;
	color:#fff;
	padding:10px;
	border:none;
	display:block;
	margin:20px 0px;
	border:1px solid #fff;
	background-color:#339999;
	}
.enviar {
	width:300px;
	font-family: 'Raleway', sans-serif;
	font-size:18px;
	font-weight:300;
	letter-spacing: 0.1em;
	color:#000;
	padding:10px;
	border:none;
	width:100%;
	display:block;
	margin:20px 0px;
	background-color:#E5E5E5;
	cursor:pointer;
	}
input, textarea, select, button { -webkit-appearance: none;  -webkit-border-radius: 0;	}
:-moz-placeholder {
	color: #fff;
	}
::-webkit-input-placeholder {
	color: #fff;
	}
</style>

</head>

<body>
<div class="top"><img src="../img/veramo.png" width="230" height="55" alt="VERAMO &bull; Tienda Mayorista" /></div>
<div class="login">
  <form id="form1" name="form1" method="post" action="control.php">
  <?php if (isset($_GET["errorusuario"])) { ?>
    <? if ($_GET["errorusuario"]==1){ ?>
    <span style="color:#FFFFFF">*Error de Usuario</span>
	<? } ?>
    <? if ($_GET["errorusuario"]==2){ ?>
    <span style="color:#FFFFFF">*Error de Contrase&ntilde;a</span>
	<? } ?>
    <? if ($_GET["errorusuario"]==0){ ?>
    <span style="color:#FFFFFF">*Usuario deshabilitado</span>
	<? } ?>        
    <? } ?>
    <input name="usuario" type="text" class="login_campo" id="usuario" placeholder="Usuario (e-mail)*" required="required" />
    <input name="contrasena" type="password" required="required" class="login_campo" id="contrasena" placeholder="Contrase&ntilde;a*" />
    <input name="button" type="submit" class="enviar" id="button" value="INGRESAR" />
  </form>
</div>
</body>
</html>