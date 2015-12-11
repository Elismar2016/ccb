<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utilities extends CI_Controller {

    public function index() {
        if ($this->isLogged()) {
            $page = $this->getPage();
            $this->load->model('LendingModel');
            $this->load->model('DisabledModel');
            $lending = new LendingModel();
            $disabled = new DisabledModel();
            $data['inuse'] = $lending->activelist();
            $data['deact'] = $disabled->listing();
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('template/super/header', $page);
                    $this->load->view('super/util', $data);
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
        $current = array("id" => 3, "page" => "util");
        return array("current" => $current);
    }
    
///////////////////////////////////////////////////////////////////////////////
}
