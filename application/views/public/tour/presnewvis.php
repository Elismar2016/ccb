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
                <h3 align="center"> Novo Visitante </h3>

                <hr>
                 <h5>
                    <p align="justify">
                        Nesta página temos um formulário para cadastro de visitantes no sistema.
                    </p>
                 </h5>
                <br />
                <div class="row">
                    <div class="span12">
                        <div class="thumbnail">
                            <img src="<?= base_url('assets/img/newvis.png'); ?>" width="500">
                            <div class="caption">
                                <hr />
                                    <p align="justify">
                                    Esta página é idêntica à de edição de cadastro, com a ressalva de que nesta todos os 
                                    campos podem ser editados, enquanto na de edição, a informação de CPF não pode ser
                                    alterada. <br />
                                    Todos os campos contem validação, então devem ser cuidadosamente preenchidos com
                                    as informações corretamente. <br />
                                    Após todos os campos preenchidos corretamente, o cadastro pode ser concluído clicando
                                    no botão "Confirmar".
                                </p>
                            <br />
                            <br />
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="jumbotron">
                    <a class="btn btn-warning" href="<?= base_url('help/skip');?>">Pular tutorial</a>
                    <a class="btn btn-success pull-right" href="<?= base_url('help/skip');?>">Finalizar</a>
                    <a style="margin-right: 10px;" class="btn btn-primary pull-right" href="<?= base_url('help/init/8');?>">&laquo; Anterior</a>
                </div>
            </div>
        </div>
    </body>
</html>
