<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Início</title>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" media="screen">
    </head>
    <body>
        <?php
            if ($this->session->userdata('loggedin') === TRUE) {
                $name = $this->session->userdata('name');
            }
            else{
                $name = "Falhou";
            }
        ?>
        <h1>Bem vindo, <?php echo $name; ?> </h1>

        <div class="bs-docs-grid">
            <div class="row-fluid show-grid">
                <div class="span4" style="text-align: center">
                    <a href="<?= base_url('user'); ?>">
                        <img src="<?= base_url(); ?>assets/img/users.png" class="img-responsive" height="280" width="280">
                    </a>
                    <h1 style="text-align: center">Gerenciamento dos Usuários</h1>
                    <p></p>
                    <p></p>
                </div>
                <div class="span4" style="text-align: center">
                    <a href="<?= base_url('utilities'); ?>">
                        <img src="<?= base_url(); ?>assets/img/report.png" class="img-responsive" height="280" width="280">
                    </a>
                    <h1 style="text-align: center">Utilidades</h1>
                    <p></p>
                    <p></p>
                </div>
                <div class="span4" style="text-align: center">
                    <a href="<?= base_url('settings'); ?>">
                        <img src="<?= base_url(); ?>assets/img/settings.png" class="img-responsive" height="280" width="280">
                    </a>
                    <h1 style="text-align: center">Configurações</h1>
                    <p></p>
                    <p></p>
                </div>
            </div>
        </div>

    </body>
</html>