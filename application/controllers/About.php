<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
// Controlador com apenas um método, para chamar a página SOBRE
	public function index()
	{
            // Seta todos os parâmetros de um empréstimo para null
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
            
            // Carrega as páginas
            $this->load->view('public/about');
            $this->load->view('template/public/footer');
	}
}
