<?php
/**
 * Created by PhpStorm.
 * User: olmemarin
 * Date: 7/09/16
 * Time: 9:40 PM
 */

require_once ('../model/answer/AnswerDao.php');
require_once ('AnswerFacade.php');

session_start();
if(isset($_GET['idQuestion'])) {
    $idQuestion = $_GET['idQuestion'];
    $answerFacade = new AnswerFacade();
    $listAnswer = array();
    $listAnswer[] = $_POST['r1'];
    $listAnswer[] = $_POST['r2'];
    $listAnswer[] = $_POST['r3'];
    $listAnswer[] = $_POST['r4'];
    $listAnswer[] = $_POST['r5'];
    unset($_POST);
    unset($_GET['idQuestion']);
    $answerFacade->createAnswers($listAnswer, $idQuestion);
}