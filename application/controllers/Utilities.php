<?php

include_once('Report.php');

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

    public function decidetask($cabinet = null) {
        if ($this->isLogged()) {
            $page = $this->getPage();
            $this->load->model('DisabledModel');
            $disabled = new DisabledModel();
            $this->load->model('LendingModel');
            $lending = new LendingModel();
            switch ($this->session->userdata('role')) {
                case '1':
                    if($disabled->isdisabled($cabinet)){
                        $this->reactivate($cabinet);
                    }
                    else{
                        if ($lending->inuse($cabinet)) {
                            $this->specific($cabinet);
                        } else {
                            $this->deactivate($cabinet);
                        }
                    }
                    break;
                case '2':
                    $this->load->view('public/norole');
                    break;
            }
        }
    }
    
    public function specific($lending) {
        $page = $this->getPage();
        $this->load->view('template/super/header', $page);
        echo 'Página não implementada';
    }
    
    public function deactivate($cabinet = null) {
        if ($this->isLogged()) {
            $page = $this->getPage();
            $this->load->model('DisabledModel');
            $deact = new DisabledModel();

            if ($deact->inuse($cabinet)) {
                $this->decidetask($cabinet);
            }

            switch ($this->session->userdata('role')) {
                case '1':
                    $deactivate = array(
                        'iddisabled' => null,
                        'cabinet' => $cabinet,
                        'reason' => null,
                        'date' => null,
                        'incourse' => TRUE
                    );

                    $this->session->set_userdata($deactivate);
                    $this->load->view('template/super/header', $page);
                    $this->load->view('super/deactivate');
                    break;
                case '2':
                    $this->load->view('public/norole');
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    
    public function reactivate($cabinet = null) {
        if ($this->isLogged()) {
            $page = $this->getPage();
            
            $this->load->model('DisabledModel');
            $deact = new DisabledModel();

            if (!$deact->isdisabled($cabinet)) {
                $this->decidetask($cabinet);
            }

            switch ($this->session->userdata('role')) {
                case '1':
                    $data['disabled'] = $deact->isdisabled($cabinet);
                    $this->load->view('template/super/header', $page);
                    $this->load->view('super/reactivate', $data);
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
