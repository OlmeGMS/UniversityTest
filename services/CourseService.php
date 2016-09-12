<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-11
 * Time: 17:28
 */
require_once ('../../../model/course/Course.class.php');
require_once ('../../../utils/DbConnection.php');

class CourseService
{
    private $conn = null;

    function __construct() {
        $this->conn = DBConnection::connect();
    }

    public function getCourses(){
        try
        {
            $result = array();
            $toString = "";
            $sql = 'SELECT eva_idcursopk, eva_codigo, eva_nombre, eva_estado, eva_fechacreacion FROM tbl_cursos';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row){
                $course = new Course($row->eva_idmateriapk,$row->eva_descripcion,$row->eva_estado);
                $result[] = $course;
            }
            foreach ($result as $item=>$value){
                $toString .= '<option value="'.$value->getIdCourse().'">'.$value->getName().'</option>';
            }
            return $toString;
        }
        catch (PDOException $e)
        {
            return 'Error al ejecutar la consulta. '.$e->getMessage();
        }
        finally {
            DbConnection::disconnect();
        }
    }
}