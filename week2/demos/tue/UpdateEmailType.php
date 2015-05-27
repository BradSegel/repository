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
        $emailTypeDAO = new EmailTypeDAO($db);
        $emailTypeModel = new emailTypeModel();
         
        if ( $util->isPostRequest() ) {
            
            $emailTypeModel->map(filter_input_array(INPUT_POST));
                       
        } else {
            $emailTypeid = filter_input(INPUT_GET, 'emailtypeid');
            $emailTypeModel = $emailTypeDAO->getById($emailTypeid);
        }
        
        
        $emailTypeid = $emailTypeModel->getEmailTypeid();
        $emailType = $emailTypeModel->getEmailType();
        $active = $emailTypeModel->getActive();  
              
        var_dump($emailTypeid);
        $emailTypeService = new EmailTypeService($db, $util, $validator, $emailTypeDAO, $emailTypeModel);
        
        if ( $emailTypeDAO->idExisit($emailTypeModel->getemailtypeid()) ) {
            $emailTypeService->saveForm();
        }

        ?>
        
        
         <h3>Edit Email type</h3>
        <form action="#" method="post">
            <label>Emailtype:</label> 
            <input type="text" name="email" value="<?php echo $emailType; ?>" placeholder="" />
            <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?>" />
            <input type="hidden"  name="emailid" value="<?php echo $emailTypeid; ?>" />
            <input type="hidden" name="action" value="save" />
            <input type="submit" value="Submit" />
        </form>
         
         <br />
         <br />
    
         <a href="emailtype-test.php">Back</a>
    </body>
</html>