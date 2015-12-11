<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
ini_set(“display_errors”, 0 );

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Armários</title>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="5" />
        <link href="<?= base_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" media="screen">
    </head>
    <body>

        <h1>Mapa de Armários</h1>

        <?php if ($savefail != null) { ?>
            <div class="alert alert-<?php echo $savefail["class"]; ?> "> <?php echo $savefail["message"]; ?> </div>
        <?php } ?>
        
        <div class="container" style="margin: 10px 300px 10px 300px; text-align: center;">
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
                                    <a title="Armário desativado" class="btn btn-warning btn-large btn-block" style="border-radius: 0px;" href="<?= base_url('cabinet/decidetask/'.$cont); ?>"><?php echo $cont; ?></a>
                                <?php }else{ ?>
                                <?php if($using == true){ ?>
                                    <a title="Armário ocupado" class="btn btn-danger btn-large btn-block" style="border-radius: 0px;" href="<?= base_url('cabinet/decidetask/'.$cont); ?>"><?php echo $cont; ?></a>
                                <?php }else{ ?>
                                    <a title="Armário disponível" class="btn btn-success btn-large btn-block" style="border-radius: 0px;" href="<?= base_url('cabinet/decidetask/'.$cont); ?>"><?php echo $cont; ?></a>
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
                                    <a title="Armário desativado" class="btn btn-large btn-warning btn-large btn-block" style="border-radius: 0px;" href="<?= base_url('cabinet/decidetask/'.$cont); ?>"><?php echo $cont; ?></a>
                                <?php }else{ ?>
                                    <a title="Armário disponível" class="btn btn-success btn-large btn-block" style="border-radius: 0px;" href="<?= base_url('cabinet/decidetask/'.$cont); ?>"><?php echo $cont; ?></a>
                                <?php }?>
                              </div>
                            <?php $cont++; ?>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
            
        </div>
    </body>
</html>