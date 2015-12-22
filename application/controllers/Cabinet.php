<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cabinet extends CI_Controller {
// Metodo index que chama a página do controlador
    public function index() {
        // Função para saber se existe um login ativo no computador que fez a requisição
        if ($this->isLogged()) {
            // Pega a página atual, para mostrar no menu suspenso
            $page = $this->getPage();
            
            // Carregando e inicializando os modelos a serem usados
            $this->load->model('LendingModel');
            $this->load->model('DisabledModel');
            $lending = new LendingModel();
            $disabled = new DisabledModel();
            // carregando dados para saber quais armários estão em uso e quais estão desativados
            $data['inuse'] = $lending->activelist();
            $data['deact'] = $disabled->listing();

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


            // verifica se o timpo de usuário permite que acesse a página
            switch ($this->session->userdata('role')) {
                // Caso seja administrador, a permissão é negada e ele é redirecionado para a página de erro de permissão
                case '1':
                    $this->load->view('public/norole');
                    break;
                // Caso seja usuário do atendimento, a página é carregada
                case '2':
                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/map', $data);
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    // Funcção para decidir qual ação tomar ao clicar em um armário
    public function decidetask($cabinet = null) {
        // Verificando se está logado
        if ($this->isLogged()) {
            // Pega a página atual
            $page = $this->getPage();
            // Carrega e inicializa os modelos
            $this->load->model('DisabledModel');
            $disabled = new DisabledModel();
            $this->load->model('LendingModel');
            $lending = new LendingModel();
            // Verifica a permissão
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    // Se inativo, mostra página com informações da desativação
                    if($disabled->isdisabled($cabinet)){
                        $this->disabled($cabinet);
                    }
                    else{
                        // Se em uso, abre a página de devolução
                        if ($lending->inuse($cabinet)) {
                            $this->closeloan($cabinet);
                        } else {
                            // Se livre, abre a página de empréstimo
                            $this->newloan($cabinet);
                        }
                    }
                    break;
            }
        }
    }

    public function newloan($cabinet = null) {
        if ($this->isLogged()) {
            $page = $this->getPage();
            $this->load->model('LendingModel');
            $lending = new LendingModel();

            if ($lending->inuse($cabinet)) {
                $this->decidetask($cabinet);
            }

            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    $lending = array(
                        'id' => null,
                        'datehour' => null,
                        'cabinet' => $cabinet,
                        'visitor' => null,
                        'incourse' => TRUE
                    );

                    $this->session->set_userdata($lending);

                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/newloan');
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    public function presentation($cabinet = null) {
        if ($this->isLogged()) {
            $this->load->view('public/tour/presentation');
        }
    }

    public function closeloan($cabinet = null) {
        if ($this->isLogged()) {
            $page = $this->getPage();
            $this->load->model('LendingModel');
            $this->load->model('VisitorModel');
            $lending = new LendingModel();
            $visitor = new VisitorModel();

            if (!$lending->inuse($cabinet)) {
                $this->decidetask($cabinet);
            }

            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    $data['lending'] = $lending->inuse($cabinet);
                    $data['visitor'] = $visitor->search($data['lending']['visitor']);

                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/closeloan', $data);
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    
    public function disabled($cabinet = null) {
        if ($this->isLogged()) {
            $page = $this->getPage();
            
            $this->load->model('DisabledModel');
            $deact = new DisabledModel();

            if (!$deact->isdisabled($cabinet)) {
                $this->decidetask($cabinet);
            }
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    $data['disabled'] = $deact->isdisabled($cabinet);
                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/disabled', $data);
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    
    public function confirmdeact() {
        if ($this->isLogged()) {
            $page = $this->getPage();

            $this->load->model('DisabledModel');
            $deact = new DisabledModel();

            $deactdata['iddisabled'] = null;
            $deactdata['cabinet'] = $this->input->get('cabinet');
            $deactdata['reason'] = $this->input->get('reason');
            $deactdata['date'] = date("y/m/d H:i");
            $deactdata['status'] = true;
            
            if($deact->save($deactdata)){                
                redirect(base_url('utilities'));
            } else {
                return false;
            }
        }
    }
    
    public function confirmreact() {
        if ($this->isLogged()) {
            $page = $this->getPage();

            $this->load->model('DisabledModel');
            $deact = new DisabledModel();

            $deactdata['iddisabled'] = $this->input->get('iddisabled');
            $deactdata['cabinet'] = $this->input->get('cabinet');
            $deactdata['reason'] = $this->input->get('reason');
            $deactdata['date'] = $this->input->get('date');
            $deactdata['status'] = false;
                        
            if($deact->update($deactdata)){                
                redirect(base_url('utilities'));
            } else {
                return false;
            }
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
                    $this->load->view('user/newloan', $msg);
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
                    
                    if($aux['status'] == true){

                        $visitorarray = array(
                            'visitor_name' => $aux['name'],
                            'visitor_cpf' => $aux['cpf'],
                            'visitor_rg' => $aux['rg'],
                            'visitor_phone' => $aux['phone'],
                            'visitor_status' => true
                        );

                        $this->session->set_userdata('visitor', $aux['id']);
                        $this->session->set_userdata($visitorarray);

                        $this->load->view('user/newloan');
                    }
                    else{
                        $savefail = array(
                            "class" => "danger",
                            "message" => "Este visitante está desativado no sistema e não pode ser selecionado.");

                        $data['savefail'] =  $savefail;
                        $this->load->view('user/newloan', $data);
                    }
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }

    public function save() {
        if ($this->isLogged()) {
            $page = $this->getPage();

            $this->load->model('LendingModel');
            $lending = new LendingModel();
            $this->load->model('VisitorModel');
            $visitor = new VisitorModel();
            $this->load->model('FlowModel');
            $flow = new FlowModel();

            $lendingdata['id'] = null;
            $lendingdata['datehour'] = date("y/m/d H:i");
            $lendingdata['cabinet'] = $this->input->get('cabinet');
            $lendingdata['visitor'] = $this->input->get('visitor');
            $lendingdata['status'] = true;
            
            $flowdata['id'] = null;
            $flowdata['datehour'] = date("y/m/d H:i");
            $flowdata['visitor'] = $lendingdata['visitor'];

            if($lendingdata['visitor']){
                $inactive = $visitor->search($lendingdata['visitor']);

                if($inactive['status'] == false){

                    $savefail = array(
                        "class" => "danger",
                        "message" => "O visitante selecionado está desativado no sistema.");

                    $data['savefail'] =  $savefail;


                    $this->session->set_userdata('id', null);
                    $this->session->set_userdata('datehour', null);
                    $this->session->set_userdata('visitor', null);
                    $this->session->set_userdata('visitor_name', null);
                    $this->session->set_userdata('visitor_cpf', null);
                    $this->session->set_userdata('visitor_rg', null);
                    $this->session->set_userdata('visitor_phone', null);
                    $this->session->set_userdata('visitor_status', false);

                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/newloan', $data);
                    $this->load->view('template/public/footer');
                    return false;
                }
            }
            else{
                $savefail = array(
                    "class" => "danger",
                    "message" => "Nenhum visitante foi selecionado.");

                $data['savefail'] =  $savefail;


                $this->session->set_userdata('id', null);
                $this->session->set_userdata('datehour', null);
                $this->session->set_userdata('visitor', null);
                $this->session->set_userdata('visitor_name', null);
                $this->session->set_userdata('visitor_cpf', null);
                $this->session->set_userdata('visitor_rg', null);
                $this->session->set_userdata('visitor_phone', null);
                $this->session->set_userdata('visitor_status', false);

                $this->load->view('template/user/header', $page);
                $this->load->view('user/newloan', $data);
                $this->load->view('template/public/footer');
                return false;
            }
            
            $aux = $lending->activelist();
            $blocked = false;
            $nkey = null;

            foreach ($aux as $verify){
                if ($verify->visitor == $lendingdata['visitor']) {
                    $nkey = $verify->cabinet;
                    $blocked = true;
                }
            }

            if (!$blocked) {
                if ($lending->save($lendingdata)) {
                    if ($flow->save($flowdata)) {
                        redirect(base_url('cabinet'));
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                $savefail = array(
                    "class" => "danger",
                    "message" => "O visitante selecionado já possui um empréstimo. Armário:".$nkey);

                $data['savefail'] =  $savefail;


                $this->session->set_userdata('id', null);
                $this->session->set_userdata('datehour', null);
                $this->session->set_userdata('visitor', null);
                $this->session->set_userdata('visitor_name', null);
                $this->session->set_userdata('visitor_cpf', null);
                $this->session->set_userdata('visitor_rg', null);
                $this->session->set_userdata('visitor_phone', null);
                $this->session->set_userdata('visitor_status', false);

                $this->load->view('template/user/header', $page);
                $this->load->view('user/newloan', $data);
                $this->load->view('template/public/footer');
                return false;
            }
        }
    }

    public function cancel() {
        if ($this->isLogged()) {
            $page = $this->getPage();
            switch ($this->session->userdata('role')) {
                case '1':          
                    redirect(base_url('utilities'));
                    break;
                case '2':
                    redirect(base_url('cabinet'));
                    break;
            }
            $this->load->view('template/public/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function close() {
        if ($this->isLogged()) {
            $page = $this->getPage();

            $this->load->model('LendingModel');
            $lending = new LendingModel();

            $lendingdata['id'] = $this->input->get('id');
            $lendingdata['datehour'] = $this->input->get('datehour');
            $lendingdata['cabinet'] = $this->input->get('cabinet');
            $lendingdata['visitor'] = $this->input->get('visitor');
            $lendingdata['status'] = false;

            if ($lending->update($lendingdata)) {
                redirect(base_url('cabinet'));
            } else {
                return false;
            }
        }
    }

    public function situation($cabinet) {
        return true;
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
        $current = array("id" => 4, "page" => "user");
        return array("current" => $current);
    }

//////////////////////////////////////////////////////////////////////////////
}
