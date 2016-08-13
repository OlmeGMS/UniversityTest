<?php
require_once ('../model/question/QuestionDao.class.php');

session_start();
$question = new Question();
$question->setMateria($_POST['nameMateria']);
$question->setQuestion($_POST['pregunta']);
$question->setState($_POST['state']);
$question->setIdQuestion(1);
$questionDao = new QuestionDao();
$validartor = true;

if (!$questionDao->getOne($question)){
    $validator = false;
}
if ($validator) {
    if ($questionDao->insertCourse($question)) {
        echo true;
    } else {
        echo false;
    }
}else{
    echo false;
}

 ?>
