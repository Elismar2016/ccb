<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Sobre</title>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css'); ?>" rel="stylesheet" media="screen">
        <link rel="icon" href="<?= base_url(); ?>assets/img/favicon.png" type="image/x-icon" />
    </head>
    <body>
        <?php
            if ($this->session->userdata('loggedin') === TRUE) {
                $name = $this->session->userdata('name');
            }
        ?>

        <div class="masthead">
            <h3 class="muted">Sistema de Controle de Chaves da Biblioteca</h3>
        </div>
        <hr>
        <div class="container">
            <div class="row">

                <div class="row-fluid show-grid">
                    <div class="span12">
                        <h3>Olá, <?php echo $name; ?> </h3>
                        <h5>
                            <p align="justify">
                                O Sistema de Controle de Chaves da Biblioteca sofreu uma atualização recentemente e, 
                                aparentemente, este é seu primeiro acesso.<br /><br />
                                Este tutorial vai apresentar as principais funcionalidades do sistema, além das
                                novas atualizações. <br /><br />
                                Se desejar parar o tutorial, clique no botão "Pular tutorial" a qualquer momento, que você será
                                redirecionado para a página inicial do sistema.<br /><br />
                                Se desejar rever este tutorial, clique no botão "Ver tutorial", na página SOBRE.<br /><br />
                                Entre em contato com a Equipe de TI para mais informações ou em caso de dúvidas.
                            </p>
                        </h5>
                    </div>
                </div>
                <hr />
                <div class="jumbotron">
                    <a class="btn btn-warning" href="<?= base_url('help/skip');?>">Pular tutorial</a>
                    <a class="btn btn-primary pull-right" href="<?= base_url('help/init');?>">Iniciar tutorial</a>
                </div>
            </div>
        </div>
    </body>
</html>
