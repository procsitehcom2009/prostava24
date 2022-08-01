<?php

namespace App\Model;

class User
{

    private $id;
    private $email;
    private $password;
    private $isAdmin;
    private $dateCreate;
    private $dateUpdate;

    /**
     * @param $id
     * @param $email
     * @param $password
     * @param $userHash
     * @param $isAdmin
     * @param $dateCreate
     * @param $dateUpdate
     */
    public function __construct($id, $email, $password, $isAdmin, $dateCreate, $dateUpdate)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
        $this->dateCreate = $dateCreate;
        $this->dateUpdate = $dateUpdate;
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
    public function setId($id): void
    {
        $this->id = $id;
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
    public function setEmail($email): void
    {
        $this->email = $email;
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
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return mixed
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * @param mixed $dateCreate
     */
    public function setDateCreate($dateCreate): void
    {
        $this->dateCreate = $dateCreate;
    }

    /**
     * @return mixed
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * @param mixed $dateUpdate
     */
    public function setDateUpdate($dateUpdate): void
    {
        $this->dateUpdate = $dateUpdate;
    }



}