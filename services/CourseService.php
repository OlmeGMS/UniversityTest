<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-11
 * Time: 17:28
 */
require __DIR__.'/../model/course/Course.class.php';
require_once __DIR__.'/../utils/DbConnection.php';

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
                $course = new Course();
                $course->setIdCourse($row->eva_idcursopk);
                $course->setCode($row->eva_codigo);
                $course->setName($row->eva_nombre);
                $course->setState($row->eva_estado);
                $course->setDateCreation($row->eva_fechacreacion);
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