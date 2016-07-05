<?php

include_once 'dao/InterfaceInstagramDAO.php';
include_once 'util/ConnectionFactory.php';
/*require './model/Comment.php';
require './model/Content.php';
require './model/Effects.php';
require './model/TypeContent.php';
require './model/User.php';*/

class InstagramDAO implements InstagramDAOInterface {

    public function __construct() {
        
    }

    public function createConnection() {
        $conn = new ConnectionFactory("mysql", "localhost", "root", "123456", "instagram");
        return $conn->getConnection();
    }

    public function saveTypeContentAndReturnID($name) {
        echo "SALVANDO TYPE_CONTENT <br>";
        $conn = $this->createConnection();
        $query = "INSERT INTO type_content (name) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $name);
        $rows = $stmt->execute();
        $lastId = $conn->lastInsertId();
        echo "Last ID: " . $lastId . "<br>";
    }

    public function saveUser($user) {
        //echo "SALVANDO USER <br>";
        $conn = $this->createConnection();
        $name_user = $user->getName_user();
        $email = $user->getEmail();
        $name = $user->getName();
        $password = $user->getPassword();
        $block_content = $user->getBlock();    
        $active = $user->getActive();
        $query = "INSERT INTO user (name_user, email, name, password, block_content, active) VALUES (?, ?, ?, ?, ?, ?)";
        try {
            $stmt = $conn->prepare($query);
            $stmt->bindParam(1, $name_user);
            $stmt->bindParam(2, $email);
            $stmt->bindParam(3, $name);
            $stmt->bindParam(4, $password);
            $stmt->bindParam(5, $block_content);
            $stmt->bindParam(6, $active);
            $rows = $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro: " . $e . "<br>";
        }
    }

    public function updateUser($user) {
        //echo "UPDATE USER <br>";
        $conn = $this->createConnection();
        $name_user = $user->getName_user();
        $email = $user->getEmail();
        $name = $user->getName();
        $password = $user->getPassword();
        $block_content = $user->getBlock();
        $active = $user->getActive();
        $query = "UPDATE user SET email=?, name=?, password=?, block_content=?, active=? WHERE name_user = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $password);
        $stmt->bindParam(4, $block_content);
        $stmt->bindParam(5, $active);        
        $stmt->bindParam(6, $name_user);
        $rows = $stmt->execute();
    }

    public function deleteUser($user) {
        //echo "DELETE USER <br>";
        $conn = $this->createConnection();
        $user_name = $user->getName_user();
        $query = "DELETE FROM user WHERE name_user = ?";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $user_name);
        $rows = $stmt->execute();
    }

    public function selectUsers($offset, $limit) {
        //echo "SELECIONA ALGUNS USUÁRIOS <br>";
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
        $query = "INSERT INTO user_follows_user (user_following, user_followed) VALUES ($a, $b)";
    }

    public function getAllRegisteredUsersBetween($date1, $date2, $offset, $limit) {
        $querry = "SELECT * FROM user WHERE create_time BETWEEN $date1 AND $date2 LIMIT $offset, $limit";
    }

    public function getAllUsers() {
        $conn = $this->createConnection();
        $query = "SELECT * FROM user";
        $stmt = $conn->prepare($query);
        $stmt = $conn->prepare($query);

        $rows = $stmt->execute();
        //print_r($rows);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $name_user = $row['name_user'];
            $email = $row['email'];
            $name = $row['name'];
            $password = $row['password'];
            $block_content = $row['block_content'];
            printf("User - %s - %s - %s - %s - %s <br />", $name_user, $email, $name, $password, $block_content);
        }        
        
    }

    public function getContentById($content) {
        $conn = $this->createConnection();
        $content_id = $content->getId();
        $query = "SELECT * FROM content WHERE id = $content_id";
        $stmt = $conn->prepare($query);

        $rows = $stmt->execute();
        //print_r($rows);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $description = $row['description'];
            $path = $row['path'];
            $post_time = $row['post_time'];
            $name_user = $row['name_user'];
            $type_content_id = $row['type_content_id'];
            $effects_id = $row['effects_id'];
            printf("%s - %s - %s - %s - %s - %s - %s <br />", $id, $description, $path, $post_time, $name_user, $type_content_id, $effects_id);
        }        
    }

    public function getContentOfUser($user, $offset, $limit, $type) {
        $conn = $this->createConnection();
        $user_name = $user->getName_user();
        $type_id = $type->getId();        
        $query = "SELECT * FROM content AS a WHERE a.name_user = '$user_name' AND a.type_content_id = $type_id ORDER BY 4 LIMIT $offset, $limit";
        $stmt = $conn->prepare($query);

        $rows = $stmt->execute();
        //print_r($rows);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $description = $row['description'];
            $path = $row['path'];
            $post_time = $row['post_time'];
            $name_user = $row['name_user'];
            $type_content_id = $row['type_content_id'];
            $effects_id = $row['effects_id'];
            printf("%s - %s - %s - %s - %s - %s - %s <br />", $id, $description, $path, $post_time, $name_user, $type_content_id, $effects_id);
        }        
    }

    public function getContentUserTagged($user, $offset, $limit, $type) {
        $conn = $this->createConnection();
        $user_name = $user->getName_user();
        $type_id = $type->getId();
        $query = "SELECT a.id, a.description, a.path, a.post_time, a.name_user, a.type_content_id, a.effects_id FROM content AS a, content_tags_user AS b WHERE a.id = b.content_id AND b.tagged_user = $user_name AND a.type_content_id = $type_id ORDER BY 4 DESC LIMIT $offset, $limit";
        $stmt = $conn->prepare($query);

        $rows = $stmt->execute();
        //print_r($rows);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $description = $row['description'];
            $path = $row['path'];
            $post_time = $row['post_time'];
            $name_user = $row['name_user'];
            $type_content_id = $row['type_content_id'];
            $effects_id = $row['effects_id'];
            printf("%s - %s - %s - %s - %s - %s - %s <br />", $id, $description, $path, $post_time, $name_user, $type_content_id, $effects_id);
        }        
    }

    public function getFollowersList($user, $offset, $limit) {
        $conn = $this->createConnection();
        $user_name = $user->getName_user();
        $query = "SELECT b.user_following, b.user_followed, b.start_following FROM user AS a, user_follows_user AS b WHERE b.user_followed = '$user_name' LIMIT $offset, $limit";
        $stmt = $conn->prepare($query);

        $rows = $stmt->execute();
        //print_r($rows);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user_following = $row['user_following'];
            $user_followed = $row['user_followed'];
            $start_following = $row['start_following'];
            printf("%s - %s - %s <br />", $user_following, $user_followed, $start_following);
        }            
    }

    public function getFollowingList($user, $offset, $limit) {
        $query = "SELECT a.name_user, a.email, a.name, a.password, a.block_content, a.create_time, a.active FROM user AS a, user_follows_user AS b WHERE b.user_following = a.name_user AND b.user_followed = $user LIMIT $offset, $limit";
    }

    public function getListOfCommentators($content, $offset, $limit) {
        $conn = $this->createConnection();
        $content_id = $content->getId();
        $query = "SELECT a.name_commentator, a.content_id, a.creation_time, a.id, a.comment FROM user_comment_content AS a, content AS b WHERE a.content_id = $content_id ORDER BY 3 LIMIT $offset, $limit";
        $stmt = $conn->prepare($query);

        $rows = $stmt->execute();
        //print_r($rows);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $name_commentator = $row['name_commentator'];
            $content_id = $row['content_id'];
            $creation_time = $row['creation_time'];
            $id = $row['id'];
            $comment = $row['comment'];
            printf("%s - %s - %s - %s - %s <br />", $name_commentator, $content_id, $creation_time, $id, $comment);
        } 
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
        $conn = $this->createConnection();
        $content_id = $content->getId();
        $query = "SELECT a.name_user, a.content_id, a.like_time FROM user_likes_content AS a, content AS b WHERE a.content_id = $content_id ORDER BY 3 LIMIT $offset, $limit";
        $stmt = $conn->prepare($query);

        $rows = $stmt->execute();
        //print_r($rows);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $name_user = $row['name_user'];
            $content_id = $row['content_id'];
            $like_time = $row['like_time'];
            printf("%s - %s - %s <br />", $name_user, $content_id, $like_time);
        }        
    }

    public function getMostFollowedUsers($offset, $limit) {
         $query = "SELECT b.name_user, count(*) AS qtdSeguidores FROM user_follows_user a, user b WHERE a.user_followed = b.name_user GROUP BY 1 ORDER BY 1 LIMIT $offset, $limit";
    }

    public function getNumberLikesComment($comment) {
        
    }

    public function getNumberOfCommentators($content) {
        $conn = $this->createConnection();
        $content_id = $content->getId();
        $query = "SELECT COUNT(*) AS quantidade FROM user_comment_content WHERE content_id = $content_id";
        $stmt = $conn->prepare($query);

        $rows = $stmt->execute();
        //print_r($rows);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $qnt = $row['quantidade'];
        printf("%s Usuário(os) comentou(ram) o conteúdo de ID = $content_id<br/>", $qnt);             
    }

    public function getNumberOfComments($content) {
        
    }

    public function getNumberOfUsersLikedContent($content) {
        $conn = $this->createConnection();
        $content_id = $content->getId();
        $query = "SELECT COUNT(*) AS quantidade FROM user_likes_content WHERE content_id = $content_id";
        $stmt = $conn->prepare($query);

        $rows = $stmt->execute();
        //print_r($rows);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $qnt = $row['quantidade'];
        printf("%s Usuário(os) curtiu(ram) o conteúdo de ID = $content_id<br/>", $qnt);         
    }

    public function getQtdCommentsUserTagged() {
        
    }

    public function getQtdContentsUserTagged() {
        
    }

    public function getQtdUserTaggedInComment($comment) {
        
    }

    public function getQtdUserTaggedInContent($content) {
        
    }

    public function getUserByUserName($user) {
        $conn = $this->createConnection();
        $user_name = $user->getName_user();
        $query = "SELECT * FROM user WHERE name_user = '$user_name'";
        $stmt = $conn->prepare($query);

        $rows = $stmt->execute();
        //print_r($rows);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $name_user = $row['name_user'];
        $email = $row['email'];
        $name = $row['name'];
        $password = $row['password'];
        $block_content = $row['block_content'];
        printf("User - %s - %s - %s - %s - %s <br />", $name_user, $email, $name, $password, $block_content); 
    }

    public function getUsersByName($user) {
        $conn = $this->createConnection();
        $name = $user->getName();
        $query = "SELECT * FROM user WHERE user.name = '$name'";
        $stmt = $conn->prepare($query);

        $rows = $stmt->execute();
        //print_r($rows);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $name_user = $row['name_user'];
        $email = $row['email'];
        $name = $row['name'];
        $password = $row['password'];
        $block_content = $row['block_content'];
        printf("User - %s - %s - %s - %s - %s <br />", $name_user, $email, $name, $password, $block_content);        
    }

    public function like($user, $content) {
        $user_name = $user->getName_user();
        $content_id = $content->getId();
        $query = "INSERT INTO user_likes_content (name_user, content_id) VALUES ('$user_name', '$content_id')";
    }

    public function removeComment($comment) {
        
    }

    public function removeContent($content) {
        $conn = $this->createConnection();
        $content_id = $content->getId();
        $query = "DELETE FROM content WHERE id = $content_id";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        printf("Error Code: 1451. Cannot delete or update a parent row: a foreign key constraint fails (`instagram`.`user_comment_content`, CONSTRAINT `fk_user_has_content_content1` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION) <br>");         
    }

    public function removeEffect($effect) {
        
    }

    public function removeTagInComment($comment, $user) {
        
    }

    public function removeTagInContent($content, $user) {
        
    }

    public function removeUserById($user_id) {
        $query = "DELETE FROM user WHERE name_user  = '$user_id'";
    }

    public function saveContent($content) {
        $conn = $this->createConnection();
        $id = $content->getId();
        $description = $content->getDescription();
        $path = $content->getPath();
        $name_user = $content->getUser()->getName_user();
        $type_content = $content->getType_content()->getId();
        $effects_id = $content->getEffects_id()->getId();
        //echo $conn;
        $query = "INSERT INTO content(id, description, path, name_user, type_content_id, effects_id) VALUES ('$id', '$description', '$path', '$name_user', '$type_content', '$effects_id')";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        printf("Conteudo inserido com sucesso");
    }

/*    public function saveUser($user) {
        
    }*/

    public function unfollow($a, $b) {
        $userA = $a->getName_user();
        $userB = $b->getName_user();
        $query ="DELETE FROM user_follows_user WHERE user_following = '$userA' AND user_followed = '$userB'";
    }

    public function unlike($user, $content) {
        $conn = $this->createConnection();
        $user_name = $user->getName_user();
        $content_id = $content->getId();
        $query = "DELETE FROM user_likes_content WHERE name_user = '$user_name' AND content_id='$content_id'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        printf("Unlike Sussefull <br>");  
    }

    public function updateComment($comment) {
        
    }

    public function updateContent($content) {
        $id = $content->getId();
        $description = $content->getDescription();
        $path = $content->getPath();
        $name_user = $content->getUser()->getName_user();
        $type_content_id = $content->getType_content()->getId();
        $effects_id = $content->getEfects()->getId();
        $query = "UPDATE content SET description=$description, path=$path, name_user=$name_user, type_content_id=$type_content_id, effects_id=$effects_id WHERE id = $id";
    }

    public function updateEffect($effect) {
        
    }

/*    public function updateUser($user) {
*        
    }*/

    public function userLikeComment($user, $comment) {
        
    }

    public function userUnlikeComment($user, $comment) {
        
    }

}
