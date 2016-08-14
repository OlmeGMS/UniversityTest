<?php
session_start();
//Carga variable con el path de aplicación
if(!isset($_SESSION['url']) || $_SESSION['url'] == ""){
	$_SESSION['url'] = $_SERVER['SCRIPT_NAME'];
}
//Si el usuario se logueo omite el login
if(isset($_SESSION['login']) && $_SESSION['login'] == "valid"){
    header("Location: view/modules/instructor/instructor.php");
}else {
    header("Location: view/login.php");
}
