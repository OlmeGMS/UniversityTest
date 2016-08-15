<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-08-13
 * Time: 16:56
 */

require_once ('../../../model/subject/Subject.class.php');
require_once ('../../../utils/DbConnection.php');


class subjectService
{
    private $conn = null;

    function __construct() {
        $this->conn = DBConnection::connect();
    }

    public function getSubject(){
        try
        {
            $result = array();
            $toString = "";
            $sql = 'SELECT eva_idmateriapk, eva_descripcion, eva_estado FROM public.tbl_materia';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            foreach ($stmt->fetchAll(PDO::FETCH_OBJ)as$row){
                $newSubject = new Subject($row->eva_idmateriapk,$row->eva_descripcion,$row->eva_estado);
                $result[] = $newSubject;
            }
            foreach ($result as $item=>$value){
                $toString .= '<option value="'.$value->getIdSubject().'">'.$value->getName().'</option>';
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
