<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function index() {
        if ($this->isLogged()){
            if ($this->noneedhelp($this->session->userdata('userid'))){
                $page = $this->getPage();
                switch ($this->session->userdata('role')){
                    case '1':
                        $this->load->view('template/super/header', $page);
                        $this->load->view('super/home');
                        break;
                    case '2':
                        $this->session->set_userdata('id', null);
                        $this->session->set_userdata('datehour', null);
                        $this->session->set_userdata('cabinet', null);
                        $this->session->set_userdata('visitor', null);
                        $this->session->set_userdata('incourse', FALSE);
                        $this->session->set_userdata('visitor_name', null);
                        $this->session->set_userdata('visitor_cpf', null);
                        $this->session->set_userdata('visitor_rg', null);
                        $this->session->set_userdata('visitor_phone', null);
                        $this->session->set_userdata('visitor_status', false);

                        $this->load->view('template/user/header', $page);
                        $this->load->view('user/home');
                        break;
                }
                $this->load->view('template/public/footer');
            }
        }
    }
  
////////// Métodos de informações --------------------------------------------
    
    
    
    public function noneedhelp($id = null) {
        $this->load->model('UserModel');
        $user = new UserModel();
        
        $data = $user->search($id);
        
        if($data['help'] === '0'){
            return true;
        }
        else{
            redirect(base_url('help'));
        }
    }
    public function isLogged(){
        if ($this->session->userdata('loggedin') === TRUE){
            return true;
        }
        else {
            redirect(base_url('login'));
        }
    }
    public function getPage() {
        $current = array("id" => 1, "page" => "user");
        return array("current" => $current);
    }
    
//////////////////////////////////////////////////////////////////////////////
}