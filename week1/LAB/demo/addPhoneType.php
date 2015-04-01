<?php include './bootstrap.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        
        <?php
        
$util = new Util();
$validator = new Validator();

$phoneType = filter_input(INPUT_POST, 'Emailtype');

$errors = array();

if ( $util->isPostRequest() ) {

    if ( !$validator->emailIsValid($EmailType) ) {
        $errors[] = 'email type is not valid';
    }
}

if ( count($errors) > 0 ) {
    foreach ($errors as $value) {
        echo '<p>',$value,'</p>';
    }
} else {
    
 $dbConfig =array("DB__DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
     "DB_USER"=>'root',
     "DB_PASSWORD"=>'');
 
    $pdo = new DB($dbConfig);
    $db = $pdo->getDB();
    
    $stmt = $db->prepare("INSERT INTO emailtype SET emailtype = :emailtype");
    
    $values = array(":emailtype"=>$EmailType);
    
    if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
        echo 'email Added';
    }  
    
}
        
        ?>
        
         <h3>Add Email type</h3>
        <form action="#" method="post">
            <label>email Type:</label> 
            <input type="text" name="phonetype" value="<?php echo $emailType; ?>" placeholder="" />
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
