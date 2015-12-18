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
                                        <a class="btn btn-success btn-block" href="<?= base_url('help/init/3');?>">Estou livre</a>
                                        <section id="modalFree" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="free" aria-hidden="true">
                                            <header class="modal-header">
                                                <a type="button" class="close" href="<?= base_url('help/init/2');?>">&times;</a>
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
                                                                <h5>Veja que a forma de pesquisa mudou. Agora, basta digitar a informação de CPF, RG ou Nome, sem a necessidade de pontos ou traços, e pesquisar.</h5>
                                                                Apos a pesquisa realizada, uma lista de visitantes será carregada, onde deve-se clicar no ícone <img title="Selcionar" src="<?= base_url('assets/img/icon/select.png'); ?>" class="img-responsive" height="13" width="13">
                                                                para selecionar o visitante.
                                                                Após selecionado, o empréstimo pode ser confirmado clicando no botão "Confirmar".
                                                            </p>
                                                        </div>
                                                    </div>
                                                </section>
                                                <div class="modal-footer">
                                                  <a class="btn btn-danger" href="<?= base_url('help/init/2');?>">Fechar</a>
                                                </div>
                                            </header>
                                        </section>
                                    </section>
                                </div>
                                <div class="span3" style="width: 280px">
                                    <section id="modal">
                                        <a class="btn btn-danger btn-block" href="<?= base_url('help/init/4');?>">Estou ocupado</a>
                                        <section id="modalBlocked" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="free" aria-hidden="true">
                                            <header class="modal-header">
                                                <a type="button" class="close" href="<?= base_url('help/init/2');?>">&times;</a>
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
                                                <div class="modal-footer">
                                                  <a class="btn btn-danger" href="<?= base_url('help/init/2');?>">Fechar</a>
                                                </div>
                                            </header>
                                        </section>
                                    </section>
                                </div>
                                <div class="span3" style="width: 280px">
                                    <section id="modal">
                                        <a class="btn btn-warning btn-block" href="<?= base_url('help/init/5');?>">Estou desativado</a>
                                        <section id="modalDisabled" class="modal" tabindex="-1" role="dialog" aria-labelledby="free" aria-hidden="true">
                                            <header class="modal-header">
                                                <a type="button" class="close" href="<?= base_url('help/init/2');?>">&times;</a>
                                                <h3>Armário Desativado</h3>
                                                <section class="modal-body">
                                                    <div class="thumbnail">
                                                        <img src="<?= base_url('assets/img/react.png'); ?>" width="320">
                                                        <div class="caption">
                                                            <hr />
                                                            <p align="justify">
                                                                Ao clicar em um botão de cor laranja, é aberta a página com informação sobre um armário desativado.
                                                                Nela temos as informações sobre a desativação do armário, como data, hora e motivo. Não é possível editar
                                                                nenhum destes campos, presentes apenas para informação.<br />
                                                                <h5>Perceba que a funcionalidade de desativar armários não está mais presente. Ela é, agora, exclusiva para os administradores do sistema.</h5>
                                                                Clicando no botão "Voltar", você é redirecionado para a página de mapa de armários.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </section>
                                                <div class="modal-footer">
                                                  <a class="btn btn-danger" href="<?= base_url('help/init/2');?>">Fechar</a>
                                                </div>
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
                    <a class="btn btn-primary pull-right" href="<?= base_url('help/init/3');?>">Próximo &raquo;</a>
                    <a style="margin-right: 10px;" class="btn btn-primary pull-right" href="<?= base_url('help/init/1');?>">&laquo; Anterior</a>
                </div>
            </div>
        </div>
    </body>
</html>
