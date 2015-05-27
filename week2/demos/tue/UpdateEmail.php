<?php 
namespace BradS\week2;
include './bootstrap.php'; 
use PDO;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


        
        <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
            
        
        
                  
        $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );
        
        $pdo = new DB($dbConfig);
        $db = $pdo->getDB();
       
        $util = new Util();
        $validator = new Validator();
        $emailDAO = new EmailDAO($db);
        $emailModel = new emailModel();
         
        if ( $util->isPostRequest() ) {
            
            $emailModel->map(filter_input_array(INPUT_POST));
                       
        } else {
            $emailid = filter_input(INPUT_GET, 'emailid');
            $emailModel = $emailDAO->getById($emailid);
        }
        
        
        $emailid = $emailModel->getEmailid();
        $email = $emailModel->getEmail();
        $active = $emailModel->getActive();  
              
        
        $emailService = new EmailService($db, $util, $validator, $emailDAO, $emailModel);
      
        if ( $emailDAO->idExisit($emailModel->getEmailid()) ) {
            $emailService->saveForm();
        }

        ?>
        
        
         <h3>Edit Email</h3>
        <form action="#" method="post">
            <label>Email:</label> 
            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="" />
            <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?>" />
            <input type="hidden"  name="emailid" value="<?php echo $emailid; ?>" />
            <input type="hidden" name="action" value="save" />
            <input type="submit" value="Submit" />
        </form>
         
         <br />
         <br />
    
        <a href="email-test.php">Back</a>
    </body>
</html>