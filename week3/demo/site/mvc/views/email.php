

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        // put your code here
        //$scope = new Scope();
        
       
         if ( $scope->util->isPostRequest() ) {
             
             if ( isset($scope->view['errors']) ) {
                print_r($scope->view['errors']);
             }
             
             if ( isset($scope->view['saved']) && $scope->view['saved'] ) {
                  echo 'Email Added';
             }
             
             if ( isset($scope->view['deleted']) && $scope->view['deleted'] ) {
                  echo 'Email deleted';
             }
             
         }
        
         $email = $scope->view['model']->getEmail();
         $active = $scope->view['model']->getActive();
        
        ?>
        
        
         <h3>Add email</h3>
        <form action="#" method="post">
            <label>Email:</label> 
            <input type="text" name="Email" value="<?php echo $email; ?>" placeholder="" />
            <input type="number" max="1" min="0" name="Active" value="<?php echo $active; ?>" />
            <input type="hidden" name="action" value="create" />
            <input type="submit" value="Submit" />
        </form>
                  <br /><br />
            <label>email Type:</label>
            <select name="emailtypeid">
            <?php 
                foreach ($scope->view['EmailTypes'] as $value) {
                    if ( $value->getemailtypeid() == $emailTypeid ) {
                        echo '<option value="',$value->gettmailtypeid(),'" selected="selected">',$value->getemailtype(),'</option>';  
                    } else {
                        echo '<option value="',$value->getemailtypeid(),'">',$value->getemailtype(),'</option>';
                    }
                }
            ?>
            </select>
            
             <br /><br />
            
         
        <form action="#" method="post">
            <input type="hidden" name="action" value="add" />
            
        </form>
         <?php
         
        
          if ( count($scope->view['Emails']) <= 0 ) {
            echo '<p>No Data</p>';
        } else {
            
            
             echo '<table border="1" cellpadding="5"><tr><th>Email</th><th>Active</th><th>Email type</th><th>edit</th><th>delete</th></tr>';
             foreach ($scope->view['Emails'] as $value) {
                echo '<tr>';
                echo '<td>', $value->getEmail(),'</td>';
                echo '<td>', ( $value->getActive() == 1 ? 'Yes' : 'No') ,'</td>';
                echo '<td>', $value->getEmailType() ,'</td>';
                echo '<td><form action="#" method="post"><input type="hidden"  name="emailid" value="',$value->getEmailid(),'" /><input type="hidden" name="action" value="edit" /><input type="submit" value="EDIT" /> </form></td>';
                echo '<td><form action="#" method="post"><input type="hidden"  name="emailid" value="',$value->getEmailid(),'" /><input type="hidden" name="action" value="delete" /><input type="submit" value="DELETE" /> </form></td>';
                echo '</tr>' ;
            }
            echo '</table>';
            
        }
         
         
         
         
         
        ?><a href="index">Index<a>
    </body>
</html>
