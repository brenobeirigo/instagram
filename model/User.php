<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Aluno
 */
class User {
    private $name_user;
    private $email;
    private $name;
    private $password;
    private $block;
    private $active;
    
    function __construct($name_user, $email, $name, $password) {
        $this->name_user = $name_user;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->block = false;      
        $this->active = 1;
    }
    
    function __destruct() {
        return "Objeto destruido";
    }
            
    function __toString() {
        return "Usuário: <br>name_user: $this->name_user | email: $this->email | name: $this->name | password: $this->password | block: $this->block";
    }

    public function getName_user() {
        return $this->name_user;
    }

    public function setName_user($name_user) {
        $this->name_user = $name_user;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getBlock() {
        return $this->block;
    }

    public function setBlock($block) {
        $this->block = $block;
    }
    public function getActive() {
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
    }

}

?>
