<?php

/**
 * Description of PhoneTypeDAO
 *
 * @author User
 */

namespace App\models\services;

use App\models\interfaces\IDAO;
use App\models\interfaces\IModel;
use App\models\interfaces\ILogging;
use \PDO;

class EmailDAO extends BaseDAO implements IDAO {
    
    public function __construct( PDO $db, IModel $model, ILogging $log ) {        
        $this->setDB($db);
        $this->setModel($model);
        $this->setLog($log);
    }
          
    protected function idExisit($id) {
        
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM email WHERE emailid = :emailid");
         
        if ( $stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0 ) {
            return true;
        }
         return false;
    }
    
  
    
    public function read($id) {
         
         $model = clone $this->getModel();
         
         $db = $this->getDB();
         
         $stmt = $db->prepare("SELECT email.emailid, email.email, email.emailtypeid, emailtype.emailtype, emailtype.active as emailtypeactive, email.logged, email.lastupdated, email.active"
                 . " FROM email LEFT JOIN emailtype on email.emailtypeid = emailtype.emailtypeid WHERE emailid = :emailid");
         
         if ( $stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);
             $model->reset()->map($results);
         }
         
         return $model;
    }
    
    
    public function create(IModel $model) {
                 
         $db = $this->getDB();
         
         $binds = array( ":email" => $model->getEmail(),
                          ":active" => $model->getActive(),
                           ":emailtypeid" => $model->getEmailTypeid()
                    );
                         
         if ( !$this->idExisit($model->getEmailid()) ) {
             
             $stmt = $db->prepare("INSERT INTO email SET email = :email, emailtypeid = :emailtypeid, active = :active, logged = now(), lastupdated = now()");
             
             if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
                return true;
              
             }
             else{
                // var_dump($db->errorInfo());
             }
             }
         
               
         
         return false;
    }
    
    
     public function update(IModel $model) {
                 
         $db = $this->getDB();
         
         $binds = array( ":email" => $model->getEmail(),
                          ":active" => $model->getActive(),
                         ":emailtypeid" => $model->getEmailTypeid() ,
                ":emailid" => $model->getEmailid()
                    );
         
      
         if ( $this->idExisit($model->getEmailid()) ) {
            
             $stmt = $db->prepare("UPDATE email SET email = :email, active = :active, emailtypeid = :emailtypeid WHERE emailid = :emailid");
         
             if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
                return true;
             } else {
                 $error = implode(",", $db->errorInfo());
                 $this->getLog()->logError($error);
             }
             
         } 
         
         return false;
    }
    
     public function getById($id) {
         
         $model = new emailModelModel(); // this creates a dependacy, how can we fix this
         $db = $this->getDB();
         
         $stmt = $db->prepare("SELECT email.emailid, email.email, email.emailtypeid, emailtype.emailtype, emailtype.active as emailtypeactive, email.logged, email.lastupdated, email.active"
                 . " FROM email LEFT JOIN emailtype on email.emailtypeid = emailtype.emailtypeid WHERE emailid = :emailid");
         
         if ( $stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);
             $model->map($results);
         }
         
         return $model;
    }
    
    public function delete($id) {
          
        $db = $this->getDB();         
        $stmt = $db->prepare("Delete FROM email WHERE emailid = :emailid");

        if ( $stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0 ) {
            return true;
        } else {
            
        }
         
         return false;
    }
    
    public function getAllRows() {
       $db = $this->getDB();
       $values = array();
       
        $stmt = $db->prepare("SELECT email.emailid, email.email, email.emailtypeid, emailtype.emailtype, emailtype.active as emailtypeactive, email.logged, email.lastupdated, email.active"
                 . " FROM email LEFT JOIN emailtype on email.emailtypeid = emailtype.emailtypeid ");
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $value) {
               $model = clone $this->getModel();
               $model->reset()->map($value);
               $values[] = $model;
            }
        }
        
        $stmt->closeCursor();
         return $values;
    }
     
    
     
}
