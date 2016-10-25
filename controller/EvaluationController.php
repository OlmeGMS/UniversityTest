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
require_once ('../model/user/User.class.php');
require_once ('../services/EmailService.php');
require_once ('../services/EvaluationService.php');

session_start();

$questionService = new QuestionService();
$evaluationFacade = new EvaluationFacade();
$controller = new EvaluationController();
$validation = new Validation();
$mailService = new EmailService();
$evaluationService = new EvaluationService();

if (!$controller->dataRequired()){
   $json = array("response" => false, "message" => "Uno o varios datos estan incorrectos");
   echo json_encode($json);
}
//Validacion de fecha y hora
$json = $evaluationService->evaluationConcurrent($controller->getEvaluation()->getInitialDate(), $controller->getEvaluation()->getEndDate());
//$json = $controller->validateDateEvaluation();
if ($json['response'] == true){
    if(!isset($_POST['typeEvaluation'])){
        $json = array("response" => false, "message" => "Se debe seleccionar un tipo de examen");
        echo json_encode($json);
    }else{
        if($_POST['typeEvaluation'] == 'automatic'){
            //Tipo automatico
            if(isset($_POST['quantityQuestions']) && $_POST['quantityQuestions'] > 0){
                $listQuestions = $questionService->getQuestionsRandom($controller->getEvaluation()->getIdSubject(),$_POST['quantityQuestions']);
                if(count($listQuestions) > 0){
                    $user = $_SESSION['user'];
                    $controller->getEvaluation()->setIdUser($user->getId());
                    $controller->getEvaluation()->setListQuestions($listQuestions);
                    if($evaluationFacade->createEvaluation($controller->getEvaluation())){
                        if($mailService->sendEmailMassive()){
                            $json = array("response" => true, "message" => "La evaluación se creo correctamente");
                        }
                        $json = array("response" => true, "message" => "La evaluación se creo correctamente");
                    }
                    else{
                        $json = array("response" => false, "message" => "No hay suficiente preguntas para crear la evaluación");
                    }
                }
                else{
                    $json = array("response" => false, "message" => "No hay suficientes preguntas para la evaluación");
                }
            }else{
                $json = array("response" => false, "message" => "Se debe indicar la cantidad de preguntas");
            }
        }else{
            $listQuestions = array();
            $user = $_SESSION['user'];
            $controller->getEvaluation()->setIdUser($user->getId());
            $list = $_POST['checkboxQuestions'];
            foreach ($list as $item){
                $listQuestions[] = $questionService->getQuestion($item);
            }
            $controller->getEvaluation()->setListQuestions($listQuestions);
            if($evaluationFacade->createEvaluation($controller->getEvaluation())){
                $json = array("response" => true, "message" => "La evaluación se creo correctamente");
            }
            else{
                $json = array("response" => false, "message" => "No hay suficiente preguntas para crear la evaluación");
            }
        }
        echo json_encode($json);
    }
}else{
    echo json_encode($json);
}


class EvaluationController{

    private $evaluation;
    private $validation;

    function __construct()
    {
        $this->validation = new Validation();
        $this->questionService = new QuestionService();
        $this->evaluation = new Evaluation();
        $this->evaluation->setState(true);
        isset($_POST['idCourse']) ? $this->evaluation->setIdCourse($_POST['idCourse']) : $this->evaluation->setIdCourse(null);
        isset($_POST['idSubject']) ? $this->evaluation->setIdSubject($_POST['idSubject']) :   $this->evaluation->setIdSubject(null);
        isset($_POST['initialDate']) ? $this->evaluation->setInitialDate($_POST['initialDate']) : $this->evaluation->setInitialDate(null);
        isset($_POST['endDate']) ? $this->evaluation->setEndDate($_POST['endDate']) : $this->evaluation->setEndDate(null);
        isset($_POST['initialHora']) ? $this->evaluation->setInitialHora($_POST['initialHora']) : $this->evaluation->setInitialHora(null);
        isset($_POST['endHora']) ? $this->evaluation->setEndHora($_POST['endHora']) : $this->evaluation->setEndHora(null);
        isset($_POST['typeEvaluation']) ? $this->evaluation->setType($_POST['typeEvaluation']) : $this->evaluation->setIdSubject(null);
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
     * @return json
     */
    function validateDateEvaluation(){
        try{
            $response = true;
            $message = "";
            $var = $this->validation->validateDate($this->evaluation->getInitialDate(),$this->evaluation->getEndDate());
            if($var != false && $var > 0 ){
                $message = "La fecha inicial es mayor a la final";
                $response = false;
            }
            if($var == 0){
                $var = $this->validation->validateHora($this->evaluation->getInitialHora(),$this->evaluation->getEndHora());
                if($var != false && $var > 0){
                    $message = "La hora inicial es mayor a la final";
                    $response = false;
                }
            }
            $json = array("response" => $response, "message" => $message);
            return $json;
        }catch (Exception $e){
            $json = array("response" => false, "message" => $e->getMessage());
            return $json;
        }
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









