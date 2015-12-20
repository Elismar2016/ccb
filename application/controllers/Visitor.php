<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor extends CI_Controller {

    public function index($confirm = null) {
        $this->load->model('VisitorModel');
        $visitor = new VisitorModel();
        
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
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    $this->load->view('template/user/header', $page);
                    $savesuccess = null;
                    switch ($confirm) {
                        case 1:
                            $savesuccess = array(
                                "id" => "1",
                                "class" => "alert alert-info",
                                "message" => "Cadastro removido com sucesso!");
                            break;
                    }
                    $msg = array("savesuccess" => $savesuccess);
                    $this->load->view('user/visitor', $msg);
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }

    public function newvisitor() {
        $this->load->model('StateModel');
        $state = new StateModel();
        if ($this->isLogged()) {
            $page = $this->getPage();
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    $data['states'] = $state->listing();
                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/newvisitor', $data);
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }

    public function save() {
        if ($this->isLogged()) {
            $page = $this->getPage();
            
            $this->load->model('VisitorModel');
            $this->load->model('AddressModel');
            $this->load->model('DistrictModel');
            $this->load->model('CityModel');
            $this->load->model('StateModel');
            
            $address = new AddressModel();
            $district = new DistrictModel();
            $city = new CityModel();
            $state = new StateModel();
            $visitor = new VisitorModel();
            
//          VARIÁVEIS VÃO RECEBER TODAS AS INFORMAÇÕES ENVIADAS PELO FORMULÁRIO PARA TRABALHAR DENTRO DO CONTROLADOR
            
            $vname = mb_strtoupper($this->input->get('name'));
            $vcpf = $this->input->get('cpf');
            $vrg = $this->input->get('rg');
            $vphone = $this->input->get('phone');
            $vstreet = mb_strtoupper($this->input->get('street'));
            $vnumber = $this->input->get('number');
            $vcep = $this->input->get('CEP');
            $vdistrict = mb_strtoupper($this->input->get('district'));
            $vcity = mb_strtoupper($this->input->get('city'));
            $vuf = $this->input->get('uf');
            
            
// ***********************************************************************************************************************
// 
 
            if(!$this->validatecpf($vcpf)){
                $savefail = array(
                        "class" => "danger",
                        "message" => "O CPF digitado não é válido.");

                    $msg = array("savefail" => $savefail, "states" => $state->listing());
                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/newvisitor', $msg);
                    $this->load->view('template/public/footer');
                    return false;
            }
            
            if(!$this->existingcpf($vcpf)){
                $savefail = array(
                        "class" => "danger",
                        "message" => "O CPF digitado já existe em nossa base de dados.");

                    $msg = array("savefail" => $savefail, "states" => $state->listing());
                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/newvisitor', $msg);
                    $this->load->view('template/public/footer');
                    return false;
            }
            
            if(!$this->correctamount($vphone, 1)){
                $savefail = array(
                        "class" => "danger",
                        "message" => "Por favor, forneça um telefone válido. Ex.: (99)9999-9999");

                    $msg = array("savefail" => $savefail, "states" => $state->listing());
                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/newvisitor', $msg);
                    $this->load->view('template/public/footer');
                    return false;
            }
            
            if(!$this->correctamount($vcep, 2)){
                $savefail = array(
                        "class" => "danger",
                        "message" => "Por favor, forneça um CEP válido. Ex.: 99.999-999");

                    $msg = array("savefail" => $savefail, "states" => $state->listing());
                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/newvisitor', $msg);
                    $this->load->view('template/public/footer');
                    return false;
            }

//          cityaux vai receber do banco uma cidade cuja qual o estado relacionado tenha uf igual a fornecida no formulario
            
            $cityaux = null;
            $districtaux = null;
            $addressaux = null;
            
            $cityaux = $city->surecity($vcity, $vuf);
            
            if($vuf == 0){
                $savefail = array(
                        "class" => "danger",
                        "message" => "Por favor, escolha uma UF.");

                    $msg = array("savefail" => $savefail, "states" => $state->listing());
                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/newvisitor', $msg);
                    $this->load->view('template/public/footer');
                    return false;
            }
            
            if(!$cityaux){ // se esta cidade não existir, ele deve salvar ela no banco de dados
                $citydata['idcity'] = null;
                $citydata['namecity'] = $vcity;
                $citydata['state'] = $vuf;
                
                if($city->save($citydata)){ // caso salve corretamente, cityaux passa a receber essa nova cidade salva
                    $cityaux = $city->lastinsert();
                }
                else{ // caso não salve a cidade, já fica impossibilitado o restante do código, não cadastranso o visitante
                    return false;
                }
            }
//          districtaux vai receber do banco um bairro cujo qual a cidade relacionada é a mesma definida em cityaux
            $districtaux = $district->suredistrict($vdistrict, $cityaux['idcity']);
            
            if(!$districtaux){ // se este bairro não existir, deve ser criado
                $districtdata['iddistrict'] = null;
                $districtdata['namedistrict'] = $vdistrict;
                $districtdata['city'] = $cityaux['idcity'];
                
                if($district->save($districtdata)){ // caso salvo corretamente, districtaux recebe o novo bairro salvo
                    $districtaux = $district->lastinsert();
                }
                else{ // caso não salve o bairro, já fica impossibilitado o restante do código, não cadastranso o visitante
                    return false;
                }
            }
//          COM CIDADE E BAIRRO DEFINIDAS, AGORA É HORA DE SALVAR O ENDEREÇO
//          PARA CADA NOVO USUÁRIO, UM NOVO ENDEREÇO DEVE SER SALVO
            
            $addressdata['idaddress'] = null;
            $addressdata['street'] = $vstreet;
            $addressdata['number'] = $vnumber;
            $addressdata['cep'] = $vcep;
            $addressdata['district'] = $districtaux['iddistrict'];
            
            
            if($address->save($addressdata)){
                $addressaux = $address->lastinsert();
            }
                  
            $visitordata['id'] = null;
            $visitordata['name'] = $vname;
            $visitordata['cpf'] = $vcpf;
            $visitordata['rg']  =$vrg;
            $visitordata['phone'] = $vphone;
            $visitordata['address'] = $addressaux['idaddress'];
            $visitordata['maker'] = $this->session->userdata('userid');
            $visitordata['status'] = 1;
            
            if($visitor->save($visitordata)){
                $savesuccess = array(
                    "id" => "1",
                    "class" => "success",
                    "message" => "Visitante cadastrado com sucesso!");
                
                $delivery = $visitor->searchforcpf($vcpf);
                        
                $msg = array("visitors" => $delivery, "savesuccess" => $savesuccess);
                $this->load->view('template/user/header', $page);
                $this->load->view('user/visitor', $msg);
                $this->load->view('template/public/footer');
            }
            else{
                return false;
            }
            
        }
    }
    
    
    public function edit($id=null) {
        $this->load->model('VisitorModel');
        $this->load->model('AddressModel');
        $this->load->model('DistrictModel');
        $this->load->model('CityModel');
        $this->load->model('StateModel');

        $address = new AddressModel();
        $district = new DistrictModel();
        $city = new CityModel();
        $state = new StateModel();
        $visitor = new VisitorModel();
        
        $objvisitor = $visitor->search($id);
        $objaddress = $address->search($objvisitor['address']);
        $objdistrict = $district->search($objaddress['district']);
        $objcity = $city->search($objdistrict['city']);
        $objstate = $state->search($objcity['state']);
        
        $data['visitor'] = $objvisitor;
        $data['currentaddress'] = $objaddress;
        $data['currentdistrict'] = $objdistrict;
        $data['currentcity'] = $objcity;
        $data['currentstate'] = $objstate;
        $data['states'] = $state->listing();
        
        if ($this->isLogged()){
            $page = $this->getPage();
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    $this->load->view('template/user/header', $page);
                    $this->load->view('user/editvisitor', $data);
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }

   
    public function update() {
        if ($this->isLogged()) {
            $page = $this->getPage();
            
            $this->load->model('VisitorModel');
            $this->load->model('AddressModel');
            $this->load->model('DistrictModel');
            $this->load->model('CityModel');
            $this->load->model('StateModel');
            
            $address = new AddressModel();
            $district = new DistrictModel();
            $city = new CityModel();
            $state = new StateModel();
            $visitor = new VisitorModel();
            
//          VARIÁVEIS VÃO RECEBER TODAS AS INFORMAÇÕES ENVIADAS PELO FORMULÁRIO PARA TRABALHAR DENTRO DO CONTROLADOR
            
            $vid = $this->input->get('id');
            $vstatus = $this->input->get('status');
            $vmaker = $this->input->get('maker');
            $vname = mb_strtoupper($this->input->get('name'));
            $vcpf = $this->input->get('cpf');
            $vrg = $this->input->get('rg');
            $vphone = $this->input->get('phone');
            $vstreet = mb_strtoupper($this->input->get('street'));
            $vnumber = $this->input->get('number');
            $vcep = $this->input->get('cep');
            $vdistrict = mb_strtoupper($this->input->get('district'));
            $vcity = mb_strtoupper($this->input->get('city'));
            $vuf = $this->input->get('uf');
            
// ***********************************************************************************************************************
// 
//          cityaux vai receber do banco uma cidade cuja qual o estado relacionado tenha uf igual a fornecida no formulario
            
            
            $cityaux = null;
            $districtaux = null;
            $addressaux = null;
            
            $cityaux = $city->surecity($vcity, $vuf);
            
            if(!$cityaux){ // se esta cidade não existir, ele deve salvar ela no banco de dados
                $citydata['idcity'] = null;
                $citydata['namecity'] = $vcity;
                $citydata['state'] = $vuf;
                
                if($city->save($citydata)){ // caso salve corretamente, cityaux passa a receber essa nova cidade salva
                    $cityaux = $city->lastinsert();
                }
                else{ // caso não salve a cidade, já fica impossibilitado o restante do código, não cadastranso o visitante
                    return false;
                }
            }
//          districtaux vai receber do banco um bairro cujo qual a cidade relacionada é a mesma definida em cityaux
            $districtaux = $district->suredistrict($vdistrict, $cityaux['idcity']);
            
            if(!$districtaux){ // se este bairro não existir, deve ser criado
                $districtdata['iddistrict'] = NULL;
                $districtdata['namedistrict'] = $vdistrict;
                $districtdata['city'] = $cityaux['idcity'];
                
                if($district->save($districtdata)){ // caso salvo corretamente, districtaux recebe o novo bairro salvo
                    $districtaux = $district->lastinsert();
                }
                else{ // caso não salve o bairro, já fica impossibilitado o restante do código, não cadastranso o visitante
                    return false;
                }
            }
//          COM CIDADE E BAIRRO DEFINIDAS, AGORA É HORA DE SALVAR O ENDEREÇO
//          PARA CADA NOVO USUÁRIO, UM NOVO ENDEREÇO DEVE SER SALVO
            
            $visitoraux = $visitor->search($vid);
            $addressaux = $address->search($visitoraux['address']);
            
            $addressdata['idaddress'] = $addressaux['idaddress'];
            $addressdata['street'] = $vstreet;
            $addressdata['number'] = $vnumber;
            $addressdata['cep'] = $vcep;
            $addressdata['district'] = $districtaux['iddistrict'];
            
            $address->update($addressdata);
                  
            $visitordata['id'] = $vid;
            $visitordata['name'] = $vname;
            $visitordata['cpf'] = $vcpf;
            $visitordata['rg']  =$vrg;
            $visitordata['phone'] = $vphone;
            $visitordata['address'] = $addressaux['idaddress'];
            $visitordata['maker'] = $vmaker;
            $visitordata['status'] = $vstatus;
            
            if($visitor->update($visitordata)){
                $savesuccess = array(
                    "id" => "1",
                    "class" => "success",
                    "message" => "Cadastro atualizado com sucesso!");
                
                $delivery = $visitor->searchforcpf($vcpf);
                        
                $msg = array("visitors" => $delivery, "savesuccess" => $savesuccess);
                $this->load->view('template/user/header', $page);
                $this->load->view('user/visitor', $msg);
                $this->load->view('template/public/footer');
            }
            else{
                return false;
            }
            
        }
    }
    
    
    public function delete($id=null) {
        $this->load->model('VisitorModel');
        $visitor = new VisitorModel();
        if ($this->isLogged()) {
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    if ($visitor->delete($id)) {
                        redirect(base_url('visitor/index/1'));
                    }
                    break;
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
                    redirect(base_url('visitor'));
                    break;
            }
            $this->load->view('template/public/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    
    
    
    public function searchvisitor(){
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
                    $this->load->view('user/visitor', $msg);
                    break;
            }
            $this->load->view('template/public/footer');
        }
    }
    
    public function changestat($id = null) {
        $this->load->model('VisitorModel');
        $visitor = new VisitorModel();
        if ($this->isLogged()) {
            $page = $this->getPage();
            switch ($this->session->userdata('role')) {
                case '1':
                    $this->load->view('public/norole');
                    break;
                case '2':
                    $aux = $visitor->search($id);
                    if($aux['status'] == '1'){
                        $savesuccess = array(
                            "id" => "1",
                            "class" => "success",
                            "message" => "Visitante desativado com sucesso!");
                    }
                    else{
                        $savesuccess = array(
                            "id" => "1",
                            "class" => "success",
                            "message" => "Visitante ativado com sucesso!");
                    }
                    
                    if ($visitor->changestat($id)) {
                        $delivery = $visitor->search($id);
                        $vcpf = $delivery['cpf'];
                        $delivery = $visitor->searchforcpf($vcpf);
                        
                        $msg = array("visitors" => $delivery, "savesuccess" => $savesuccess);
                        $this->load->view('template/user/header', $page);
                        $this->load->view('user/visitor', $msg);
                        $this->load->view('template/public/footer');
                    }
                    break;
            }
        }
    }
    
    function validatecpf($cpf = null) {
        
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // Verifica se um número foi informado
        if (empty($cpf)) {
            return false;
        }

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }
    
    function existingcpf($cpf = null) {
        $this->load->model('VisitorModel');
        $visitor = new VisitorModel();
        
        if($visitor->searchforcpf($cpf)){
            return false;
        }
        
        return true;
        
    }
    
    function correctamount($value = null, $type = null) {
        switch ($type) {
            case 1:
                if (strlen($value) != 13) {
                    return false;
                }
                else{
                   return true; 
                }
                break;
            case 2:
                if (strlen($value) != 10) {
                    return false;
                }
                else{
                   return true; 
                }
                break;
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
        $current = array("id" => 5, "page" => "user");
        return array("current" => $current);
    }

//////////////////////////////////////////////////////////////////////////////
}
