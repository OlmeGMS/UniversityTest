<?php
/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 20/10/2016
 * Time: 11:32
 */
require_once ('../../../model/user/User.class.php');
require_once ('../../../utils/DbConnection.php');

class UserService{
    private $conn = null;

    function __construct() {
        $this->conn = DBConnection::connect();
    }
}

