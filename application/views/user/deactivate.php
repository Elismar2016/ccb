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
        <link href="<?= base_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" media="screen">
    </head>
    <body>
        
        <?php
            if ($this->session->userdata('incourse') === TRUE) {
                $cabinet = $this->session->userdata('cabinet');
            }
            else{
                $cabinet = "Falhou";
            }
        ?>

        <h1> Desativar Armário </h1>

        <?php if ($savefail != null) { ?>
            <div class="alert alert-<?php echo $savefail["class"]; ?> "> <?php echo $savefail["message"]; ?> </div>
        <?php } ?>
      
        <div class="bs-docs-grid">
            <div class="row-fluid show-grid">
                <div class="span6">
                    <form class="form-horizontal" method="get" action="<?= base_url('cabinet/confirmdeact'); ?>">
                        <input type="hidden" id="cabinet" name="cabinet" value="<?= $cabinet; ?>">
                        <h4>Informações</h4>
                        <div class="row">
                            <div class="control-group span3">
                                <label class="control-label" for="showcabinet">Armário</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span1" id="showcabinet" name="showcabinet" required="true" maxlength="2"><?= $cabinet; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group span4">
                                <label class="control-label" for="showdate">Data</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span2" id="showdate" name="showdate" required="true" maxlength="11"><?= date("d/m/y"); ?></span>
                                </div>
                            </div>
                            <div class="control-group span4">
                                <label class="control-label" for="showhour">Hora</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span2" id="showhour" name="showhour" required="true" maxlength="11"><?= date("H:i"); ?></span>
                                </div>
                            </div>
                        </div>
                        <h4>Motivo da desativação</h4>
                        <div class="row">
                            <div class="control-group span11">
                                <label class="control-label" for="showname"></label>
                                <div class="controls">
                                    <textarea id="reason" name="reason" style="width: 334px; height: 84px; resize: none;"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-success" >Confirmar</button>
                                    <a class="btn btn-danger" href="<?= base_url(); ?>cabinet/cancel">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>