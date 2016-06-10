<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require "./dao/InstagramDAO.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $dao = new InstagramDAO();
        $dao->getUsersByName("anitta");

        $user_name = "nome4";
        $email = "nome@444444gmail.com";
        $name = "nome";
        $password = "1234";
        $block_content = "0";

        //SAVE USER
        $dao->saveUserTeste($user_name, $email, $name, $password, $block_content);
        //SELECT 2 USERS
        $dao->selectUsersTeste(0, 2);
        //SAVE CONTENT TYPE AND RETURN ID
        $dao->saveAndReturnID(2, "asdfd");
        //UPDATE
        $dao->updateUserTeste($user_name, "emailmudadoad af asf", $name, $password, $block_content);
        //DELETE
        $dao->deleteUserTeste($user_name);
// put your code here
        ?>
    </body>
</html>
