<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-08-29
 * Time: 21:13
 */
require_once ('../model/user/UserDao.class.php');
require_once ('../model/user/User.class.php');
require_once ('../services/EmailService.php');
session_start();

class UserFacade
{

    public $user;
    public $userDao;
    public $emailService;
    public $json;

    public function __construct()
    {
        $this->user = new User($_POST['registerUser'],$_POST['registerPassword'],
            $_POST['registerDocument'],$_POST['registerFirstName'],$_POST['registerSecondName'],$_POST['registerFirstLastName'],$_POST['registerSecondLastName'],
            $_POST['registerRol'],true,$_POST['registerEmail']
        );
        $this->userDao = new UserDao();
        $this->emailService = new EmailService();
    }

    public function registerUser(){
        if($this->userDao->getUser($this->user) != null){
            $json = array("response" => false, "message" => "El usuario ya existe");
        }else {
            if ($this->userDao->insertUser($this->user)) {
                $result = $this->emailService->sendEmail($this->user->getEmail(),
                    $this->user->getFirstName() . " " . $this->user->getSecondName() . " " . $this->user->getFirstLastName() . " " . $this->user->getSecondLastName(),
                    "Este es el tema", "Este es el Mensaje");
                if ($result != true) {
                    $json = array("response" => true, "message" => "Usuario registrado. !no se puedo enviar correo¡");
                } else {
                    $json = array("response" => true, "message" => "El usuario se registro correctamente");
                }
            } else {
                $json = array("response" => false, "message" => "Error al registrar el usuario");
            }
        }
        echo json_encode($json);
    }
}
?>