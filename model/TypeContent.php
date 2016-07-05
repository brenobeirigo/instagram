<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TypeContent
 *
 * @author Aluno
 */
class TypeContent {
    private $name;
    private $id;
    
    function __construct($name, $id) {
        $this->name = $name;
        $this->id = $id;
    }
    
    function __destruct(){
        return "Objeto destruído";
    }
    
    function __toString(){
        return "Tipo Conteudo: <br>name: $this->name | id: $this->id";
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function getId() {
        return $this->id;
    }

}

?>
