<?php


class Student extends Person
{
    private $nrp;

    public function __construct($nrp,$firstName,$lastName)
    {
        parent::__construct($firstName,$lastName);
        $this->nrp = $nrp;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @param mixed $nrp
     */
    public function setNrp($nrp)
    {
        $this->nrp = $nrp;
    }


    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getNrp()
    {
        return $this->nrp;
    }
}