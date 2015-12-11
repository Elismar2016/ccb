<?php

include 'AddressModel.php';
include 'UserModel.php';

class VisitorModel extends CI_Model{ 
    
    
    protected $id;
    protected $name;
    protected $cpf;
    protected $rg;
    protected $phone;
    protected $address;
    protected $maker;
    protected $status;
    
    
    function VisitorModel() {
        parent::__construct();

        $this->setId(null);
        $this->setName(null);
        $this->setCPF(null);
        $this->setRG(null);
        $this->setPhone(null);
        $this->setAddress(null);
        $this->setMaker(null);
        $this->setStatus(null);
    }
    
    
    public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('visitor', $data)) {
                return true;
            }
        }
    }

    public function update($data = null) {
        if ($data != null) {
            $this->db->where("id", $data['id']);
            if ($this->db->update('visitor', $data)) {
                return true;
            }
        }
    }

    public function delete($id) {
        if ($id != null) {
            $this->db->where("id", $id);
            $aux = $this->db->get("visitor")->row_array();
            $aux = $aux['address'];
            
            $this->db->where("id", $id);
            if ($this->db->delete("visitor")) {
                $this->db->where("idaddress", $aux);
                if($this->db->delete("address")){
                    return true;
                }
            }
        }
    }

    public function listing() {
        $this->db->select('*');
        $this->db->order_by("name", "asc");
        $this->db->join('address', 'address.idaddress=address', 'inner');
        $this->db->join('district', 'district.iddistrict=address.district', 'inner');
        $this->db->join('city', 'city.idcity=district.city', 'inner');
        $this->db->join('state', 'state.idstate=city.state', 'inner');
        return $this->db->get("visitor")->result();
    }

    public function search($id) {
        $this->db->where("id", $id);
        return $this->db->get("visitor")->row_array();
    }

    public function searchforcpf($cpf) {
        $this->db->where("cpf", $cpf);
        $this->db->order_by("name", "asc");
        $this->db->join('address', 'address.idaddress=address', 'inner');
        $this->db->join('district', 'district.iddistrict=address.district', 'inner');
        $this->db->join('city', 'city.idcity=district.city', 'inner');
        $this->db->join('state', 'state.idstate=city.state', 'inner');
        return $this->db->get("visitor")->result();
    }

    public function searchforrg($rg) {
        $this->db->where("rg", $rg);
        $this->db->order_by("name", "asc");
        $this->db->join('address', 'address.idaddress=address', 'inner');
        $this->db->join('district', 'district.iddistrict=address.district', 'inner');
        $this->db->join('city', 'city.idcity=district.city', 'inner');
        $this->db->join('state', 'state.idstate=city.state', 'inner');
        return $this->db->get("visitor")->result();
    }

    public function searchforname($name) {
        $this->db->like("name", $name);
        $this->db->order_by("name", "asc");
        $this->db->join('address', 'address.idaddress=address', 'inner');
        $this->db->join('district', 'district.iddistrict=address.district', 'inner');
        $this->db->join('city', 'city.idcity=district.city', 'inner');
        $this->db->join('state', 'state.idstate=city.state', 'inner');
        return $this->db->get("visitor")->result();
    }
    
    public function verifycpf($cpf){
        $this->db->where("cpf", $cpf);
        $query = $this->db->get("visitor")->row_array();
        if($query === null){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function verifyrg($rg){
        $this->db->where("cpf", $cpf);
        $query = $this->db->get("visitor")->row_array();
        if($query === null){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function changestat($id) {
        $visitor = $this->search($id);
        if($visitor['status'] === '1'){
            $visitor['status'] = '0';
        }
        else{
            $visitor['status'] = '1';
        }
        $this->db->where("id", $id);
        if ($this->db->update('visitor', $visitor)) {
            return true;
        }
    }
    
    /* --------------------------------------- MÉTODOS GET E SET --------------------------------------- */
    
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCPF() {
        return $this->cpf;
    }

    public function setCPF($cpf) {
        $this->cpf = $cpf;
    }

    public function getRG() {
        return $this->rg;
    }

    public function setRG($rg) {
        $this->rg = $rg;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = new AddressModel();
    }

    public function getMaker() {
        return $this->maker;
    }

    public function setMaker($maker) {
        $this->maker = $maker;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    
}
