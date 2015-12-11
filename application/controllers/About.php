<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	public function index()
	{
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
            
            $this->load->view('public/about');
            $this->load->view('template/public/footer');
	}
}
