<?php
namespace App\models\services;


use App\models\interfaces\IDAO;
use App\models\interfaces\IService;
use App\models\interfaces\IModel;

class EmailService implements IService {
    
     protected $DAO;
     protected $validator;
     
     function getValidator() {
         return $this->validator;
     }

     function setValidator($validator) {
         $this->validator = $validator;
     }

                  
     
     function getDAO() {
         return $this->DAO;
     }

     function setDAO(IDAO $DAO) {
         $this->DAO = $DAO;
     }

    public function __construct( IDAO $EmailDAO, $validator  ) {
        $this->setDAO($EmailDAO);
        $this->setValidator($validator);
    }
    
    
    public function getAllRows($limit = "", $offset = "") {
        return $this->getDAO()->getAllRows($limit, $offset);
    }
    
    public function read($id) {
        return $this->getDAO()->read($id);
    }
    
    public function delete($id) {
        return $this->getDAO()->delete($id);
    }
    
    public function create(IModel $model) {
        
        if ( count($this->validate($model)) === 0 ) {
            return $this->getDAO()->create($model);
        }
        return false;
    }
    
    public function update(IModel $model) {
        
        if ( count($this->validate($model)) === 0 ) {
            return $this->getDAO()->update($model);
        }
        return false;
    }
    
    public function validate( IModel $model ) {
        $errors = array();
        if ( !$this->getValidator()->emailIsValid($model->getEmail()) ) {
            $errors[] = 'email is invalid';
        }
               
        if ( !$this->getValidator()->activeIsValid($model->getActive()) ) {
            $errors[] = 'email is invalid';
        }
       
        
        return $errors;
    }
    
    
    
}
