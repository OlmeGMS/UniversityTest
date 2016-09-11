<?php

class Evaluation
{
    private $id;
    private $idCurse;
    private $idUser;
    private $registerDate;
    private $initialDate;
    private $endDate;
    private $state;

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
    public function getIdCurse()
    {
        return $this->idCurse;
    }

    /**
     * @param mixed $idCurse
     */
    public function setIdCurse($idCurse)
    {
        $this->idCurse = $idCurse;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
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
    public function getQuantityQuestions()
    {
        return $this->quantityQuestions;
    }

    /**
     * @param mixed $quantityQuestions
     */
    public function setQuantityQuestions($quantityQuestions)
    {
        $this->quantityQuestions = $quantityQuestions;
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

?>