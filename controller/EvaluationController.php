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
require_once('../services/QuestionService.php');

session_start();


$evaluationFacade = new EvaluationFacade();
$evaluation = new Evaluation();
$user = new User();
$subject = new Subject();
$questionService = new QuestionService();

//Valida fecha inicial y final
$diffDate = $evaluationFacade->validateDate($_POST["initialDate"],$_POST['endDate']);
if($diffDate < 0){
    //Valida fecha incial con la actual
    $diffDate = $evaluationFacade->validateDate($_POST["initialDate"], date("Y-m-d H:i:s"));
    if($diffDate >= 0){
        $evaluation->setInitialDate($_POST["initialDate"]);
        $evaluation->setEndDate($_POST['endDate']);
        $evaluation->setSubject($_POST['subject']);
        $evaluation->setUser($_POST['user']);
        //Si es manual, asigna la cantidad de preguntas.
        if($_POST['quantity'] != ""){
            $evaluation->setListQuestions($_POST['questions']);
        }else{
            $evaluation->setListQuestions($questionService->getQuestions($evaluation->getSubject()),$_POST['quantity']);
        }
        $evaluationFacade->createEvaluation($evaluation);
    }else{
        echo "La fecha inicial no puede ser inferior a la fecha actual";
    }
}else{
    echo "La fecha inicial no puede ser menor a la fecha final";
}












