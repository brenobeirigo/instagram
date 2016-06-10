<?php

include_once 'dao/InterfaceInstagramDAO.php';
include_once 'util/ConnectionFactory.php';

class InstagramDAO implements InstagramDAOInterface {

    public function __construct() {
        
    }

    public function createConnection() {
        $conn = new ConnectionFactory("mysql", "localhost", "root", "123456", "instagram");
        return $conn->getConnection();
    }

    public function saveAndReturnID($name) {
        echo "SALVANDO TYPE_CONTENT <br>";
        $conn = $this->createConnection();
        $query = "INSERTsfs fs INTO type_content (name) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $id);
        $rows = $stmt->execute();
        $lastId = $conn->lastInsertId();
        echo "Last ID: " . $lastId . "<br>";
    }

    public function saveUserTeste($name_user, $email, $name, $password, $block_content) {
        echo "SALVANDO USER <br>";
        $conn = $this->createConnection();
        $query = "INSERT INTO user (name_user, email, name, password, block_content) VALUES (?, ?, ?, ?, ?)";
        try {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $name_user);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $name);
            $stmt->bindParam(4, $password);
            $stmt->bindParam(5, $block_content);
            $rows = $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro: " . $e . "<br>";
        }
    }

    public function updateUserTeste($name_user, $email, $name, $password, $block_content) {
        echo "UPDATE USER <br>";
        $conn = $this->createConnection();
        $query = "UPDATE user SET email=?, name=?, password=?, block_content=? WHERE name_user = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $password);
        $stmt->bindParam(4, $block_content);
        $stmt->bindParam(5, $name_user);
        $rows = $stmt->execute();
    }

    public function deleteUserTeste($name_user) {
        echo "DELETE USER <br>";
        $conn = $this->createConnection();
        $query = "DELETE FROM user WHERE name_user = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $name_user);
        $rows = $stmt->execute();
    }

    public function selectUsersTeste($offset, $limit) {
        echo "SELECIONA ALGUNS USUÁRIOS <br>";
        /*
        ###### TIPOS DE DADOS COMUNS PARA USAR COM O 'BINDING'  
          • PDO::PARAM_BOOL: SQL BOOLEAN datatype
          • PDO::PARAM_INT: SQL INTEGER datatype
          • PDO::PARAM_NULL: SQL NULL datatype
          • PDO::PARAM_STR: SQL string datatypes
          
        ###### FETCH
          • PDO::FETCH_ASSOC: Prompts fetch() to retrieve an array of values indexed by the
          column name.
          • PDO::FETCH_BOTH: Prompts fetch() to retrieve an array of values indexed by both
          the column name and the numerical offset of the column in the row (beginning
          with 0). This is the default.
         */
        $conn = $this->createConnection();
        $query = "SELECT * FROM user LIMIT ?,?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $offset, PDO::PARAM_INT);
        $stmt->bindParam(2, $limit, PDO::PARAM_INT);

        $rows = $stmt->execute();
        print_r($rows);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $name_user = $row['name_user'];
            $email = $row['email'];
            $name = $row['name'];
            $password = $row['password'];
            $block_content = $row['block_content'];
            printf("User - %s - %s - %s - %s - %s <br />", $name_user, $email, $name, $password, $block_content);
        }
    }

    public function createComment($user, $content) {
        
    }

    public function createEffect($effect) {
        
    }

    public function createTagInComment($comment, $user) {
        
    }

    public function createTagInContent($content, $user) {
        
    }

    public function follow($a, $b) {
        
    }

    public function getAllRegisteredUsersBetween($date1, $date2, $offset, $limit) {
        
    }

    public function getAllUsers() {
        
    }

    public function getContentById($content_id) {
        
    }

    public function getContentOfUser($user, $offset, $limit, $type) {
        
    }

    public function getContentUserTagged($user, $offset, $limit, $type) {
        
    }

    public function getFollowersList($user, $offset, $limit) {
        
    }

    public function getFollowingList($user, $offset, $limit) {
        
    }

    public function getListOfCommentators($content, $offset, $limit) {
        
    }

    public function getListOfComments($content, $offset, $limit) {
        
    }

    public function getListOfCommentsByUser($user, $offset, $limit) {
        
    }

    public function getListOfCommmentsUserTagged($user, $offset, $limit) {
        
    }

    public function getListOfContentsUserTagged($user, $offset, $limit) {
        
    }

    public function getListOfEffects() {
        
    }

    public function getListOfLikedContent($user, $type, $offset, $limit) {
        
    }

    public function getListOfUserTaggedInComment($comment, $offset, $limit) {
        
    }

    public function getListOfUserTaggedInContent($content, $offset, $limit) {
        
    }

    public function getListOfUsersLikedComment($comment, $offset, $limit) {
        
    }

    public function getListOfUsersLikedContent($content, $offset, $limit) {
        
    }

    public function getMostFollowedUsers($offset, $limit) {
        
    }

    public function getNumberLikesComment($comment) {
        
    }

    public function getNumberOfCommentators($content) {
        
    }

    public function getNumberOfComments($content) {
        
    }

    public function getNumberOfUsersLikedContent($content) {
        
    }

    public function getQtdCommentsUserTagged() {
        
    }

    public function getQtdContentsUserTagged() {
        
    }

    public function getQtdUserTaggedInComment($comment) {
        
    }

    public function getQtdUserTaggedInContent($content) {
        
    }

    public function getUserById($user_id) {
        
    }

    public function getUsersByName($user_name) {
        
    }

    public function like($user, $content) {
        
    }

    public function removeComment($comment) {
        
    }

    public function removeContent($content) {
        
    }

    public function removeEffect($effect) {
        
    }

    public function removeTagInComment($comment, $user) {
        
    }

    public function removeTagInContent($content, $user) {
        
    }

    public function removeUserById($user_id) {
        
    }

    public function saveContent($content) {
        
    }

    public function saveUser($user) {
        
    }

    public function unfollow($a, $b) {
        
    }

    public function unlike($user, $content) {
        
    }

    public function updateComment($comment) {
        
    }

    public function updateContent($content) {
        
    }

    public function updateEffect($effect) {
        
    }

    public function updateUser($user) {
        
    }

    public function userLikeComment($user, $comment) {
        
    }

    public function userUnlikeComment($user, $comment) {
        
    }

}
