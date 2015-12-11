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
                <h3 align="center"> Fluxo </h3>

                <hr>
                 <h5>
                    <p align="justify">
                        Nesta página temos informações para o controle de fluxo dos visitantes.
                    </p>
                 </h5>
                <br />
                <div class="row">
                    <div class="span12">
                        <div class="thumbnail">
                            <img src="<?= base_url('assets/img/flow.png'); ?>" width="300">
                            <div class="caption">
                                <hr />
                                    <p align="justify">
                                    Sempre que um visitante for entrar nas dependências da biblioteca, deve ser pedido para
                                    que o mesmo forneça suas informações pessoais para serem registradas no sistema, mesmo que
                                    ele não pegue uma chave de armário emprestada.
                                    Isso serve para se ter um controle de quantos visitantes frequêntam a biblioteca em determinados
                                    períodos. <br />
                                    Na página podemos ver informações de quantas entradas foram registradas no dia e quais as 
                                    últimas entradas registradas. <br />
                                    Caso um visitante tenho uma chave de armário emprestada, não é necessário registrar a entrada.
                                    <br />
                                    No final temos um botão "Nova entrada", que nos leva para a página de registro de entrada.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="jumbotron">
                    <a class="btn btn-warning" href="<?= base_url('help/skip');?>">Pular tutorial</a>
                    <a class="btn btn-primary pull-right" href="<?= base_url('help/init/8');?>">Próximo &raquo;</a>
                    <a style="margin-right: 10px;" class="btn btn-primary pull-right" href="<?= base_url('help/init/6');?>">&laquo; Anterior</a>
                </div>
            </div>
        </div>
    </body>
</html>
