<?php
defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(0);
ini_set(“display_errors”, 0 );

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
            <li class="<?php if($current != null){if($current["id"] == 1){echo 'active';}} ?>"><a href="<?= base_url();?>">Início</a></li>
            <li class="<?php if($current != null){if($current["id"] == 2){echo 'active';}} ?>"><a href="<?= base_url('user');?>">Usuários</a></li>
            <li class="<?php if($current != null){if($current["id"] == 3){echo 'active';}} ?>"><a href="<?= base_url('utilities');?>">Utilidades</a></li>
            <li class="<?php if($current != null){if($current["id"] == 6){echo 'active';}} ?>"><a href="<?= base_url('settings');?>">Configurações</a></li>
            
            <li class="pull-right"><a href="<?= base_url('login/logout');?>">Sair</a></li>
            <li class="pull-right"><a href="<?= base_url('about');?>">Sobre</a></li>
        </ul>
    </body>
</html>
