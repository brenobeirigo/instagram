<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require './model/Comment.php';
require './model/Content.php';
require './model/Effects.php';
require './model/TypeContent.php';
require './model/User.php';
require "./dao/InstagramDAO.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teste</title>
    </head>
    <body>
        <?php
        $dao = new InstagramDAO();
        //$dao->getUsersByName("anitta");

        $user_name = "nome4";
        $email = "nome@444444gmail.com";
        $name = "nome";
        $password = "123456";
        $block_content = "0";

        //SAVE USER
        //$dao->saveUser($user_name, $email, $name, $password, $block_content);
        //SELECT 2 USERS
        //$dao->selectUsers(0, 2); OK
        //SAVE CONTENT TYPE AND RETURN ID
        //$dao->saveTypeContentAndReturnID("gif"); OK
        //UPDATE
        //$dao->updateUser($user_name, "emailmudadoad af asf", $name, $password, $block_content); OK
        //DELETE
        //$dao->deleteUser($user_name); OK
        
        /*$tipoConteudo = new TypeContent("foto", 1);
        $efeito = new Effects("Negativo", 2);
        $usuario = new User("bambam123", "birl@ibirapuera.com", "Kleber", "biiirl");
        $content = new Content("Mais um dia na academia", "caminho.jpg", $usuario->getName_user(), $tipoConteudo->getId(), $efeito->getId(), 35);
        $comment = new Comment($usuario->getName_user(), $content->getId(), "Desmatando a poha toda", 21);
        
        echo "<br><br> Objetos Instanciados:<br>";
        echo "<br>".$tipoConteudo."<br><br>";
        echo $efeito."<br><br>";
        echo $usuario."<br><br>";
        echo $content."<br><br>";
        echo $comment."<br><br>";*/
        $usuario = new User("vitor", "birl@ibirapuera.com", "Vitor", "biiirl");
        $tipoConteudo = new TypeContent("foto", 1);
        $efeito = new Effects("Negativo", 1);        
        $content = new Content("Mais um dia na academia", "caminho.jpg", $usuario, $tipoConteudo, $efeito, 3);
        
        //$dao->saveContent($content);
        echo "<br><b>1- Método getContentById(content_id) Resultado:</b><br><br>";
        $dao->getContentById($content);
        echo "<br><b>2- Método getContentOfUser(user, offset, limit, type) Resultado:</b><br><br>";
        $dao->getContentOfUser($usuario, 0, 1, $tipoConteudo);
        echo "<br><b>3- Método getFollowersList(user, offset, limit) Resultado:</b><br><br>";
        $dao->getFollowersList($usuario, 0, 1);
        echo "<br><b>4- Método getListOfCommentators(content, offset, limit) Resultado:</b><br><br>";
        $dao->getListOfCommentators($content, 0, 1);
        echo "<br><b>5- Método getNumberOfUsersLikedContent(content) Resultado:</b><br><br>";
        $dao->getNumberOfUsersLikedContent($content);
        echo "<br><b>6- Método getUserByUserName(user_id) Resultado:</b><br><br>";
        $dao->getUserByUserName($usuario);
        echo "<br><b>7- Método getUsersByName(name) Resultado:</b><br><br>";
        $dao->getUsersByName($usuario);
        echo "<br><b>8- Método getListOfUsersLikedContent(content, offset, limit) Resultado:</b><br><br>";
        $dao->getListOfUsersLikedContent($content, 0, 1);
        echo "<br><b>9- Método unlike(user, content) Resultado:</b><br><br>";
        $dao->unlike($usuario, $content);
        echo "<br><b>10- Método getAllUsers() Resultado:</b><br><br>";
        $dao->getAllUsers();
        echo "<br><b>11- Método removeContent(content) Resultado:</b><br><br>";
        $dao->removeContent($content);
        echo "<br><b>12- Método getNumberOfCommentators(content) Resultado:</b><br><br>";
        $dao->getNumberOfCommentators($content);
        ?>
    </body>
</html>
