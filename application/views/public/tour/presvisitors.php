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
                <h3 align="center"> Visitantes </h3>

                <hr>
                 <h5>
                    <p align="justify">
                        Nesta página temos uma lista dos visitantes cadastrados no sistema.
                    </p>
                 </h5>
                <br />
                <div class="row">
                    <div class="span12">
                        <div class="thumbnail">
                            <img src="<?= base_url('assets/img/visitors.png'); ?>" width="500">
                            <div class="caption">
                                <hr />
                                    <p align="justify">
                                    Ao abrir a página, a lista de visitantes não aparece, pois deve ser feita uma pesquisa antes.
                                    A pesquisa pode ser feita por CPF, RG ou Nome. <br />
                                    Apos a pesquisa realizada, é carregada uma lista com o(s) visitante(s) encontrado(s) na busca.<br />
                                    <img title="Ativo" src="<?= base_url('assets/img/icon/active.png'); ?>" height="17" width="17">
                                    - Significa que o visitante está ativo no sistema, ou seja, pode pegar chaves emprestadas. <br />
                                    <img title="Inativo" src="<?= base_url('assets/img/icon/inactive.png'); ?>" height="17" width="17">
                                    - Significa que o visitante está inativo no sistema, ou seja, não pode pegar chaves emprestados. Isso 
                                    ocorre quando um visitante, responsável por algum dano a um armário ou chave, ainda não arcou com
                                    o reparo.<br />
                                    <img title="Ativar/Desativar" src="<?= base_url('assets/img/icon/disable.png'); ?>" height="17" width="17">
                                    - Clicando neste ícone é possível ativar ou desativar um visitante<br />
                                    <img title="Editar" src="<?= base_url('assets/img/icon/edit.png'); ?>" height="17" width="17">
                                    - Clicando neste ícone, é aberta a página para edição do cadastro do visitante.<br />
                                    <img title="Remover" src="<?= base_url('assets/img/icon/remove.png'); ?>" height="17" width="17">
                                    - Clicando neste ícone, acontece a remoção do cadastro do visitante.<br />
                                    No fim temos um botão "Novo visitante", que nos leva para o formulário de cadastro de visitante.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="jumbotron">
                    <a class="btn btn-warning" href="<?= base_url('help/skip');?>">Pular tutorial</a>
                    <a class="btn btn-primary pull-right" href="<?= base_url('help/init/10');?>">Próximo &raquo;</a>
                    <a style="margin-right: 10px;" class="btn btn-primary pull-right" href="<?= base_url('help/init/8');?>">&laquo; Anterior</a>
                </div>
            </div>
        </div>
    </body>
</html>
