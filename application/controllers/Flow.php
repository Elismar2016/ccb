<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Flow extends CI_Controller {

    public function index() {
        $this->load->model('FlowModel');
        $flow = new FlowModel();
        
        $this->session->set_userdata('id', null);
        $this->session->set_userdata('datehour', null);
        $this->session->set_userdata('cabinet', null);
        $this->session->set_userdata('visitor', null);
        $this->session->set_userdata('incourse', FALSE);
        $this->session->set_userdata('visitor_name', null);
        $this->session->set_userdata('visitor_cpf', null);
        $this->session->set_userdata('visitor_rg', null);
        $this->session->set_userdata('visitor_phone', null);
        $this->session->set_userdata('visitor_maker', null);
        $this->session->set_userdata('visitor_status', false);
        
        if ($this->isLogged()) {
            $page = $this->getPage();
            $data = $flow->flowtoday();
            $number = $flow->numberentrance();
            
            $savesuccess = null;
            $this->load->view('template/user/header', $page);
            
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    $today = date('d/m/Y');
                    $msg = array("savesuccess" => $savesuccess, "entrance" => $data, "number" => $number);
                    $this->load->view('user/flow', $msg);
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    
    public function newentrance($cabinet = null) {
        if ($this->isLogged()) {
            $page = $this->getPage();
            $this->load->model('FlowModel');
            $flow = new FlowModel();

            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    $entrance = array(
                        'id' => null,
                        'datehour' => null,
                        'visitor' => null
                    );

                    $this->session->set_userdata($entrance);

                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/newentrance');
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    
    public function searchvisitor() {
        if ($this->isLogged()) {
            $page = $this->getPage();

            $this->load->model('VisitorModel');
            $visitor = new VisitorModel();

            $data['searchcamp'] = mb_strtoupper($this->input->get('searchcamp'));
            
            if (ctype_digit($data['searchcamp'])){
                if (strlen($data['searchcamp']) != 11) {
                    $data['searchmode'] = 1;
                }
                else{
                    $data['searchmode'] = 0;
                    $data['searchcamp'] = substr($data['searchcamp'], 0, 3).'.'.substr($data['searchcamp'], 3, 3).'.'.substr($data['searchcamp'], 6, 3).'-'.substr($data['searchcamp'], 9, 2);
                }
            }
            else{
                $data['searchmode'] = 2;
            }

            switch ($data['searchmode']) {
                case '0':
                    $delivery = $visitor->searchforcpf($data['searchcamp']);
                    break;
                case '1':
                    $delivery = $visitor->searchforrg($data['searchcamp']);
                    break;
                case '2':
                    $delivery = $visitor->searchforname($data['searchcamp']);
                    break;
            }

            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    $msg = array("visitors" => $delivery);
                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/newentrance', $msg);
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }

    public function select($visitor = null) {
        if ($this->isLogged()) {
            $page = $this->getPage();

            $this->load->model('VisitorModel');
            $visitormd = new VisitorModel();

            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    $aux = $visitormd->search($visitor);
                    
                    $this->load->view('template/user/header', $page);
                    
                    $visitorarray = array(
                        'visitor_name' => $aux['name'],
                        'visitor_cpf' => $aux['cpf'],
                        'visitor_rg' => $aux['rg'],
                        'visitor_phone' => $aux['phone'],
                        'visitor_status' => true
                    );

                    $this->session->set_userdata('visitor', $aux['id']);
                    $this->session->set_userdata($visitorarray);

                    $this->load->view('user/newentrance');
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }

    public function save() {
        if ($this->isLogged()) {
            $page = $this->getPage();

            $this->load->model('FlowModel');
            $flow = new FlowModel();
            $this->load->model('VisitorModel');
            $visitor = new VisitorModel();

            $flowdata['id'] = null;
            $flowdata['datehour'] = date("y/m/d H:i");
            $flowdata['visitor'] = $this->input->get('visitor');
            
            if ($flow->save($flowdata)) {
                redirect(base_url('flow'));
            } else {
                return false;
            }
        }
    }

    public function cancel() {
        if ($this->isLogged()) {
            $page = $this->getPage();
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    redirect(base_url('flow'));
                    break;
            }
            $this->load->view('template/public/footer');
        } else {
            redirect(base_url('login'));
        }
    }

////////// Métodos de informações --------------------------------------------

    public function isLogged() {
        if ($this->session->userdata('loggedin') === TRUE) {
            return true;
        } else {
            redirect(base_url('login'));
        }
    }

    public function getPage() {
        $current = array("id" => 7, "page" => "user");
        return array("current" => $current);
    }

//////////////////////////////////////////////////////////////////////////////
}
