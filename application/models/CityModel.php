<?php

class CityModel extends CI_Model{
    
    protected $idcity;
    protected $namecity;
    protected $state;
    
    
    function CityModel() {
        parent::__construct();

        $this->setIdcity(null);
        $this->setNamecity(null);
        $this->setState(null);
    }
    
    public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('city', $data)) {
                return true;
            }
        }
    }

    public function update($data = null) {
        if ($data != null) {
            $this->db->where("idcity", $data['idcity']);
            if ($this->db->update('city', $data)) {
                return true;
            }
        }
    }

    public function delete($idcity) {
        if ($idcity != null) {
            $this->db->where("idcity", $idcity);
            if ($this->db->delete("city")) {
                return true;
            }
        }
    }

    public function listing() {
        $this->db->select('*');
        return $this->db->get("city")->result();
    }

    public function search($idcity) {
        $this->db->where("idcity", $idcity);
        return $this->db->get("city")->row_array();
    }
    
    public function searchforname($name) {
        $this->db->where("namecity", $name);
        return $this->db->get("city")->result();
    }
    
    public function lastinsert() {
        return $this->search($this->db->insert_id("city"));
    }
    
    public function surecity($name, $id) {
        $this->db->where("namecity", $name);
        $this->db->where("state", $id);
        return $this->db->get("city")->row_array();
    }
    
    
    /* --------------------------------------- MÉTODOS GET E SET --------------------------------------- */
    
    
    public function getIdcity(){
        return $this->idcity;
    }
    
    public function setIdcity($idcity){
        $this->idcity = $idcity;
    }

    public function getNamecity() {
        return $this->namecity;
    }

    public function setNamecity($namecity) {
        $this->namecity = $namecity;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }
}