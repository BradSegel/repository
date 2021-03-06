<?php

/**
 * Validator Class
 * 
 * A collection of functions used to validate data
 *
 * @author Gabriel Forti
 */
class Validator {

    /**
     * A method to check if an email is valid.
     *
     * @param {String} [$email] - must be a valid email
     *
     * @return boolean
     */
    public function gunIsValid($email) {
        return ( is_string($email) && !empty($email));
    }
 public function caliberIsValid($email) {
        return ( is_string($email) && !empty($email));
    }
     public function sernumIsValid($email) {
        return ( is_string($email) && !empty($email));
    }
     public function manufIsValid($email) {
        return ( is_string($email) && !empty($email));
    }
    /**
     * A method to check if the email type is valid.
     *
     * @param {String} [$email] - must be a valid email type
     *
     * @return boolean
     */
    public function priceIsValid($email) {
        return ( is_string($email) && !empty($email) );
    }
    
    
    /**
     * A method to check if a phone number is valid.
     *
     * @param {String} [$phone] - must be a valid phone number
     *
     * @return boolean
     */
    public function phoneIsValid($phone) {
        return ( preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone) );
    }
    
    /**
     * A method to check if a phone type is valid.
     *
     * @param {String} [$type] - must be a valid string
     *
     * @return boolean
     */
    public function phoneTypeIsValid($type) {
        return ( is_string($type) && preg_match("/^[a-zA-Z]+$/", $type) );
    }
    
    /**
     * A method to check if a phone type is valid.
     *
     * @param {String} [$type] - must be a valid string
     *
     * @return boolean
     */
    public function activeIsValid($type) {
        return ( preg_match("/^[0-1]$/", $type) );
    }

}
