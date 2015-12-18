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
                        <h3> Obrigado. </h3>
                        <h5>
                            <p align="justify">
                                Agora que você já acompanhou o tutorial, pode utilizar o Sistema de Controle de Chaves 
                                da Biblioteca da maneira correta.<br /><br />
                                
                                Se desejar rever este tutorial, clique no botão "Reiniciar tutorial" imediatamente, ou a 
                                qualquer momento no botão "Ver tutorial", presente na página SOBRE.<br /><br />
                                Em caso de dúvidas entre em contato com a Equipe de TI da Biblioteca.
                            </p>
                        </h5>
                    </div>
                </div>
                <hr />
                <div class="jumbotron">
                    <a class="btn btn-warning" href="<?= base_url('help/init');?>">Reiniciar tutorial</a>
                    <a class="btn btn-primary pull-right" href="<?= base_url('help/skip');?>">Finalizar tutorial</a>
                    <a style="margin-right: 10px;" class="btn btn-primary pull-right" href="<?= base_url('help/init/10');?>">&laquo; Anterior</a>
                </div>
            </div>
        </div>
    </body>
</html>
