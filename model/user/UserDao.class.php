<?php

require_once ('User.class.php');
require_once ('IUserDao.class.php');
require_once ('../utils/DbConnection.php');

class UserDao implements IUserDao
{

    private $conn = null;

    public function __construct()
    {
        $this->conn = DbConnection::connect();
    }

    public function getUser(User $user)
    {
        $query = "SELECT eva_usuario, eva_password,eva_documento, eva_pnombre, eva_snombre, eva_papellido, eva_sapellido, eva_idrolfk, eva_estado, eva_email FROM tbl_usuarios WHERE eva_usuario = '".$user->getUser()."'";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                    $user = new User(
                        $row->eva_usuario,
                        $row->eva_password,
                        $row->eva_documento,
                        $row->eva_pnombre,
                        $row->eva_snombre,
                        $row->eva_papellido,
                        $row->eva_sapellido,
                        $row->eva_idrolfk,
                        $row->eva_estado,
                        $row->eva_email
                    );
                    break;
                }
            }else{
                $user = null;
            }
        }
        catch (PDOException $e) {
            $user = null;
        }
        finally{
            DbConnection::disconnect();
        }
        return $user;
    }


    public function login(User $user)
    {
        $sql = "SELECT eva_idUsuariopk,eva_usuario, eva_password FROM tbl_usuarios WHERE eva_usuario = '".$user->getUser()."' AND eva_password = '".$user->getPassword()."'";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                    $user->setId($row->eva_idusuariopk);
                    break;
                }
                $result = $user;
            }else{
                $result = null;
            }
        }
        catch (PDOException $e) {
            echo "Error SQL :" . $e->getMessage();
        }
        finally{
            DbConnection::disconnect();
        }
        return $result;
    }


    public function getAll()
    {
        $result = array();
        $sql = 'SELECT eva_usuario, eva_password FROM tbl_usuarios';
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                $newUser = new User($row->iduser, $row->nombres);
                $result[] = $newUser;
            }
        }
        catch (PDOException $e) {
            echo "Error SQL :" . $e->getMessage();
        }
        finally{
            DbConnection::disconnect();
        }
        return $result;
    }


    //This method allows you insert a record of user object in database

    public function insertUser(User $user)
    {
        $query = "INSERT INTO tbl_usuarios (eva_documento,eva_pnombre,eva_sNombre,eva_papellido,eva_sapellido,eva_usuario,eva_password,eva_idrolfk,eva_estado,eva_email) VALUES(?,?,?,?,?,?,?,?,?,?)";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $user->getDocument(), PDO::PARAM_INT);
            $stmt->bindParam(2, $user->getFirstName(), PDO::PARAM_STR);
            $stmt->bindParam(3, $user->getSecondName(), PDO::PARAM_STR);
            $stmt->bindParam(4, $user->getFirstLastName(), PDO::PARAM_STR);
            $stmt->bindParam(5, $user->getSecondLastName(), PDO::PARAM_STR);
            $stmt->bindParam(6, $user->getUser(), PDO::PARAM_STR);
            $stmt->bindParam(7, $user->getPassword(), PDO::PARAM_STR);
            $stmt->bindParam(8, $user->getIdRol(), PDO::PARAM_STR);
            $stmt->bindParam(9, $user->getState(), PDO::PARAM_STR);
            $stmt->bindParam(10, $user->getEmail(), PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() != 0) {
                $result = true;
            } else {
                $result = 'No se pudo guardar el registro. Consulte al administrador';
            }
        }
        catch (PDOException $e) {
            $result = "Error SQL:" . $e->getMessage();
        }
        finally{
            DbConnection::disconnect();
        }
        return $result;
    }
}

