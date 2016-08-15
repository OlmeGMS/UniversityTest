<?php
class Question
{
    private $idQuestion;
    private $idSubject;
    private $typeQuestionFk;
    private $sentence;
    private $state;
    
    function __construct($idQuestion, $idSubject, $typeQuestionFk, $sentence, $state) {
        $this->idQuestion = $idQuestion;
        $this->idSubject = $idSubject;
        $this->typeQuestionFk = $typeQuestionFk;
        $this->sentence = $sentence;
        $this->state = $state;
    }

        function getIdQuestion() {
        return $this->idQuestion;
    }

    function getIdSubject() {
        return $this->idSubject;
    }

    function getTypeQuestionFk() {
        return $this->typeQuestionFk;
    }


    function getState() {
        return $this->state;
    }

    function setIdQuestion($idQuestion) {
        $this->idQuestion = $idQuestion;
    }

    function setIdSubject($idSubject) {
        $this->idSubject = $idSubject;
    }

    function setTypeQuestionFk($typeQuestionFk) {
        $this->typeQuestionFk = $typeQuestionFk;
    }

    function setState($state) {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getSentence()
    {
        return $this->sentence;
    }

    /**
     * @param mixed $sentence
     */
    public function setSentence($sentence)
    {
        $this->sentence = $sentence;
    }
    
}
?>