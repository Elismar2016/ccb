<?php

class ReportModel extends CI_Model {

    function ReportModel() {
        parent::__construct();
    }

    public function inuse($cabinet) {
        $this->db->where("lending.status", true);
        $this->db->where("lending.cabinet", $cabinet);
        $this->db->join('visitor', 'visitor.id=visitor', 'inner');
        $this->db->join('address', 'address.idaddress=visitor.address', 'inner');
        $this->db->join('district', 'district.iddistrict=address.district', 'inner');
        $this->db->join('city', 'city.idcity=district.city', 'inner');
        $this->db->join('state', 'state.idstate=city.state', 'inner');
        return $this->db->get("lending")->row_array();
    }

}
