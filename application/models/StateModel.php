<?php

class StateModel extends CI_Model{
    
    protected $idstate;
    protected $uf;
    
    
    function StateModel() {
        parent::__construct();

        $this->setIdstate(null);
        $this->setUF(null);
    }
    
    public function listing() {
        $this->db->select('*');
        return $this->db->get("state")->result();
    }
    
    public function search($idstate) {
        $this->db->where("idstate", $idstate);
        return $this->db->get("state")->row_array();
    }
    
    public function searchforuf($uf) {
        $this->db->where("uf", $uf);
        return $this->db->get("state")->row_array();
    }
    
    /* --------------------------------------- MÉTODOS GET E SET --------------------------------------- */
    
    
    public function getIdstate(){
        return $this->idstate;
    }
    
    public function setIdstate($idstate){
        $this->idstate = $idstate;
    }

    public function getUF() {
        return $this->uf;
    }

    public function setUF($uf) {
        $this->uf = $uf;
    }
}