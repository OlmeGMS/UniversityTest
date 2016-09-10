<?php
/**
 * Created by PhpStorm.
 * User: olmemarin
 * Date: 7/09/16
 * Time: 9:40 PM
 */

require_once ('../model/answer/AnswerDao.php');

session_start();
$answer = new Answer();
$answer->setIdQuestionFk($_POST['pregunta']);
$answer->setTypeAnswer(1);
$answer->setAnswer($_POST['respuesta']);
$answer->setState($_POST['rEstado']);

$answerDao = new AnswerDao();
$validator = true;

if($validator){
    if($answerDao->insertAnswer($answer)){
        echo true;
    }else{
        echo false;
    }
    echo false;
}