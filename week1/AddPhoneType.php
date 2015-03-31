<html>
<?php
$phoneType = filter_input(INPUT_POST, 'phonetype');

        if(!empty($_POST)){
            
            if(!empty($phoneType)){
            echo 'Phone type is empty';  
            }
            else{
                echo 'Phone is good';
            }
        
       }
      
?>
</html>
