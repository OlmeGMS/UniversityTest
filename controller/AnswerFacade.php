<?php

/**
 * Created by PhpStorm.
 * User: Fredy
 * Date: 2016-09-11
 * Time: 22:34
 */

require_once ('../model/answer/Answer.php');
require_once ('../model/answer/AnswerDao.php');


class AnswerFacade
{
    private $answerDao;
    private $count;
    public $json;

    function __construct()
    {
        $this->answerDao = new AnswerDao();
    }

    function createAnswers($listAnswer, $idQuestion){
        $this->count = 0;
        foreach ($listAnswer as $item){
            $answer = new Answer();
            $answer->setState(false);
            if ($this->count == 0) $answer->setState(true);
            $answer->setAnswer($item);
            $answer->setIdQuestionFk($idQuestion);
            $answer->setTypeAnswer(1);
            $this->count++;
            if (!$this->answerDao->insertAnswer($answer)){
                $json = array("response" => false, "message" => "Error al registrar las respuestas");
                break;
            }

            $json = array("response" => true, "message" => "Se registraron las respuestas");

        }
        echo json_encode($json);
    }
}