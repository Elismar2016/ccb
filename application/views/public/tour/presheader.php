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
        
        <ul class="nav nav-tabs">
            <li><a href="#" onclick="return confirm('Este botão te leva para a página inicial.');">Início</a></li>
            <li><a href="#" onclick="return confirm('Este botão te leva para o mapa de armários.');">Armários</a></li>
            <li><a href="#" onclick="return confirm('Este botão te leva para a página de gerenciamento de fluxo.');">Fluxo</a></li>
            <li><a href="#" onclick="return confirm('Este botão te leva para a página de gerenciamento de visitantes.');">Visitantes</a></li>
            <li class="pull-right"><a href="#" onclick="return confirm('Este é o botão de logoff do sistema.');">Sair</a></li>
            <li class="pull-right"><a href="#" onclick="return confirm('Este botão te leva para a página de informações do sistema.');">Sobre</a></li>
        </ul>
        <div class="container">
            <div class="row">

                <div class="row-fluid show-grid">
                    <div class="span12">
                        <h3 align="center"> Menu suspenso </h3>

                        <hr>
                         <h5>
                            <p align="justify">
                                O menu suspenso no topo da página será visível em todas as páginas de funcionalidade do sistema. Nele temos
                                várias abas que possibilitam a navegação pelas páginas do sistema.
                            </p>
                         </h5>
                        <br />

                        <div class="row-fluid marketing">
                            <div class="row">
                                <div class="span6">
                                    <h4>Início</h4>
                                    <p>Ao clicar nesta aba, você é redirecionado para a página inicial do sistema.<br /></p>
                                </div>
                                <div class="span6">
                                    <h4>Visitantes</h4>
                                    <p>Ao clicar nesta aba, você é redirecionado para a página de gerenciamento de visitantes.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span6">
                                    <h4>Armários</h4>
                                    <p>Ao clicar nesta aba, você é redirecionado para a página de mapa de armários do sistema. Nela
                                    podemos identificar a situação dos armários da Biblioteca.</p>
                                </div>
                                <div class="span6">
                                    <h4>Sobre</h4>
                                    <p>Ao clicar nesta aba, você é redirecionado para a página de informações sobre o sistema.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span6">
                                    <h4>Fluxo</h4>
                                    <p>Ao clicar nesta aba, você é redirecionado para a página de gerenciamento de fluxo de visitantes.<br /></p>
                                </div>
                                <div class="span6">
                                    <h4>Sair</h4>
                                    <p>Ao clicar nesta aba, é feito logout do sistema e você é redirecionado para a página de login.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="jumbotron">
                    <a class="btn btn-warning" href="<?= base_url('help/skip');?>">Pular tutorial</a>
                    <a class="btn btn-primary pull-right" href="<?= base_url('help/init/1');?>">Próximo &raquo;</a>
                </div>
            </div>
        </div>
    </body>
</html>
