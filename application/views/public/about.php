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
            <div class="row">

                <div class="row-fluid show-grid">
                    <div class="span12">
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

                        <h4>Detalhes</h4>
                        <p>
                            Desenvolvido em PHP e HTML <br />
                            Versão atual: 1.1 <br />
                            Última modificação em 03/12/2015
                        </p>
                        
                        <h4>Equipe de Desenvolvimento</h4>
                        <p align="justify">
                            Dayane Rocha<br />
                            Edson Rodrigo<br />
                            Igor Freitas<br />
                            Vinícius Anjos
                        </p>
                        
                        <h4>Imagens e Ícones</h4>
                        <p align="justify">
                            www.glyphicons.com<br />
                            www.pt.depositphotos.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
