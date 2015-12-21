<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Utilidades</title>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" media="screen">
        <!-- Le styles -->
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
        <link rel="shortcut icon" href="../assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            <li class="nav-header"><h4>Relatórios</h4></li>
                            <li class="nav-header">Empréstimos de armários</li>
                            <li><a href="#">Deste dia</a></li>
                            <li><a href="#">Desta semana</a></li>
                            <li><a href="#">Deste mês</a></li>
                            <li class="nav-header">Fluxo de Visitantes</li>
                            <li><a href="#">Deste dia</a></li>
                            <li><a href="#">Desta semana</a></li>
                            <li><a href="#">Deste mês</a></li>
                            <hr />
                            <p><a class="btn btn-warning btn-large btn-block">Personalizado</a></p>
                        </ul>
                    </div>
                </div>
                <div class="span9">
                    <h1 align="center">Mapa de Armários</h1>
                    <?php if ($savefail != null) { ?>
                        <div class="alert alert-<?php echo $savefail["class"]; ?> "> <?php echo $savefail["message"]; ?> </div>
                    <?php } ?>
                    <div style="margin: 0px 0px 0px 230px; text-align: center;">
                        <?php if($inuse){ ?>
                            <?php $cont = 1; ?>
                            <?php for($i=0; $i<=8; $i++){ ?>
                                <div class="row" style="margin-bottom: 5px;">
                                    <?php for($j=1; $j<=10; $j++){ ?>
                                        <div class="span1" style="margin-left: 5px;">
                                            <?php $using = false; ?>
                                            <?php $disable = false; ?>
                                            <?php foreach ($deact as $deactcab){ ?>
                                                <?php if($deactcab->cabinet == $cont){ $disable = true;} ?>
                                            <?php } ?>
                                            <?php foreach ($inuse as $usecab){ ?>
                                                <?php if($usecab->cabinet == $cont){ $using = true;} ?>
                                            <?php } ?>
                                            <?php if($disable == true){ ?>
                                                <a title="Reativar armário" class="btn btn-warning btn-block" style="border-radius: 0px;" href="<?= base_url('utilities/decidetask/'.$cont); ?>"><?php echo $cont; ?></a>
                                            <?php }else{ ?>
                                            <?php if($using == true){ ?>
                                                <a title="Visalizar relatório do empréstimo" class="btn btn-danger btn-block" style="border-radius: 0px;" href="<?= base_url('utilities/decidetask/'.$cont); ?>"><?php echo $cont; ?></a>
                                            <?php }else{ ?>
                                                <a title="Desativar armário" class="btn btn-success btn-block" style="border-radius: 0px;" href="<?= base_url('utilities/decidetask/'.$cont); ?>"><?php echo $cont; ?></a>
                                            <?php }?>
                                            <?php }?>
                                          </div>
                                        <?php $cont++; ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        <?php }else{ ?>
                            <?php $cont = 1; ?>
                            <?php for($i=0; $i<=8; $i++){ ?>
                                <div class="row" style="margin-bottom: 5px;">
                                    <?php for($j=1; $j<=10; $j++){ ?>
                                        <div class="span1" style="margin-left: 5px;">
                                            <?php $disable = false; ?>
                                            <?php foreach ($deact as $deactcab){ ?>
                                                <?php if($deactcab->cabinet == $cont){ $disable = true;} ?>
                                            <?php } ?>
                                            <?php if($disable == true){ ?>
                                                <a title="Reativar armário" class="btn btn-warning btn-large btn-block" style="border-radius: 0px;" href="<?= base_url('utilities/decidetask/'.$cont); ?>"><?php echo $cont; ?></a>
                                            <?php }else{ ?>
                                                <a title="Desativar armário" class="btn btn-success btn-block" style="border-radius: 0px;" href="<?= base_url('utilities/decidetask/'.$cont); ?>"><?php echo $cont; ?></a>
                                            <?php }?>
                                          </div>
                                        <?php $cont++; ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>