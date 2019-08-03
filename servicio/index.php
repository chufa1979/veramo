<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: mobile/index.php');
?>
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
	font-family: 'Raleway', sans-serif;
	font-size:20px;
	}
html { -webkit-text-size-adjust: 100%;	}
.top {
	background-color:#FFF;
	text-align:center;
	padding:25px;
	}
.login {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
	}
.login_campo {
	width:320px;
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
	font-size:23px;
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
@media only screen and (min-width : 320px) and (max-width : 479px) {
.top img { height:40px; width:auto; }
}
@media only screen and (min-width : 480px) and (max-width : 767px) {
.top { padding:15px; }
.top img { height:40px; width:auto; }
}
</style>

</head>

<body>
<div class="top"><img src="img/veramo.png" width="230" height="55" alt="VERAMO &bull; Tienda Mayorista" /></div>
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