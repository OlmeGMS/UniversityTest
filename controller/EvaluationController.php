<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-09
 * Time: 20:49
 */
require_once ('EvaluationFacade.php');
require_once ('../model/evaluation/Evaluation.class.php');
require_once ('../model/user/User.class.php');
require_once ('../model/subject/Subject.class.php');
require_once ('../services/QuestionService.php');
require_once ('../utils/Validation.php');
require_once __DIR__.'/../model/user/User.class.php';
session_start();

$questionService = new QuestionService();
$evaluationFacade = new EvaluationFacade();
$controller = new EvaluationController();
$validation = new Validation();

if (!$controller->dataRequired()){
   $json = array("response" => false, "message" => "Uno o varios datos estan incorrectos");
   echo json_encode($json);
}

//Validacion de fecha y hora
$var = $validation->validateDate($controller->getEvaluation()->getInitialDate(),$controller->getEvaluation()->getEndDate());
if($var != false && $var > 0 ){
    $json = array("response" => false, "message" => "La fecha inicial es mayor a la final");
    echo json_encode($json);
}
$var = $validation->validateHora($controller->getEvaluation()->getInitialHora(),$controller->getEvaluation()->getEndHora());
if($var != false && $var > 0){
   $json = array("response" => false, "message" => "La hora inicial es mayor a la final");
   echo json_encode($json);
}
$initialDate = $controller->getEvaluation()->getInitialDate() ." ". $controller->getEvaluation()->getInitialHora();
$endDate = $controller->getEvaluation()->getEndDate() ." ". $controller->getEvaluation()->getEndHora();


if(!isset($_POST['typeEvaluation'])){
    $json = array("response" => false, "message" => "Se debe seleccionar un tipo de examen");
    echo json_encode($json);
}else{
    if($_POST['typeEvaluation'] == 'automatic'){
        //Tipo automatico
        if(isset($_POST['quantityQuestions']) && $_POST['quantityQuestions'] > 0){
            $listQuestions = $questionService->getQuestions($controller->getEvaluation()->getIdSubject(),$_POST['quantityQuestions']);
            if(count($listQuestions) != null){
                $user = $_SESSION['user'];
                $controller->getEvaluation()->setIdUser($user->getId());
                $controller->getEvaluation()->setListQuestions($listQuestions);
                if($evaluationFacade->createEvaluation($controller->getEvaluation())){
                    $json = array("response" => true, "message" => "La evaluación se creo correctamente");
                    echo json_encode($json);
                }
                else{
                    $json = array("response" => false, "message" => "No hay suficiente preguntas para crear la evaluación");
                    echo json_encode($json);
                }
            }
        }else{
            $json = array("response" => false, "message" => "Se debe indicar la cantidad de preguntas");
            echo json_encode($json);
        }
    }else{
        //Tipo manual

    }
}



class EvaluationController{

    private $evaluation;

    function __construct()
    {
        $this->questionService = new QuestionService();
        $this->evaluation = new Evaluation();
        $this->evaluation->setState(true);
        isset($_POST['idCourse']) ? $this->evaluation->setIdCourse($_POST['idCourse']) : $this->evaluation->setIdCourse(null);
        isset($_POST['idSubject']) ? $this->evaluation->setIdSubject($_POST['idSubject']) :   $this->evaluation->setIdSubject(null);
        isset($_POST['initialDate']) ? $this->evaluation->setInitialDate($_POST['initialDate']) : $this->evaluation->setInitialDate(null);
        isset($_POST['endDate']) ? $this->evaluation->setEndDate($_POST['endDate']) : $this->evaluation->setIdSubject(null);
        isset($_POST['initialHora']) ? $this->evaluation->setInitialHora($_POST['initialHora']) : $this->evaluation->setIdSubject(null);
        isset($_POST['endHora']) ? $this->evaluation->setEndHora($_POST['endHora']) : $this->evaluation->setIdSubject(null);
    }

    function dataRequired(){
        $data = array();
        $data[] = $this->evaluation->getIdCourse();
        $data[] = $this->evaluation->getIdSubject();
        $data[] = $this->evaluation->getInitialDate();
        $data[] = $this->evaluation->getEndDate();
        $data[] = $this->evaluation->getInitialHora();
        $data[] = $this->evaluation->getEndHora();
        foreach ($data as $item){
            if($item === null){
                return false;
            }
        }
        return true;
    }

    /**
     * @return Evaluation
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * @param Evaluation $evaluation
     */
    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;
    }

}









