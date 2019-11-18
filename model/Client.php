<?php


class Client{

    private $client_id;
    private $firstname;
    private $lastname;
    private $address;
    private $phone_number;
    private $dob;
    private $medical_issues;
    private $current_weight;
    private $height;
    private $password;

    public function __construct($cid, $fn, $ln, $adrs, $pn, $do, $mi, $cw, $h, $pwd)
    {

        $this->client_id = $cid;
        $this->firstname = $fn;
        $this->lastname = $ln;
        $this->address = $adrs;
        $this->phone_number = $pn;
        $this->dob = $do;
        $this->medical_issues = $mi;
        $this->current_weight = $cw;
        $this->height = $h;
        $this->password = $pwd;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return mixed
     */
    public function getMedicalIssues()
    {
        return $this->medical_issues;
    }

    /**
     * @param mixed $medical_issues
     */
    public function setMedicalIssues($medical_issues)
    {
        $this->medical_issues = $medical_issues;
    }

    /**
     * @return mixed
     */
    public function getCurrentWeight()
    {
        return $this->current_weight;
    }

    /**
     * @param mixed $current_weight
     */
    public function setCurrentWeight($current_weight)
    {
        $this->current_weight = $current_weight;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
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



}