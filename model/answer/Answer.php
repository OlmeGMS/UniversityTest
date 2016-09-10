<?php

/**
 * Created by PhpStorm.
 * User: olmemarin
 * Date: 7/09/16
 * Time: 12:14 PM
 */
class Answer
{
    private $idAnswer;
    private $idQuestionFk;
    private $answer;
    private $typeAnswer;
    private $state;

    /**
     * Answer constructor.
     * @param $idAnswer
     * @param $idQuestionFk
     * @param $answer
     * @param $typeAnswer
     * @param $state
     */
    public function __construct($idAnswer, $idQuestionFk, $answer, $typeAnswer, $state)
    {
        $this->idAnswer = $idAnswer;
        $this->idQuestionFk = $idQuestionFk;
        $this->answer = $answer;
        $this->typeAnswer = $typeAnswer;
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getIdAnswer()
    {
        return $this->idAnswer;
    }

    /**
     * @param mixed $idAnswer
     */
    public function setIdAnswer($idAnswer)
    {
        $this->idAnswer = $idAnswer;
    }

    /**
     * @return mixed
     */
    public function getIdQuestionFk()
    {
        return $this->idQuestionFk;
    }

    /**
     * @param mixed $idQuestionFk
     */
    public function setIdQuestionFk($idQuestionFk)
    {
        $this->idQuestionFk = $idQuestionFk;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getTypeAnswer()
    {
        return $this->typeAnswer;
    }

    /**
     * @param mixed $typeAnswer
     */
    public function setTypeAnswer($typeAnswer)
    {
        $this->typeAnswer = $typeAnswer;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }



}

