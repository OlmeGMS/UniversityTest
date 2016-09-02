<?php

class User
{
    private $id;
    private $document;
    private $firstName;
    private $secondName;
    private $firstLastName;
    private $secondLastName;
    private $user;
    private $password;
    private $idRol;
    private $state;
    private $email;

    public function __construct($user, $password, $document, $firstName, $secondName, $firstLastName, $secondLastName, $idRol, $state, $email)
    {
        //Construct for user register.
        if (!is_null($document) ) {
            $this->document = $document;
            $this->firstName = $firstName;
            $this->secondName = $secondName;
            $this->firstLastName = $firstLastName;
            $this->secondLastName = $secondLastName;
            $this->user = $user;
            $this->password = $password;
            $this->idRol = $idRol;
            $this->state = $state;
            $this->email = $email;
        }
        //Construct for user login.
        if(!is_null($user) && !is_null($password)){
            $this->user = $user;
            $this->password = $password;
        }
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param mixed $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @param mixed $secondName
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;
    }

    /**
     * @return mixed
     */
    public function getFirstLastName()
    {
        return $this->firstLastName;
    }

    /**
     * @param mixed $firstLastName
     */
    public function setFirstLastName($firstLastName)
    {
        $this->firstLastName = $firstLastName;
    }

    /**
     * @return mixed
     */
    public function getSecondLastName()
    {
        return $this->secondLastName;
    }

    /**
     * @param mixed $secondLastName
     */
    public function setSecondLastName($secondLastName)
    {
        $this->secondLastName = $secondLastName;
    }

    /**
     * @return mixed
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * @param mixed $idRol
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
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
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


}

?>