<?php
 class AddClass {
     
     public function DatabaseConfig($EmailType) {
        $dbConfig = array("DB_DNS" => 'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015', "DB_USER" => 'root', "DB_PASSWORD" => '');

        $pdo = new DB($dbConfig);
        $db = $pdo->getDB();

        $stmt = $db->prepare("INSERT INTO emailtype SET emailtype = :emailtype");

        $values = array(":emailtype" => $EmailType);

        if ($stmt->execute($values) && $stmt->rowCount() > 0) {

            echo 'email has been Added';
        }
    }

    public function Display(){
          $dbConfig =array("DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',"DB_USER"=>'root',"DB_PASSWORD"=>'');
 
    $pdo = new DB($dbConfig);
    $db = $pdo->getDB();
    
    $stmt = $db->prepare("SELECT * FROM emailtype");
    
      if ($stmt->execute() && $stmt->rowCount() > 0) {
            $Stuff = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($Stuff as $value) {
                if ($value['active'] == 1) {
                    echo '<strong>', $value['emailtype'], '</strong>', '<br />';
                } else if ($value['active'] != 1) {

                    echo '<p>', $value['emailtype'], '</p>', '<br />';
                }
            }
        }
    }

}
 
?>

