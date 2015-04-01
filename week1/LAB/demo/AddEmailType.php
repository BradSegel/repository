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
$AddClass = new AddClass();

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
    
 $AddClass-> DatabaseConfig($EmailType);
 
}
        
        ?>
         <h3>Add Email type</h3>
        <form action="#" method="post">
            <label>email Type:</label> 
            <input type="text" name="emailtype" value="<?php echo $EmailType; ?>" placeholder="" />
            <input type="submit" value="Submit" />
        </form>
         <?PHP
          $AddClass->Display();
         ?>
    </body>
</html>

