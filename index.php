<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == "valid"){
	header("Location: view/login.php");
}else {
    header("Location: view/home.php");
}
