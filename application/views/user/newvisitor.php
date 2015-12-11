<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
ini_set(“display_errors”, 0 );

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Cadastro de Visitantes</title>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" media="screen">
        <script src="<?= base_url('assets/js/masks.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/tooltip.js'); ?>" type="text/javascript"></script>
    </head>
    <body>


        <h1>Cadastro de Visitante</h1>

        <?php if ($savefail != null) { ?>
            <div class="alert alert-<?php echo $savefail["class"]; ?> "> <?php echo $savefail["message"]; ?> </div>
        <?php } ?>
            
        <div>
            <form class="form-horizontal" method="get" action="<?= base_url('visitor/save'); ?>">
                <h4>Informações Pessoais</h4>
                <div class="row">
                    <div class="control-group span11">
                        <label class="control-label" for="name">Nome</label>
                        <div class="controls">
                            <input type="text" class="span11" id="name" name="name" onkeypress="charMask();" required="true" style="text-transform: uppercase;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="control-group span4">
                        <label class="control-label" for="cpf">CPF</label>
                        <div class="controls">
                            <input type="text" title="Ex.: 999.999.999-99" class="span3 " id="cpf" onkeyup="CPFMask(this);" onkeypress="integerMask();" name="cpf" required="true" maxlength="14" placeholder="Ex.: XXX.XXX.XXX-XX" >
                        </div>
                    </div>
                    <div class="control-group span4">
                        <label class="control-label" for="rg">RG</label>
                        <div class="controls">
                            <input type="text" class="span3" id="rg" name="rg" onkeypress="integerMask();" required="true" maxlength="14">
                        </div>
                    </div>
                    <div class="control-group span3">
                        <label class="control-label" for="phone">Telefone</label>
                        <div class="controls">
                            <input type="text" title="Ex.: (99)9999-9999" id="phone" name="phone" required="true" onkeyup="PhoneMask(this);" onkeypress="integerMask();" placeholder="Ex.: (DD)XXXX-XXXX" maxlength="13">
                        </div>
                    </div>
                </div>
                <h4>Endereço</h4>
                <div class="row">
                    <div class="control-group span6 ">
                        <label class="control-label pull-left" for="street">Rua</label>
                        <div class="controls">
                            <input type="text" class="span5" id="street" name="street" required="true" style="text-transform: uppercase;">
                        </div>
                    </div>
                    <div class="control-group span3">
                        <label class="control-label" for="number">Nº</label>
                        <div class="controls">
                            <input type="text" class="span1" id="number" name="number" required="true" >
                        </div>
                    </div>
                    <div class="control-group span3">
                        <label class="control-label" for="cep">CEP</label>
                        <div class="controls">
                            <input type="text" title="Ex.: 99.999-999" class="span2" id="cep" name="cep" onkeyup="CEPMask(this);" onkeypress="integerMask();" required="true" maxlength="10" placeholder="Ex.: XX.XXX-XXX">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="control-group span6">
                        <label class="control-label" for="district">Bairro</label>
                        <div class="controls">
                            <input type="text" class="span5" id="district" name="district" required="true" style="text-transform: uppercase;">
                        </div>
                    </div>
                    <div class="control-group span4">
                        <label class="control-label" for="city">Cidade</label>
                        <div class="controls">
                            <input type="text" class="span3" id="city" name="city" required="true" style="text-transform: uppercase;">
                        </div>
                    </div>
                    <div class="control-group span2">
                        <label class="control-label" for="uf">UF</label>
                        <div class="controls">
                            <select class="span1" id="uf" name="uf" required="true">
                                <option value="0">    </option>
                                <?php foreach ($states as $state){ ?>
                                    <option value="<?= $state->idstate; ?>"> <?php echo $state->uf; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success" >Confirmar</button>
                        <a class="btn btn-danger" href="<?= base_url(); ?>visitor/cancel">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>