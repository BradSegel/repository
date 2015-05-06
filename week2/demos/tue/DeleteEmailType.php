<?php 
namespace BradS\week2;
use \PDO;
include './bootstrap.php'; 

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        Email type Deleted
        <?php
         $emailtypeid = filter_input(INPUT_GET, 'emailtypeid');
                   
        $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );
        
        $pdo = new DB($dbConfig);
        $db = $pdo->getDB();
        
         $emailTypeDAO = new emailTypeDAO($db);
           $emailTypeDAO->delete($emailtypeid);
       //Deletin email
        ?>
        <a href="emailtype-test.php">Back</a>
    </body>
</html>
