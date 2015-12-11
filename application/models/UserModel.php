<?php

class UserModel extends CI_Model {

    protected $id;
    protected $name;
    protected $username;
    protected $phone;
    protected $password;
    protected $role;
    protected $status;

    function UserModel() {
        parent::__construct();

        $this->setId(null);
        $this->setName(null);
        $this->setUsername(null);
        $this->setPhone(null);
        $this->setPassword(null);
        $this->setRole(null);
        $this->setStatus(null);
    }

    public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('user', $data)) {
                return true;
            }
        }
    }

    public function update($data = null) {
        if ($data != null) {
            $this->db->where("id", $data['id']);
            if ($this->db->update('user', $data)) {
                return true;
            }
        }
    }

    public function delete($id) {
        if ($id != null) {
            $this->db->where("id", $id);
            if ($this->db->delete("user")) {
                return true;
            }
        }
    }

    public function listing() {
        $this->db->select('*');
        $this->db->order_by("role", "asc");
        $this->db->order_by("name", "asc");
        return $this->db->get("user")->result();
    }

    public function search($id) {
        $this->db->where("id", $id);
        return $this->db->get("user")->row_array();
    }
    
    public function verifyusn($username){
        $this->db->where("username", $username);
        return $this->db->get("user")->row_array();
    }
    
    public function changestat($id) {
        $user = $this->search($id);
        if($user['status'] === '1'){
            $user['status'] = '0';
        }
        else{
            $user['status'] = '1';
        }
        $this->db->where("id", $id);
        if ($this->db->update('user', $user)) {
            return true;
        }
    }

    /* --------------------------------------- MÉTODOS GET E SET --------------------------------------- */

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
