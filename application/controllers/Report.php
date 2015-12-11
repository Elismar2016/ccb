<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

    public function index() {
        if ($this->isLogged()) {
            $page = $this->getPage();
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('template/super/header', $page);
                    $this->load->view('super/report');
                    break;
                case '2':
                    $this->load->view('public/norole');
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
///////////////////////////////////////////////////////////////////////////////
    
    public function isLogged(){
        if ($this->session->userdata('loggedin') === TRUE){
            return true;
        }else {
            redirect(base_url('login'));
        }
    }
    public function getPage() {
        $current = array("id" => 3, "page" => "report");
        return array("current" => $current);
    }
    
///////////////////////////////////////////////////////////////////////////////
}
