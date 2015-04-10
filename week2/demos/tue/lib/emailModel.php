<?php
/**
 * PhoneModel
 * 
 * The idea of the model(Data Object) is to provide an object the reflects your
 * table in your database.  Notice all the private variables are the colums from
 * the table in our database.
 * 
 * One word of advise, keep all table names in your models class lowercase.  When creating 
 * getter and setter functions it will camel case (Java Style) your functions.
 *
 * @author User
 */
namespace BradS\week2;

class emailModel implements IModel {
    
    private $emailid;
    private $email;
    private $emailtypeid;
    private $emailtype;
    private $emailtypeactive;
    private $logged;
    private $lastupdated;
    private $active;
    
    function getemailid() {
        return $this->emailid;
    }

    function getemail() {
        return $this->email;
    }

    function getemailtypeid() {
        return $this->emailtypeid;
    }
    
     function getemailtype() {
        return $this->emailtype;
    }

    function getemailtypeactive() {
        return $this->emailtypeactive;
    }

    function getLogged() {
        return $this->logged;
    }

    function getLastupdated() {
        return $this->lastupdated;
    }

    function getActive() {
        return $this->active;
    }

    function setemailid($emailid) {
        $this->emailid = $emailid;
    }

    function setemail($email) {
        $this->email = $email;
    }

    function setemailtypeid($emailtypeid) {
        $this->emailtypeid = $emailtypeid;
    }

    function setemailtype($emailtype) {
        $this->emailtype = $emailtype;
    }

    function setemailtypeactive($emailtypeactive) {
        $this->emailtypeactive = $emailtypeactive;
    }
    
    function setLogged($logged) {
        $this->logged = $logged;
    }

    function setLastupdated($lastupdated) {
        $this->lastupdated = $lastupdated;
    }

    function setActive($active) {
        $this->active = $active;
    }
    
    /*
    * When a class has to implement an interface those functions must be created in the class.
    */
    public function reset() {
        $this->setemailid('');
        $this->setemail('');
        $this->setemailtypeid('');
        $this->setemailtype('');
        $this->setemailtypeactive('');
        $this->setLogged('');
        $this->setLastupdated('');
        $this->setActive('');
        return $this;
    }
    
    
   
    public function map(array $values) {
        
        if ( array_key_exists('emailid', $values) ) {
            $this->setemailid($values['emailid']);
        }
        
        if ( array_key_exists('email', $values) ) {
            $this->setemail($values['email']);
        }
        
        if ( array_key_exists('emailtypeid', $values) ) {
            $this->setemailtypeid($values['emailtypeid']);
        }
        
        if ( array_key_exists('emailtype', $values) ) {
            $this->setemailtype($values['emailtype']);
        }
        
        if ( array_key_exists('emailtypeactive', $values) ) {
            $this->setemailtypeactive($values['emailtypeactive']);
        }
        
        if ( array_key_exists('logged', $values) ) {
            $this->setLogged($values['logged']);
        }
        
        if ( array_key_exists('lastupdated', $values) ) {
            $this->setLastupdated($values['lastupdated']);
        }
        
        if ( array_key_exists('active', $values) ) {
            $this->setActive($values['active']);
        }
        return $this;
    }


}
