<?php

/**
 * Created by PhpStorm.
 * User: olmemarin
 * Date: 7/09/16
 * Time: 12:33 PM
 */

require_once ('AnswerDao.php');
require_once ('IAnswerDao.php');
require_once ('../utils/DbConnection.php');

class AnswerDao implements IAnswerDao
{
    private $conn = null;

    public function __construct()
    {
       $this->conn = DbConnection::connect();
    }


    public function getAll()
    {
        $result = array();
        $sql = 'SELECT eva_idrespuestapk, eva_idpreguntafk, eva_respuesta, eva_tiporespuestafk, eva_estado
	            FROM public.tbl_respuestas';
        try{
            $stm = $this->conn->prepare($sql);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ)as$row){
                    $newUser = new User($row->iduser, $row->nombre);
                $result[] = $newUser;
            }
        }catch (PDOException $e){
            echo 'ERROR SQL: '.$e->getMessage();

        }finally{
            DbConnection::disconnect();
        }

        return $result;

    }

    public function insertAnswer(Answer $answer)
    {
        try{
            $query = 'INSERT INTO public.tbl_respuestas(eva_idpreguntafk, eva_respuesta, eva_tiporespuestafk, eva_estado) VALUES (?, ?, ?, ?)';
            $stm = $this->conn->prepare($query);
            $stm->bindParam(1, $answer->getIdQuestionFk(), PDO::PARAM_INT);
            $stm->bindParam(2, $answer->getAnswer(), PDO::PARAM_STR);
            $stm->bindParam(3, $answer->getTypeAnswer(), PDO::PARAM_INT);
            $stm->bindParam(4, $answer->getState(), PDO::PARAM_BOOL);
            $stm->execute();

            if ($stm->rowCount() > 0){
                return true;
            } else{
                return false;
            }
        }catch (PDOException $e){
                return false;
        }finally{
            DbConnection::disconnect();
        }
    }

    public function getOne(Answer $answer){
        $sql = "SELECT eva_idrespuestapk, eva_idpreguntafk, eva_respuesta, eva_tiporespuestafk, eva_estado FROM public.tbl_respuestas WHERE eva_idrespuestapk ='".$answer->getIdAnswer()."'OR eva_respuesta = '".$answer->getAnswer()."'";

        try{
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            if ($stm->rowCount() > 0){
                return true;
            }else{
                return false;
            }

        }catch (PDOException $e){
            return true;
        }finally{
            DbConnection::disconnect();
        }

    }
}