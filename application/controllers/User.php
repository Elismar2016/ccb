<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function index($confirm=null) {
        $this->load->model('UserModel');
        $user = new UserModel();
        if ($this->isLogged()){
            $page = $this->getPage();
            switch ($this->session->userdata('role')) {
                case '1':
                    $data = $user->listing();
                    $this->load->view('template/super/header', $page);
                    switch ($confirm){
                        case 1:
                            $savesuccess = array(
                                "id" => "1",
                                "class" => "success",
                                "message" => "Usuário cadastrado com sucesso!");
                            break;
                        case 2:
                            $savesuccess = array(
                                "id" => "2",
                                "class" => "success",
                                "message" => "Cadastro atualizado com sucesso!");
                            break;
                        case 3:
                            $savesuccess = array(
                                "id" => "3",
                                "class" => "danger",
                                "message" => "Desculpe. Você não pode excluir o próprio cadastro");
                            break;
                        case 4:
                            $savesuccess = array(
                                "id" => "4",
                                "class" => "danger",
                                "message" => "Usuário removido com sucesso!");
                            break;
                    }
                    
                    $msg = array("savesuccess" => $savesuccess, "users" => $data);
                    $this->load->view('super/user', $msg);
                    break;
                case '2':
                    $this->load->view('public/norole');
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    public function newuser() {
        if ($this->isLogged()){
            $page = $this->getPage();
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('template/super/header', $page);
                    $this->load->view('super/newuser');
                    break;
                case '2':
                    $this->load->view('public/norole');
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    public function save(){
        if ($this->isLogged()){
            $page = $this->getPage();
            
            $this->load->model('UserModel');
            $user = new UserModel();
            $data['id'] = null;
            $data['name'] = mb_strtoupper($this->input->get('name'));
            $data['username'] = $this->input->get('username');
            $data['phone'] = $this->input->get('phone');
            $data['password'] = md5($this->input->get('password'));
            $data['role'] = $this->input->get('role');
            $data['status'] = 1;

            if($this->input->get('password') === $this->input->get('confirmpass')){
                if (!$user->verifyusn($this->input->get('username'))) {
                    if ($user->save($data)) {
                        redirect(base_url('user/index/1'));
                    }
                }
                else{
                    $savefail = array(
                        "class" => "danger",
                        "message" => "Nome de usuário já existente no banco");

                    $msg = array("savefail" => $savefail);

                    $this->load->view('template/super/header', $page);
                    $this->load->view('super/newuser', $msg);
                    $this->load->view('template/public/footer');
                }
            }
            else{
                    $savefail = array(
                        "class" => "danger",
                        "message" => "As senhas inseridas não são iguais");

                    $msg = array("savefail" => $savefail);

                    $this->load->view('template/super/header', $page);
                    $this->load->view('super/newuser', $msg);
                    $this->load->view('template/public/footer');
            }
        }   
    }
    public function changestat($id = null) {
        $this->load->model('UserModel');
        $user = new UserModel();
        if ($this->isLogged()) {
            switch ($this->session->userdata('role')) {
                case '1':
                    if ($user->changestat($id)) {
                        redirect(base_url('user'));
                    }
                    break;
                case '2':
                    $this->load->view('public/norole');
                    break;
            }
        }
    }
    public function edit($id=null) {
        $this->load->model('UserModel');
        $user = new UserModel();
        $data['user'] = $user->search($id);
        if ($this->isLogged()){
            $page = $this->getPage();
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('template/super/header', $page);
                    $this->load->view('super/edituser', $data);
                    break;
                case '2':
                    $this->load->view('public/norole');
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    public function update(){
        if ($this->isLogged()){
            $page = $this->getPage();
            
            $this->load->model('UserModel');
            $user = new UserModel();

            $data['id'] = $this->input->get('id');
            $data['name'] = mb_strtoupper($this->input->get('name'));
            $data['username'] = $this->input->get('username');
            $data['phone'] = $this->input->get('phone');
            $pass = $this->input->get('changepass');
            $confirmpass = $this->input->get('confirmpass');
            if(empty($pass)){
                $pass = $this->input->get('password');
                $confirmpass = $pass;
                $data['password'] = $pass;
            }
            else{
                $data['password'] = md5($this->input->get('changepass'));
            }
            $data['role'] = $this->input->get('role');
            $data['status'] = $this->input->get('status');

            if($pass === $confirmpass){
                if (!$user->verifyusn($this->input->get('username'))) {
                    if ($user->update($data)) {
                        redirect(base_url('user/index/2'));
                    }
                }
                else{
                    $aux = $user->search($data['id']);
                    if($aux['username'] === $data['username']){
                        if ($user->update($data)) {
                            redirect(base_url('user/index/2'));
                        }
                    }
                    else{
                        $savefail = array(
                            "class" => "danger",
                            "message" => "Nome de usuário já existente no banco");

                        $data = $user->search($data['id']);
                        $msg = array("savefail" => $savefail, "user" => $data);

                        $this->load->view('template/super/header', $page);
                        $this->load->view('super/edituser', $msg);
                        $this->load->view('template/public/footer');
                    }
                }
            }
            else{
                $savefail = array(
                    "class" => "danger",
                    "message" => "As senhas inseridas não são iguais");

                $data = $user->search($data['id']);
                $msg = array("savefail" => $savefail, "user" => $data);

                $this->load->view('template/super/header', $page);
                $this->load->view('super/edituser', $msg);
                $this->load->view('template/public/footer');
            }
        }       
    }

    public function delete($id=null) {
        $this->load->model('UserModel');
        $user = new UserModel();
        if ($this->isLogged()) {
            switch ($this->session->userdata('role')) {
                case '1':
                    if($this->session->userdata('userid') == $id){
                        redirect(base_url('user/index/3'));
                    }
                    else{
                        if ($user->delete($id)) {
                            redirect(base_url('user/index/4'));
                        }
                    }
                    break;
                case '2':
                    $this->load->view('public/norole');
                    break;
            }
        }
    }
    public function cancel() {
        if ($this->isLogged()){
            $page = $this->getPage();
            switch ($this->session->userdata('role')) {
                case '1':
                    redirect(base_url('user'));
                    break;
                case '2':
                    $this->load->view('public/norole');
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    
////////// Métodos de informações --------------------------------------------
    
    public function isLogged(){
        if ($this->session->userdata('loggedin') === TRUE){
            return true;
        }else {
            redirect(base_url('login'));
        }
    }
    public function getPage() {
        $current = array("id" => 2, "page" => "user");
        return array("current" => $current);
    }
    
//////////////////////////////////////////////////////////////////////////////
}