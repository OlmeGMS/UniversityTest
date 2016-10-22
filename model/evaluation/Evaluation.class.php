<?php

class Evaluation
{
    private $id;
    private $registerDate;
    private $initialDate;
    private $endDate;
    private $initialHora;
    private $endHora;
    private $state;
    private $idUser;
    private $idCourse;
    private $idSubject;
    private $listQuestions;
    private $type;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * @param mixed $registerDate
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;
    }

    /**
     * @return mixed
     */
    public function getInitialDate()
    {
        return $this->initialDate;
    }

    /**
     * @param mixed $initialDate
     */
    public function setInitialDate($initialDate)
    {
        $this->initialDate = $initialDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
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

    /**
     * @return User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return Subject
     */
    public function getIdSubject()
    {
        return $this->idSubject;
    }

    /**
     * @param Subject $idSubject
     */
    public function setIdSubject($idSubject)
    {
        $this->idSubject = $idSubject;
    }

    /**
     * @return mixed
     */
    public function getListQuestions()
    {
        return $this->listQuestions;
    }

    /**
     * @param mixed $listQuestions
     */
    public function setListQuestions($listQuestions)
    {
        $this->listQuestions = $listQuestions;
    }

    /**
     * @return mixed
     */
    public function getIdCourse()
    {
        return $this->idCourse;
    }

    /**
     * @param mixed $idCourse
     */
    public function setIdCourse($idCourse)
    {
        $this->idCourse = $idCourse;
    }

    /**
     * @return mixed
     */
    public function getInitialHora()
    {
        return $this->initialHora;
    }

    /**
     * @param mixed $initialHora
     */
    public function setInitialHora($initialHora)
    {
        $this->initialHora = $initialHora;
    }

    /**
     * @return mixed
     */
    public function getEndHora()
    {
        return $this->endHora;
    }

    /**
     * @param mixed $endHora
     */
    public function setEndHora($endHora)
    {
        $this->endHora = $endHora;
    }


}

?>