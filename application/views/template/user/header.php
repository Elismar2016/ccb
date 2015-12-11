<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css');?>" rel="stylesheet" media="screen">
        <link rel="icon" href="<?= base_url(); ?>assets/img/favicon.png" type="image/x-icon" />
    </head>
    <body>
        <ul class="nav nav-tabs">
            <li class="<?php if($current != null){if($current["id"] == 1){echo 'active';}} ?>"><a href="<?= base_url();?>" <?php if($this->session->userdata('incourse') === TRUE){ ?> onclick="return confirm('Um empréstimo ou desativação está em curso. Sair desta página vai levar à perda dos dados.');" <?php } ?>>Início</a></li>
            <li class="<?php if($current != null){if($current["id"] == 4){echo 'active';}} ?>"><a href="<?= base_url('cabinet');?>" <?php if($this->session->userdata('incourse') === TRUE){ ?> onclick="return confirm('Um empréstimo ou desativação está em curso. Sair desta página vai levar à perda dos dados.');" <?php } ?>>Armários</a></li>
            <li class="<?php if($current != null){if($current["id"] == 7){echo 'active';}} ?>"><a href="<?= base_url('flow');?>" <?php if($this->session->userdata('incourse') === TRUE){ ?> onclick="return confirm('Um empréstimo ou desativação está em curso. Sair desta página vai levar à perda dos dados.');" <?php } ?>>Fluxo</a></li>
            <li class="<?php if($current != null){if($current["id"] == 5){echo 'active';}} ?>"><a href="<?= base_url('visitor');?>" <?php if($this->session->userdata('incourse') === TRUE){ ?> onclick="return confirm('Um empréstimo ou desativação está em curso. Sair desta página vai levar à perda dos dados.');" <?php } ?>>Visitantes</a></li>
            <li class="pull-right"><a href="<?= base_url('login/logout');?>" <?php if($this->session->userdata('incourse') === TRUE){ ?> onclick="return confirm('Um empréstimo ou desativação está em curso. Sair desta página vai levar à perda dos dados.');" <?php } ?>>Sair</a></li>
            <li class="pull-right"><a href="<?= base_url('about');?>" <?php if($this->session->userdata('incourse') === TRUE){ ?> onclick="return confirm('Um empréstimo ou desativação está em curso. Sair desta página vai levar à perda dos dados.');" <?php } ?>>Sobre</a></li>
        </ul>
    </body>
</html>
