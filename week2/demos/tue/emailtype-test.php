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
        $emailTypeDAO = new emailTypeDAO($db);
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
         
         <table border="1" cellpadding="5">
                <tr>
                   
                    <th>email Type</th>
                   
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
         <?php         
             $stmt = $db->prepare("SELECT * FROM emailtype");
         
           
               
 $emailtypes = $emailTypeDAO->getAllRows();  
            foreach ($emailtypes as $value) {
                echo '<tr>'
                        . '<td>',$value->getemailtype(),'</td>';
                         echo  '<td><a href="DeleteEmailType.php?emailid=',$value->getemailtypeid(),'">Delete</a></td>'
                                 . '<td><a href="UpdateEmailType.php?emailid=',$value->getemailtypeid(),'">Update</a></td>'
                                 . '</tr>' ;
            }
            
         ?>
         
         
    </body>
</html>
