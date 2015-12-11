<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        if ($this->session->userdata('loggedin') === TRUE) {
            redirect(base_url('welcome'));
        } else {
            $this->load->view('template/public/header');
            $this->load->view('public/login');
            $this->load->view('template/public/footer');
        }
    }

    public function signin() {

        $loginfail = null;

        if ($this->input->get('signin') === 'signin') {

            $this->load->model("LoginModel");
            $username = $this->input->get("username");
            $password = md5($this->input->get("password"));
            $user = $this->LoginModel->search($username, $password);
            if ($user) {
                if($user['status']=='1'){
                    $session = array(
                        'userid' => $user["id"],
                        'username' => $user["username"],
                        'name' => $user["name"],
                        'role' => $user["role"],
                        'loggedin' => TRUE
                    );

                    $this->session->set_userdata($session);

                    redirect(base_url('login'));
                }
                else{
                    $loginfail = array(
                        "class" => "danger",
                        "message" => "Sinto muito!<br />Você não pode acessar o sistema neste momento.");

                    $msg = array("loginfail" => $loginfail);

                    $this->load->view('template/public/header');
                    $this->load->view('public/login', $msg);
                    $this->load->view('template/public/footer');
                    
                }
                
            } else {
                $loginfail = array(
                    "class" => "danger",
                    "message" => "Usuário ou senha incorretos");

                $msg = array("loginfail" => $loginfail);

                $this->load->view('template/public/header');
                $this->load->view('public/login', $msg);
                $this->load->view('template/public/footer');
            }
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}