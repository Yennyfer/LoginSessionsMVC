<?php 
	session_start(); 
	if (empty($_SESSION['idUsuario'])){
		header("Location: login.php");
	}else{
		if($_SESSION['TipoUsuario'] == "Administrador"){
			echo "Hola Administrador";
		}else if ($_SESSION['TipoUsuario'] == "Empleado"){
			echo "Hola Empleado";
		}else if ($_SESSION['TipoUsuario'] == "Cliente"){
			echo "Hola Cliente";
		}
	}
?>
<a href="../Controlador/usuarios_controller.php?action=CerrarSession">Cerrar Session</a>
