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
                <h3 align="center"> Página Inicial </h3>

                <hr>
                 <h5>
                    <p align="justify">
                        Na página inicial do sistema, temos 3 ícones, que são uma alternativa ao menu suspenso para
                        o redirecionamento para as páginas de gerenciamento de armários, fluxo e visitantes.
                    </p>
                 </h5>
                <br />
                <div class="row">
                    <div class="span4">
                        <div class="thumbnail">
                          <img src="<?= base_url('assets/img/cabinet.png'); ?>" width="200">
                          <div class="caption">
                            <hr />
                            <p>Clicando neste ícone, você é redirecionado para a página de mapa de armários do sistema. Nela
                                    podemos identificar a situação dos armários da Biblioteca.</p>
                          </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="thumbnail">
                          <img src="<?= base_url('assets/img/checkin.png'); ?>" width="200">
                          <div class="caption">
                            <hr />
                            <p>Clicando neste ícone, você é redirecionado para a página de gerenciamento de fluxo de visitantes.</p>
                            <br />
                          </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="thumbnail">
                          <img src="<?= base_url('assets/img/users.png'); ?>" width="200">
                          <div class="caption">
                            <hr />
                            <p>Clicando neste ícone, você é redirecionado para a página de gerenciamento de visitantes.</p>
                            <br />
                            <br />
                          </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="jumbotron">
                    <a class="btn btn-warning" href="<?= base_url('help/skip');?>">Pular tutorial</a>
                    <a class="btn btn-primary pull-right" href="<?= base_url('help/init/2');?>">Próximo &raquo;</a>
                    <a style="margin-right: 10px;" class="btn btn-primary pull-right" href="<?= base_url('help/init');?>">&laquo; Anterior</a>
                </div>
            </div>
        </div>
    </body>
</html>
