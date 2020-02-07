<?php
/* 
    
    AUTOR DE PROGRAMACIÓN PHP: 
    JOSUE ALDAIR MAMANI CARIAPAZA
	
*/


class usuarios {

    private $id_cod;  
    private $name; 
    private $lastname;
    private $user;
    private $pass;
    private $email;
    private $photo;
    private $status;
    private $type;
    private $gen;

    function __construct($id_cod, $name, $lastname, $user, $pass, $email, $photo, $status, $type, $gen) {
        $this->id_cod = $id_cod;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->user = $user;
        $this->pass = $pass;
        $this->email = $email;
        $this->photo = $photo;
        $this->status = $status;
        $this->type = $type;
        $this->gen = $gen;
    }

    function getId_cod() {
        return $this->id_cod;
    }

    function getName() {
        return $this->name;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getStatus() {
        return $this->status;
    }

    function getType() {
        return $this->type;
    }

    function getGen() {
        return $this->gen;
    }

    function setId_cod($id_cod) {
        $this->id_cod = $id_cod;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setGen($gen) {
        $this->gen = $gen;
    }



    
}



?>