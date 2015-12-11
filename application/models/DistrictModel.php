<?php

class DistrictModel extends CI_Model{
    
    protected $iddistrict;
    protected $namedistrict;
    protected $city;
    
    
    function DistrictModel() {
        parent::__construct();

        $this->setIddistrict(null);
        $this->setNamedistrict(null);
        $this->setCity(null);
    }
    
    public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('district', $data)) {
                return true;
            }
        }
    }

    public function update($data = null) {
        if ($data != null) {
            $this->db->where("iddistrict", $data['iddistrict']);
            if ($this->db->update('district', $data)) {
                return true;
            }
        }
    }

    public function delete($iddistrict) {
        if ($iddistrict != null) {
            $this->db->where("iddistrict", $iddistrict);
            if ($this->db->delete("district")) {
                return true;
            }
        }
    }

    public function listing() {
        $this->db->select('*');
        return $this->db->get("district")->result();
    }

    public function search($iddistrict) {
        $this->db->where("iddistrict", $iddistrict);
        return $this->db->get("district")->row_array();
    }
    
    public function searchforname($name) {
        $this->db->where("namedistrict", $name);
        return $this->db->get("district")->result();
    }
    
    public function lastinsert() {
        return $this->search($this->db->insert_id("district"));
    }
    
    public function suredistrict($name, $id) {
        $this->db->where("namedistrict", $name);
        $this->db->where("city", $id);
        return $this->db->get("district")->row_array();
    }
    
    /* --------------------------------------- MÉTODOS GET E SET --------------------------------------- */
    
    
    public function getIddistrict(){
        return $this->iddistrict;
    }
    
    public function setIddistrict($iddistrict){
        $this->iddistrict = $iddistrict;
    }

    public function getNamedistrict() {
        return $this->namedistrict;
    }

    public function setNamedistrict($namedistrict) {
        $this->namedistrict = $namedistrict;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }
}