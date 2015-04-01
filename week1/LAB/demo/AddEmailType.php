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

$EmailType = filter_input(INPUT_POST, 'emailtype');

$errors = array();

if ( $util->isPostRequest() ) {

    if (!$validator->emailTypeIsValid($EmailType)) {
        $errors[] = 'email type is not valid';
    }
}

if ( count($errors) > 0 ) {
    foreach ($errors as $value) {
        echo '<p>',$value,'</p>';
    }
} else {
    
 $dbConfig =array("DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',"DB_USER"=>'root',"DB_PASSWORD"=>'');
 
    $pdo = new DB($dbConfig);
    $db = $pdo->getDB();
    
    $stmt = $db->prepare("INSERT INTO emailtype SET emailtype = :emailtype");
    
    $values = array(":emailtype"=>$EmailType);
    
    if ( $stmt->execute($values) && $stmt->rowCount() > 0 ) {
        
        echo 'email has been Added';
    }  
    
}
        
        ?>
         <h3>Add Email type</h3>
        <form action="#" method="post">
            <label>email Type:</label> 
            <input type="text" name="emailtype" value="<?php echo $EmailType; ?>" placeholder="" />
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>

