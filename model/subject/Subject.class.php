<?php

class Subject
{
    private $idSubject;
    private $name;
    private $state;

    function __construct($idSubject,$name,$state)
    {
        $this->idSubject = $idSubject;
        $this->name = $name;
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getIdSubject()
    {
        return $this->idSubject;
    }

    /**
     * @param mixed $idSubject
     */
    public function setIdSubject($idSubject)
    {
        $this->idSubject = $idSubject;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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