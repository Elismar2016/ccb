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
                <h3 align="center"> Nova entrada </h3>

                <hr>
                 <h5>
                    <p align="justify">
                        Nesta página temos informações para o registro de uma nova entrada de visitante.
                    </p>
                 </h5>
                <br />
                <div class="row">
                    <div class="span12">
                        <div class="thumbnail">
                            <img src="<?= base_url('assets/img/entrance.png'); ?>" width="300">
                            <div class="caption">
                                <hr />
                                    <p align="justify">
                                    Esta página é bem parecida com a de empréstimo de armário. <br />
                                    Temos informações da hora da entrada do visitante e um espaço para pesquisa, que
                                    pode ser feita por CPF, RG ou Nome. <br />
                                    Apos a pesquisa realizada, uma lista de usuários será carregada, onde deve-se clicar no ícone 
                                    <img title="Selcionar" src="<?= base_url('assets/img/icon/select.png'); ?>" class="img-responsive" 
                                         height="13" width="13"> para selecionar o usuário.<br />
                                    Após selecionado, o registro de entrada pode ser confirmado clicando no botão "Confirmar".<br />
                                    Caso um usuário já tenha um emprástimo em curso, não é necessário registrar a entrada, pois ela é
                                    feita automaticamento ao emprestar uma chave.
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
                    <a class="btn btn-primary pull-right" href="<?= base_url('help/init/9');?>">Próximo &raquo;</a>
                    <a style="margin-right: 10px;" class="btn btn-primary pull-right" href="<?= base_url('help/init/7');?>">&laquo; Anterior</a>
                </div>
            </div>
        </div>
    </body>
</html>
