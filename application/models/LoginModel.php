<?php
class LoginModel extends CI_Model{
    
    public function search($username, $password){
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        
        return $this->db->get("user")->row_array();
    }
    
}