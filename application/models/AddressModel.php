<?php

class AddressModel extends CI_Model{
    
    protected $idaddress;
    protected $street;
    protected $number;
    protected $cep;
    protected $district;
    
    function AddressModel() {
        parent::__construct();

        $this->setIdaddress(null);
        $this->setStreet(null);
        $this->setNumber(null);
        $this->setCEP(null);
        $this->setDistrict(null);
    }
    
    public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('address', $data)) {
                return true;
            }
        }
    }
    
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("idaddress", $data['idaddress']);
            if ($this->db->update('address', $data)) {
                return true;
            }
        }
    }
    
    public function delete($idaddress) {
        if ($idaddress != null) {
            $this->db->where("idaddress", $idaddress);
            if ($this->db->delete("address")) {
                return true;
            }
        }
    }
    
    public function search($idaddress) {
        $this->db->where("idaddress", $idaddress);
        return $this->db->get("address")->row_array();
    }
    
    public function lastinsert() {
        return $this->search($this->db->insert_id("address"));
    }
    
    /* --------------------------------------- MÉTODOS GET E SET --------------------------------------- */
    
    
    public function getIdaddress(){
        return $this->idaddress;
    }
    
    public function setIdaddress($idaddress){
        $this->idaddress = $idaddress;
    }

    public function getStreet() {
        return $this->street;
    }

    public function setStreet($street) {
        $this->street = $street;
    }

    public function getNumber() {
        return $this->number;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    public function getCEP() {
        return $this->cep;
    }

    public function setCEP($cep) {
        $this->cep = $cep;
    }

    public function getDistrict() {
        return $this->district;
    }

    public function setDistrict($district) {
        $this->district = $district;
    }
}