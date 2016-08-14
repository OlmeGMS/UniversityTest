<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-08-13
 * Time: 21:55
 */
session_start();
unset($_SESSION["login"]);
header("Location: ".$_SESSION["url"]);

?>
