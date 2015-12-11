<?php

class LendingModel extends CI_Model {

    protected $id;
    protected $datehour;
    protected $cabinet;
    protected $visitor;
    protected $status;

    function LendingModel() {
        parent::__construct();

        $this->setId(null);
        $this->setDatehour(null);
        $this->setCabinet(null);
        $this->setVisitor(null);
        $this->setStatus(null);
    }

    public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('lending', $data)) {
                return true;
            }
        }
    }

    public function update($data = null) {
        if ($data != null) {
            $this->db->where("id", $data['id']);
            if ($this->db->update('lending', $data)) {
                return true;
            }
        }
    }

    public function delete($id) {
        if ($id != null) {
            $this->db->where("id", $id);
            if ($this->db->delete("lending")) {
                return true;
            }
        }
    }

    public function listing() {
        $this->db->select('*');
        return $this->db->get("lending")->result();
    }

    public function activelist() {
            $this->db->where("status", true);
        return $this->db->get("lending")->result();
    }

    public function search($id) {
        $this->db->where("id", $id);
        return $this->db->get("lending")->row_array();
    }
    
    public function inuse($cabinet) {
        $this->db->where("status", true);
        $this->db->where("cabinet", $cabinet);
        return $this->db->get("lending")->row_array();
    }

    /* --------------------------------------- MÉTODOS GET E SET --------------------------------------- */

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getDatehour() {
        return $this->datehour;
    }

    public function setDatehour($datehour) {
        $this->datehour = $datehour;
    }

    public function getCabinet() {
        return $this->cabinet;
    }

    public function setCabinet($cabinet) {
        $this->cabinet = $cabinet;
    }

    public function getVisitor() {
        return $this->visitor;
    }

    public function setVisitor($visitor) {
        $this->visitor = $visitor;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
