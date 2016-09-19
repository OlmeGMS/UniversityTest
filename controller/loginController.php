<?php
require_once ('../model/user/UserDao.class.php');
require_once ('../model/user/User.class.php');
require ('UserFacade.php');



$_SESSION['DIR_CONTROLLERS'] = dirname($_SERVER['PHP_SELF']);
if(isset( $_SESSION["login"]) && $_SESSION["login"] == "valid"){
    header("Location: ../view/modules/instructor/instructor.php");
}else{
    if($_GET['register'] == true) {
        $userFacade = new UserFacade();
        $userFacade->registerUser();
        //header("Location: ../view/login.php");
    }else {
        $userDao = new UserDao();
        $user = new User($_POST["user"], $_POST["password"], null, null, null, null, null, null, null, null);
        $user = $userDao->login($user);
        if ($user != null) {
            $_SESSION["login"] = "valid";
            $_SESSION['USER'] = $_POST['user'];
            $_SESSION['user'] = $user;
            header("Location: ../view/modules/instructor/instructor.php");
        } else {
            $_SESSION["login"] = "invalid";
            header("Location: ../view/login.php");
        }
    }
}

?>