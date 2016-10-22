<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-11
 * Time: 13:45
 */

require_once __DIR__.'/../model/evaluation/Evaluation.class.php';
require_once __DIR__.'/../utils/DbConnection.php';
require_once __DIR__.'/../model/question/Question.class.php';
require_once __DIR__.'/../model/subject/Subject.class.php';
require_once __DIR__.'/QuestionService.php';

class EvaluationService
{
    private $conn = null;

    function __construct() {
        $this->conn = DBConnection::connect();
    }

    /**
     * @return Array() listEvaluations
     */
    public function getAllEvaluations() {
        try
        {
            $listEvaluations = array();
            $listQuestions = array();

            $query = 'SELECT eva_idevaluacionpk,eva_fecharegistro,eva_fechainicial,eva_fechafinal,eva_estado,eva_idusuariofk,eva_idmateriafk,eva_idcursofk,eva_tipoevaluacion FROM tbl_evaluaciones';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row){
                $evaluation = new Evaluation();
                $evaluation->setId($row->eva_idevaluacionpk);
                $evaluation->setRegisterDate($row->eva_fecharegistro);
                $evaluation->setInitialDate($row->eva_fechainicial);
                $evaluation->setEndDate($row->eva_fechafinal);
                $evaluation->setState($row->eva_estado);
                $evaluation->setIdUser($row->eva_idusuariofk);
                $evaluation->setIdSubject($row->eva_idmateriafk);
                $evaluation->setIdCourse($row->eva_idcursofk);
                $evaluation->setType($row->eva_tipoevaluacion);
                $queryEvaQue = "SELECT eva_idevaluacionpreguntapk,eva_idevaluacionfk,eva_idpreguntasfk FROM tbl_evaluacionpregunta WHERE eva_idevaluacionfk = ".$row->eva_idevaluacionpk;
                $stmt = $this->conn->prepare($queryEvaQue);
                $stmt->execute();
                    foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                        $questionService = new QuestionService();
                        $listQuestions[] = $questionService->getQuestion($row->eva_idpreguntasfk);
                    }
                    $evaluation->setListQuestions($listQuestions);
                    $listQuestions = null;
                $listEvaluations[] = $evaluation;
            }
            return $listEvaluations;
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