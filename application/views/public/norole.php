<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Sem permissão</title>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css'); ?>" rel="stylesheet" media="screen">
        <link rel="icon" href="<?= base_url(); ?>assets/img/favicon.png" type="image/x-icon" />
    </head>
    <body>

        <div class="masthead">
            <ul class="nav nav-pills pull-right">
                <li class="active"><a href="<?= base_url('welcome'); ?>">Início</a></li>
            </ul>
            <h3 class="muted">Sistema de Controle de Chaves da Biblioteca</h3>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="row-fluid marketing">
                  <div class="span12">
                      <h2>Desculpe!</h2>
                      <h4>
                          <p>
                              <br />
                              Aparentemente você não tem permissão para acessar essa página. 
                              <br />
                              <br />
                              Entre em contato com a Equipe de TI para mais informações.
                          </p>
                      </h4>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>
