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
        
        <?php
            if ($this->session->userdata('loggedin') === TRUE) {
                $name = $this->session->userdata('name');
            }
        ?>
        <div class="container">
            <div class="row">
                <h3 align="center"> Desativação </h3>

                <hr>
                 <h5>
                    <p align="justify">
                        Nesta página temos informações para a desativação de um armário.
                    </p>
                 </h5>
                <br />
                <div class="row">
                    <div class="span12">
                        <div class="thumbnail">
                            <img src="<?= base_url('assets/img/deact.png'); ?>" width="300">
                            <div class="caption">
                                <hr />
                                Um armário só é desativado por um motivo. Para isso, deve-se escrever na caixa de texto
                                o motivo da desativação.<br />
                                Para concluir a desativação, deve-se clicar no botão "Confirmar".
                            <br />
                            <br />
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="jumbotron">
                    <a class="btn btn-warning" href="<?= base_url('help/skip');?>">Pular tutorial</a>
                    <a class="btn btn-primary pull-right" href="<?= base_url('help/init/7');?>">Próximo &raquo;</a>
                    <a style="margin-right: 10px;" class="btn btn-primary pull-right" href="<?= base_url('help/init/2');?>">&laquo; Anterior</a>
                </div>
            </div>
        </div>
    </body>
</html>
