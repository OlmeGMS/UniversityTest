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

    public function login($user, $password)
    {
        $sql = "SELECT eva_usuario, eva_password FROM tbl_usuarios WHERE eva_usuario = '$user'  AND eva_password = '$password'";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $result = true;
            }else{
                $result = false;
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
        $result = 0; //marcador para el resultado de la acción
        $query = 'INSERT INTO tbl_usuarios (iduser, nombres) VALUES(?,?)';
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $user->getUser(), PDO::PARAM_INT);
            $stmt->bindParam(2, $user->getPassword(), PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() != 0) {
                $result = 'Registro guardado exitosamente';
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

