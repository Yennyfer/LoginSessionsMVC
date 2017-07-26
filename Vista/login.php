<?php 
	session_start(); 
	if (!empty($_SESSION['idUsuario'])){
		header("Location: pag3.php");
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Member Login Form Flat Responsive Widget Template | Home :: w3layouts</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Member Login Form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--Google Fonts-->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<link href="js/jquery-ui.min.css" rel="stylesheet">

</head>
<body>
	<h1>Mi Software.com</h1>
<div class="login">
	<div class="login-box1 box effect6">
		<div class="login-top">
				<h2>Bienvenido</h2>
			<div class="user">
				<img src="images/user.png" alt="">

			</div>
		   <div class="clear"> </div>
		</div>
		<form id="frmLogin" name="frmLogin" action="../Controlador/usuarios_controller.php?action=Login">
			<div class="login-bottom">
				<input id="User" name="User" type="text" placeholder="Usuario" value=""/>
				<input id="Password" name="Password" type="password" placeholder="Contraseña" value=""/>
					<div id="resultado" name="resultado" class="ui-widget"></div>
				<br/>
				<div class="send">
					<label class="checkbox"><input type="checkbox" name="checkbox" checked><i> </i> Remember</label>
					<div class="now"> <input id="btnEnviar" name="btnEnviar" type="submit" value="Ingresar"> </div>
					<div class="now"> <input id="btnLimpiar" name="btnLimpiar" type="reset" value="Cancelar"> </div>
				</div>
			</div>
		</form>
	</div>
</div>	
<div class="copyright">
	<p>Template by <a href="http://w3layouts.com/"> W3layouts </a></p>
</div>

	<script>
		$("#frmLogin").submit(function() {
			e.preventDefault();
			var User = $("#User").val();
			var Password = $("#Password").val();

			$.ajax({
				method: "POST",
				url: "../Controlador/usuarios_controller.php?action=Login",
				data: { User: User, Password: Password}
			})
			.done(function( msg ) {
				if(msg == "1"){
					window.location.href = "pag3.php";
				}else{
					$("#resultado").html(msg);	
				}
			});
		});
	</script>

</body>
</html>
