<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include './bootstrap.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Email Deleted
        <?php
         $emailid = filter_input(INPUT_GET, 'emailid');
                   
        $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );
        
        $pdo = new DB($dbConfig);
        $db = $pdo->getDB();
        
         $emailDAO = new emailDAO($db);
           $emailDAO->delete($emailid);
       //delete($emailid);
        ?>
        <a href="email-test.php">Back</a>
    </body>
</html>
