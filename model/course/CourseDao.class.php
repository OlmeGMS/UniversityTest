<?php

require_once ('Course.class.php');
require_once ('ICourseDao.class.php');
require_once ('../utils/DbConnection.php');

class CourseDao implements ICourseDao
{

    private $conn = null;

    public function __construct()
    {
        $this->conn = DbConnection::connect();
    }

    public function getAll()
    {
        $result = array();
        $sql = 'SELECT eva_idCursoPk,eva_codigo,eva_nombre,eva_fechaCreacion,eva_estado FROM tbl_cursos';
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

    public function insertCourse(Course $course)
    {
        $result = 0;
        $query = 'INSERT INTO tbl_cursos (eva_codigo, eva_nombre,eva_estado,eva_fechacreacion) VALUES(?,?,?,?)';
        try {
            $stmt = $this->conn->prepare($query);


            $stmt->bindParam(1, $course->getCode(), PDO::PARAM_INT);
            $stmt->bindParam(2, $course->getName(), PDO::PARAM_STR);
            $stmt->bindParam(3, $course->getState(), PDO::PARAM_INT);
            $stmt->bindParam(4, date("Y-m-d H:i:s"), PDO::PARAM_INT);

            $stmt->execute();
            if ($stmt->rowCount() != 0) {
                return true;
            } else {
                return false;
            }
        }
        catch (PDOException $e) {
            return false;
        }
        finally{
            DbConnection::disconnect();
        }

    }

    public function getOne(Course $course)
    {
        $sql = "SELECT eva_idCursoPk,eva_codigo,eva_nombre,eva_fechaCreacion,eva_estado FROM tbl_cursos WHERE eva_codigo = '".$course->getCode()."' OR eva_nombre = '".$course->getName()."'";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                return false;
            }else{
                return true;
            }
        }
        catch (PDOException $e) {
            return true;
        }
        finally{
            DbConnection::disconnect();
        }
    }


}

