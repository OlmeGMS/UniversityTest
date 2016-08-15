<?php
require_once ('../model/user/UserDao.class.php');

session_start();

$_SESSION['DIR_CONTROLLERS'] = dirname($_SERVER['PHP_SELF']);
<<<<<<< HEAD
=======

>>>>>>> origin/master
if(isset( $_SESSION["login"]) && $_SESSION["login"] == "valid"){
    header("Location: ../view/modules/instructor/instructor.php");
}else{
    $userLogin = new UserDao();
    $result = $userLogin->login($_POST["user"],$_POST["password"]);
    if($result){
        $_SESSION["login"] = "valid";
<<<<<<< HEAD
        $_SESSION['USER'] = $_POST["user"];
=======
>>>>>>> origin/master
        header("Location: ../view/modules/instructor/instructor.php");
    }else{
        $_SESSION["login"] = "invalid";
        header("Location: ../view/login.php");
    }
}



?>