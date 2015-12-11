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
                <h3 align="center"> Mapa de Armários </h3>

                <hr>
                 <h5>
                    <p align="justify">
                        Nesta página podemos visualizar um mapa com a situação dos armários da biblioteca.
                    </p>
                 </h5>
                <br />
                <div class="row">
                    <div class="span12">
                        <div class="thumbnail">
                            <img src="<?= base_url('assets/img/map.png'); ?>" width="300">
                            <div class="caption">
                                <hr />
                                <div class="span3" style="width: 280px">
                                    <section id="modal">
                                        <a class="btn btn-success btn-block" href="<?= base_url('help/init/3');?>" role="button" data-toggle="modal">Estou livre</a>
                                        <section id="modalFree" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="free" aria-hidden="true">
                                            <header class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h3>Armário Disponível</h3>
                                                <section class="modal-body">
                                                    <div class="thumbnail">
                                                        <img src="<?= base_url('assets/img/loan.png'); ?>" width="600">
                                                        <div class="caption">
                                                            <hr />
                                                            <p align="justify">
                                                                Ao clicar em um botão de cor verde, é aberta a página de empréstimo.
                                                                Nela temos as informações sobre o empréstimo e visitante, e um espaço
                                                                para pesquisa, que pode ser feita por CPF, RG ou Nome.<br />
                                                                Apos a pesquisa realizada, uma lista de usuários será carregada, onde deve-se clicar no ícone <img title="Selcionar" src="<?= base_url('assets/img/icon/select.png'); ?>" class="img-responsive" height="13" width="13">
                                                                para selecionar o usuário.
                                                                Após selecionado, o empréstimo pode ser confirmado clicando no botão "Confirmar".
                                                            </p>
                                                        </div>
                                                    </div>
                                                </section>
                                                <div class="modal-footer">
                                                  <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Fechar</button>
                                                </div>
                                            </header>
                                        </section>
                                    </section>
                                </div>
                                <div class="span3" style="width: 280px">
                                    <section id="modal">
                                        <a class="btn btn-danger btn-block" href="<?= base_url('help/init/4');?>">Estou ocupado</a>
                                        <section class="modal hide">
                                            <header class="modal-header">
                                                <button class="close">Fechar</button>
                                                <h3>Armário Ocupado</h3>
                                                <section class="modal-body">
                                                    <div class="thumbnail">
                                                        <img src="<?= base_url('assets/img/closeloan.png'); ?>" width="400">
                                                        <div class="caption">
                                                            <hr />
                                                            <p align="justify">
                                                                Ao clicar em um botão de cor vermelha, é aberta a página de devolução.
                                                                Nela temos as informações sobre o empréstimo e visitante.<br />
                                                                Clicando no botão "Confirmar", a devolução é concluída e o armário passa a se tornar disponível para empréstimo.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </section>
                                            </header>
                                        </section>
                                    </section>
                                </div>
                                <div class="span3" style="width: 280px">
                                    <section id="modal">
                                        <a class="btn btn-warning btn-block" href="<?= base_url('help/init/5');?>">Estou desativado</a>
                                        <section class="modal hide">
                                            <header class="modal-header">
                                                <button class="close">Fechar</button>
                                                <h3>Armário Desativado</h3>
                                                <section class="modal-body">
                                                    <div class="thumbnail">
                                                        <img src="<?= base_url('assets/img/react.png'); ?>" width="320">
                                                        <div class="caption">
                                                            <hr />
                                                            <p align="justify">
                                                                Ao clicar em um botão de cor laranja, é aberta a página de reativação.
                                                                Nela temos as informações sobre a desativação do armário, como data, hora e motivo.<br />
                                                                Clicando no botão "Confirmar", a reativação é concluída e o armário passa a se tornar disponível para empréstimo.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </section>
                                            </header>
                                        </section>
                                    </section>
                                </div>
                            <br />
                            <br />
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="jumbotron">
                    <a class="btn btn-warning" href="<?= base_url('help/skip');?>">Pular tutorial</a>
                    <a class="btn btn-primary pull-right" href="<?= base_url('help/init/6');?>">Próximo &raquo;</a>
                    <a style="margin-right: 10px;" class="btn btn-primary pull-right" href="<?= base_url('help/init/1');?>">&laquo; Anterior</a>
                </div>
            </div>
        </div>
    </body>
</html>
