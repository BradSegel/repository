<?php 
namespace BradS\week2;
include './bootstrap.php'; 
?>
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

        $emailType = filter_input(INPUT_POST, 'emailtype');
        $active = filter_input(INPUT_POST, 'active');
        
        $util = new Util();
        $validator = new Validator();
        $emailTypeDAO = new emailTypeDAO($db);
        
        $emailtypeModel = new emailTypeModel();
        $emailtypeModel->setActive($active);
        $emailtypeModel->setemailtype($emailType);

        $emailTypeService = new emailTypeService($db, $util, $validator, $emailTypeDAO, $emailtypeModel);
        
        $emailTypeService->saveForm();
        
        ?>
        
        
         <h3>Add email type</h3>
        <form action="#" method="post">
            <label>email Type:</label> 
            <input type="text" name="emailtype" value="<?php echo $emailType; ?>" placeholder="" />
            <br /><br />
            <label>Active:</label>
            <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?>" />
             <br /><br />
            <input type="submit" value="Submit" />
        </form>
         
         
         <?php         
             $emailTypeService->displayemails();
         ?>
         
         
    </body>
</html>
