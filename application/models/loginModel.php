<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class loginModel extends CI_Model{
 
    /**
     * returns a list of articles
     * @return array  
     */
    public function login($username, $password) {
        
        $stuff = $this->mongo_db->get('stuff');

        
        foreach($stuff as $account) {

            if ($account['username'] == $username && $account['password'] == $password) {
               return true;
            } 
        }

        return false;
        
    }

    public function register($username, $password) {

        $accountDetails = array("username" => $username, "password" => $password);

        $this->mongo_db->insert('stuff', $accountDetails);
    }
    
}
?>