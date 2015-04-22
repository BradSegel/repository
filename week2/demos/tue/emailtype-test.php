<?php 
namespace BradS\week2;
use \PDO;
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
       
            
            if ( $util->isPostRequest() ) {
                $validator = new Validator(); 
                $errors = array();
                if( !$validator->emailTypeIsValid($emailType) ) {
                    $errors[] = 'email Type is invalid';
                } 
                
                if ( !$validator->activeIsValid($active) ) {
                     $errors[] = 'Active is invalid';
                }
                
                
                
                if ( count($errors) > 0 ) {
                    foreach ($errors as $value) {
                        echo '<p>',$value,'</p>';
                    }
                } else {
                    /*
                    * Fax,Home,Moble,Pager,Work
                    */
                   
                    $emailTypeDAO = new emailTypeDAO($db);
                   
                    $emailtypeModel = new emailTypeModel();
                    $emailtypeModel->setActive($active);
                    $emailtypeModel->setemailtype($emailType);
                    
                   // var_dump($emailtypeModel);
                    if ( $emailTypeDAO->save($emailtypeModel) ) {
                        echo 'email Added';
                    }
                    
                               
                    
                }
                
                
            }
        
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
             $stmt = $db->prepare("SELECT * FROM emailtype");
         
            if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                 foreach ($results as $value) {
                       echo '<p>',$value['emailtype'],'</p>';
                   }

            } else {
                echo '<p>No Data</p>';
            }
         ?>
         
         
    </body>
</html>
