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

        <div class="masthead">
            <ul class="nav nav-pills pull-right">
                <li class="active"><a href="<?= base_url('welcome'); ?>">Início</a></li>
            </ul>
            <h3 class="muted">Sistema de Controle de Chaves da Biblioteca</h3>
        </div>
        <hr>
        <div class="container">
            <h4>CCB</h4>
            <p align="justify">
                O Sistema de Controle de Chaves da Biblioteca foi desenvolvido com o objetivo principal 
                simplificar o controle do empréstimo de chaves para os visitantes da Biblioteca Pública.<br />
                Para isso, conta com área de Gerenciamento dos Visitantes, onde é possível visualizar a lista
                de visitantes cadastrados no sistema, sendo possível atualizar ou editar um cadastro, bem como
                cadastrar um novo visitante. <br />
                Existe ainda a área de Gerenciamento de Chaves, onde temos um mapa dos armários da biblioteca.
                Nele é possível visualizar quais armários estão disponiveis e quais estão ocupados, para a partir
                de então dar baixa ou realizar um novo empréstimo.
            </p>
            <div class="span4" style="width: 290px;">
                <div class="nav-pills">
                    <h4 align="center">Detalhes</h4>
                    <div class="caption">
                        <p align="center">
                            Desenvolvido em PHP e HTML <br />
                            Versão atual: 1.2.0 <br />
                            Última atualização em 18/12/2015
                        </p>
                    </div>
                </div>
            </div>
            <div class="span4" style="width: 290px">
                <div class="nav-pills">
                    <h4 align="center">Desenvolvimento</h4>
                    <div class="caption">
                        <p align="center">
                            Dayane Rocha<br />
                            Edson Rodrigo<br />
                            Igor Freitas<br />
                            Vinícius Anjos
                        </p>
                    </div>
                </div>
            </div>
            <div class="span4" style="width: 290px">
                <div class="nav-pills">
                    <h4 align="center">Imagens e Ícones</h4>
                    <div class="caption">
                        <p align="center">
                            www.glyphicons.com<br />
                            www.pt.depositphotos.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->session->userdata('loggedin') === TRUE){ ?>
            <?php if ($this->session->userdata('role') === '2'){ ?>
                <div class="jumbotron" align="center">
                    <a class="btn btn-primary btn-large" href="<?= base_url('help/review');?>">Ver tutorial</a>
                </div>
            <?php } ?>
        <?php } ?>
    </body>
</html>
