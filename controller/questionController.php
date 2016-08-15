<?php

require_once ('../model/question/Question.class.php');
require_once ('../model/question/QuestionDao.class.php');

session_start();
$question = new Question();
$question->setIdSubject($_POST["idSubject"]);
$question->setTypeQuestionFk(1);
$question->setSentence($_POST["sentence"]);
$question->setState($_POST["state"]);
$questionDao = new QuestionDao();
$validator = true;

if ($validator) {
    if ($questionDao->insertQuestion($question)){
        echo true;
    } else {
        echo false;
    }
}else{
    echo false;
}

 ?>
