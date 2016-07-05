<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Content
 *
 * @author Aluno
 */
class Content {
    private $id;
    private $description;
    private $path;
    private $user;
    private $type_content;
    private $effects;
    
    function __construct($description, $path, $user, $type_content, $effects, $id) {
        $this->description = $description;
        $this->path = $path;
        $this->user = $user;
        $this->type_content = $type_content;
        $this->effects = $effects;
        $this->id = $id;
    }
    
    function __destruct() {
        return "Objeto Destruído";
    }
    
    function __toString() {
        $user_name = $this->user->getName_user();
        $tipo_conteudo = $this->type_content->getId();
        $efeito = $this->effects->getId();
        return "Conteúdo: <br>description: $this->description | path: $this->path | name_user: $user_name | type_content: $tipo_conteudo | effects_id: $efeito | id: $this->id";
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($name_user) {
        $this->user = $name_user;
    }

    public function getType_content() {
        return $this->type_content;
    }

    public function setType_content($type_content) {
        $this->type_content = $type_content;
    }

    public function getEffects() {
        return $this->effects;
    }

    public function setEffects($effects) {
        $this->effects = $effects;
    }
    
    public function getId() {
        return $this->id;
    }

}

?>
