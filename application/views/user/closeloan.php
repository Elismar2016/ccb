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
                $visitorselect = $this->session->userdata('visitor');
            }
            else{
                $cabinet = "Falhou";
            }
        ?>

        <h1>Devolução</h1>
      
        <div class="bs-docs-grid">
            <div class="row-fluid show-grid">
                <div class="span6">
                    <form class="form-horizontal" method="get" action="<?= base_url('cabinet/close'); ?>">
                        <input type="hidden" id="id" name="id" value="<?= $lending['id']; ?>">
                        <input type="hidden" id="datehour" name="datehour" value="<?= $lending['datehour']; ?>">
                        <input type="hidden" id="cabinet" name="cabinet" value="<?= $lending['cabinet']; ?>">
                        <input type="hidden" id="visitor" name="visitor" value="<?= $lending['visitor']; ?>">
                        <input type="hidden" id="status" name="status" value="<?= $lending['status']; ?>">
                        <h4>Informações do Empréstimo</h4>
                        <div class="row">
                            <div class="control-group span3">
                                <label class="control-label" for="showcabinet">Armário</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span1" id="showcabinet" name="showcabinet" required="true" maxlength="2"><?= $lending['cabinet']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group span4">
                                <label class="control-label" for="showdate">Data</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span2" id="showdate" name="showdate" required="true" maxlength="11"><?= date('d/m/Y', strtotime($lending['datehour'])); ?></span>
                                </div>
                            </div>
                            <div class="control-group span4">
                                <label class="control-label" for="showhour">Hora</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span2" id="showhour" name="showhour" required="true" maxlength="11"><?= date('H:i', strtotime($lending['datehour'])); ?></span>
                                </div>
                            </div>
                        </div>
                        <h4>Informações do Visitante</h4>
                        <div class="row">
                            <div class="control-group span11">
                                <label class="control-label" for="showname">Nome</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span5" id="showname" name="showname" required="true" maxlength="2"> <?= $visitor['name']; ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group span4">
                                <label class="control-label" for="showcpf">CPF</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span2" id="showcpf" name="showcpf" required="true" maxlength="11"> <?= $visitor['cpf']; ?> </span>
                                </div>
                            </div>
                            <div class="control-group span4">
                                <label class="control-label" for="showrg">RG</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span2" id="showrg" name="showrg" required="true" maxlength="11"> <?= $visitor['rg']; ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group span11">
                                <label class="control-label" for="showphone">Telefone</label>
                                <div class="controls">
                                    <span class="input-xlarge uneditable-input span3" id="showphone" name="showphone" required="true" maxlength="2"> <?= $visitor['phone']; ?> </span>
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