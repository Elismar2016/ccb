<?php

class FlowModel extends CI_Model {

    protected $id;
    protected $datehour;
    protected $visitor;

    function FlowModel() {
        parent::__construct();

        $this->setId(null);
        $this->setDatehour(null);
        $this->setVisitor(null);
    }

    public function save($data = null) {
        if ($data != null) {
            if ($this->db->insert('flow', $data)) {
                return true;
            }
        }
    }

    public function listing() {
        $this->db->select('*');
        return $this->db->get('flow')->result();
    }

    public function flowtoday() {
        $this->db->where("datehour >", date('Y/m/d'));
        $this->db->limit(8);
        $this->db->order_by("datehour", "desc");
        $this->db->join('visitor', 'visitor.id=visitor', 'inner');
        return $this->db->get("flow")->result();
    }

    public function numberentrance() {
        $this->db->where("datehour >", date('Y/m/d'));
        return $this->db->get("flow")->num_rows();
    }

    public function search($id) {
        $this->db->where("id", $id);
        return $this->db->get('flow')->row_array();
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
    public function getVisitor() {
        return $this->visitor;
    }

    public function setVisitor($visitor) {
        $this->visitor = $visitor;
    }
}
