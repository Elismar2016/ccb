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
        <link href="<?= base_url('assets/css/bootstrap-tour.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-tour.standalone.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-tour.standalone.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-tour.docs.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-tour.css'); ?>" rel="stylesheet" media="screen">
        <script src="<?= base_url('assets/js/bootstrap-tour-standalone.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/bootstrap-tour-standalone.min.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/bootstrap-tour.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/bootstrap-tour.min.js'); ?>" type="text/javascript"></script>        
    </head>
    <body>
        <?php
            if ($this->session->userdata('loggedin') === TRUE) {
                $name = $this->session->userdata('name');
            }
        ?>
        <h1>Bem vindo, <?php echo $name; ?> </h1>
        <div class="bs-docs-grid">
            <div class="row-fluid show-grid">
                <div class="span4" style="text-align: center">
                    <a href="<?= base_url('cabinet'); ?>">
                        <img src="<?= base_url('assets/img/cabinet.png'); ?>" class="img-responsive" height="280" width="280">
                    </a>
                    <h1 style="text-align: center">Gerenciamento dos Armários</h1>
                    <p></p>
                    <p></p>
                </div>
                <div class="span4" style="text-align: center">
                    <a href="<?= base_url('flow'); ?>">
                        <img src="<?= base_url('assets/img/checkin.png'); ?>" class="img-responsive" height="280" width="280">
                    </a>
                    <h1 style="text-align: center">Gerenciamento de Fluxo</h1>
                    <p></p>
                    <p></p>
                </div>
                <div class="span4" style="text-align: center">
                    <a href="<?= base_url('visitor'); ?>">
                        <img src="<?= base_url('assets/img/users.png'); ?>" class="img-responsive" height="280" width="280">
                    </a>
                    <h1 style="text-align: center">Gerenciamento dos Visitantes</h1>
                    <p></p>
                    <p></p>
                </div>
            </div>
        </div>
    </body>
</html>