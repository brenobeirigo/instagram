<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author Aluno
 */
class Comment {
    private $name_commentator;
    private $content_id;
    private $comment;
    private $id;
    
    function __construct($name_commentator, $content_id, $comment, $id) {
        $this->name_commentator = $name_commentator;
        $this->content_id = $content_id;
        $this->comment = $comment;        
        $this->id = $id;
    }
    
    function __destruct() {
        return "Objeto destruido";
    }

    function __toString() {
        return "Comentário: <br>name_commentator: $this->name_commentator | content_id: $this->content_id | comment: $this->comment | id:$this->id";
    }

    public function getName_commentator() {
        return $this->name_commentator;
    }

    public function setName_commentator($name_commentator) {
        $this->name_commentator = $name_commentator;
    }

    public function getContent_id() {
        return $this->content_id;
    }

    public function setContent_id($content_id) {
        $this->content_id = $content_id;
    }

    public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }
    
    public function getId() {
        return $this->id;
    }

}

?>
