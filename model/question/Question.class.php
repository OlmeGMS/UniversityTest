<?php
class Question
{
    private $idQuestion;
    private $CourseFk;
    private $typeQuestionFk;
    private $question;
    private $materia;
    private $state;
    
    function __construct() {
        
    }
    function getMateria() {
        return $this->materia;
    }

    function setMateria($materia) {
        $this->materia = $materia;
    }

        
    function getIdQuestion() {
        return $this->idQuestion;
    }

    function getCourseFk() {
        return $this->CourseFk;
    }

    function getTypeQuestionFk() {
        return $this->typeQuestionFk;
    }

    function getQuestion() {
        return $this->question;
    }

    function getState() {
        return $this->state;
    }

    function setIdQuestion($idQuestion) {
        $this->idQuestion = $idQuestion;
    }

    function setCourseFk($CourseFk) {
        $this->CourseFk = $CourseFk;
    }

    function setTypeQuestionFk($typeQuestionFk) {
        $this->typeQuestionFk = $typeQuestionFk;
    }

    function setQuestion($question) {
        $this->question = $question;
    }

    function setState($state) {
        $this->state = $state;
    }


    
}
?>