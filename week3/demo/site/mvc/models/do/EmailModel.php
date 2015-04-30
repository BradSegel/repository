<?php
namespace App\models\services;


class EmailModel extends BaseModel {
    
    private $emailid;
    private $email;
    private $active;
    
    function getEmailid() {
        return $this->emailid;
    }
    function getEmailType() {
        return $this->emailType;
    }
    function getEmail() {
        return $this->email;
    }

    function getActive() {
        return $this->active;
    }

    function setEmailid($emailid) {
        $this->emailid = $emailid;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setActive($active) {
        $this->active = $active;
    }


}
