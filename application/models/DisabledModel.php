<?php

class DisabledModel extends CI_Model {

    protected $iddisabled;
    protected $cabinet;
    protected $reason;
    protected $date;
    protected $status;

    function DisabledModel() {
        parent::__construct();

        $this->setIddisabled(null);
        $this->setCabinet(null);
        $this->setReason(null);
        $this->setDate(null);
        $this->setStatus(null);
    }

    public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('disabled', $data)) {
                return true;
            }
        }
    }
    
    public function update($data = null) {
        if ($data != null) {
            $this->db->where("iddisabled", $data['iddisabled']);
            if ($this->db->update('disabled', $data)) {
                return true;
            }
        }
    }

    public function delete($iddisabled) {
        if ($iddisabled != null) {
            $this->db->where("iddisabled", $iddisabled);
            if ($this->db->delete("disabled")) {
                return true;
            }
        }
    }

    public function isdisabled($cabinet) {
        $this->db->where("status", true);
        $this->db->where("cabinet", $cabinet);
        return $this->db->get("disabled")->row_array();
    }
    
    public function listing() {
        $this->db->where("status", true);
        return $this->db->get("disabled")->result();
    }

    public function search($iddisabled) {
        $this->db->where("iddisabled", $iddisabled);
        return $this->db->get("disabled")->row_array();
    }
    
    public function inuse($cabinet) {
        $this->db->where("status", true);
        $this->db->where("cabinet", $cabinet);
        return $this->db->get("lending")->row_array();
    }

    /* --------------------------------------- MÉTODOS GET E SET --------------------------------------- */

    public function getIddisabled() {
        return $this->iddisabled;
    }

    public function setIddisabled($iddisabled) {
        $this->iddisabled = $iddisabled;
    }

    public function getCabinet() {
        return $this->cabinet;
    }

    public function setCabinet($cabinet) {
        $this->cabinet = $cabinet;
    }

    public function getReason() {
        return $this->reason;
    }

    public function setReason($reason) {
        $this->reason = $reason;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}
