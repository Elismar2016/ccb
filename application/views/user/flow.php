<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
ini_set(“display_errors”, 0 );

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Fluxo</title>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" media="screen">
    </head>
    <body>

        <h5>
            <?php if($number == 1){ ?>
                <?= $number; ?> entrada registrada hoje (<?= date("d/m/Y"); ?>)
            <?php } ?>
            <?php if($number > 1){ ?>
                <?= $number; ?> entradas registradas hoje (<?= date("d/m/Y"); ?>)
            <?php } ?>
        </h5>
        <h1> Últimas entradas do dia</h1>
        <table class="table table-condensed">
            <?php if($entrance){ ?>
                <thead>
                    <tr>
                        <th class="span4">Visitante</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>Telefone</th>
                        <th>Hora da entrada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entrance as $entree){ ?>
                        <tr>
                            <td><?php echo $entree->name; ?></td>
                            <td><?php echo $entree->cpf; ?></td>
                            <td><?php echo $entree->rg; ?></td>
                            <td><?php echo $entree->phone; ?></td>
                            <td><?php echo date('H:i', strtotime($entree->datehour)); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            <?php }
                  else{
                      echo '<h4>Nenhuma entrada foi registrada hoje.</h4>';
                  }?>
        </table>
        <a class="btn btn-primary" href="<?= base_url('flow/newentrance'); ?>">Nova entrada</a>
        
        <?php if ($savesuccess != null) {?>
            <script>alert('Entrada registrada com sucesso!');</script>
        <?php } ?>
        
    </body>
</html>