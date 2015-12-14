<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
ini_set(“display_errors”, 0 );

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Edição de cadastro</title>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" media="screen">
        <script src="<?= base_url('assets/js/masksnvalidation.js'); ?>" type="text/javascript"></script>
    </head>
    <body>

        <h1>Edição de Cadastro</h1>
        
        <?php if ($savefail != null) { ?>
            <div class="alert alert-<?php echo $savefail["class"]; ?>"> <?php echo $savefail["message"]; ?> </div>
        <?php } ?>
        <div>
            <form class="form-horizontal" method="get" action="<?= base_url('visitor/update'); ?>">
                <input type="hidden" id="id" name="id" value="<?= $visitor['id']; ?>">
                <input type="hidden" id="status" name="status" value="<?= $visitor['status']; ?>" >
                <input type="hidden" id="cpf" name="cpf" value="<?= $visitor['cpf']; ?>" >
                <input type="hidden" id="maker" name="maker" value="<?= $visitor['maker']; ?>" >
                <h4>Informações Pessoais</h4>
                <div class="row">
                    <div class="control-group span11">
                        <label class="control-label" for="name">Nome</label>
                        <div class="controls">
                            <input type="text" class="span11" id="name" name="name" onkeypress="charMask()" value="<?= $visitor['name']; ?>" required="true" style="text-transform: uppercase;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="control-group span4">
                        <label class="control-label" for="showcpf">CPF</label>
                        <div class="controls">
                            <input type="text" disabled="true" class="span3 " id="showcpf" onkeyup="CPFMask(this);" onkeypress="integerMask();" name="showcpf" value="<?= $visitor['cpf']; ?>">
                        </div>
                    </div>
                    <div class="control-group span4">
                        <label class="control-label" for="showrg">RG</label>
                        <div class="controls">
                            <input type="text" class="span3 " id="rg" onkeypress="integerMask();" name="rg" value="<?= $visitor['rg']; ?>" maxlength="11">
                        </div>
                    </div>
                    <div class="control-group span3">
                        <label class="control-label" for="phone">Telefone</label>
                        <div class="controls">
                            <input type="text" id="phone" name="phone" onblur="ValidatesPhone(this)" onkeyup="PhoneMask(this);" onkeypress="integerMask();" value="<?= $visitor['phone']; ?>" required="true" maxlength="14">
                        </div>
                    </div>
                </div>
                <hr />
                <h4>Endereço</h4>
                <div class="row">
                    <div class="control-group span6 ">
                        <label class="control-label pull-left" for="street">Rua</label>
                        <div class="controls">
                            <input type="text" class="span5" id="street" name="street" value="<?= $currentaddress['street']; ?>" required="true" style="text-transform: uppercase;">
                        </div>
                    </div>
                    <div class="control-group span3">
                        <label class="control-label" for="number">Nº</label>
                        <div class="controls">
                            <input type="text" class="span1" id="number" name="number" value="<?= $currentaddress['number']; ?>" required="true" >
                        </div>
                    </div>
                    <div class="control-group span3">
                        <label class="control-label" for="cep">CEP</label>
                        <div class="controls">
                            <input type="text" class="span2" id="cep" name="cep" onkeyup="CEPMask(this);" onkeypress="integerMask();" onblur="ValidatesCEP(this)" value="<?= $currentaddress['cep']; ?>" required="true" maxlength="10">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="control-group span6">
                        <label class="control-label" for="district">Bairro</label>
                        <div class="controls">
                            <input type="text" class="span5" id="district" name="district" value="<?= $currentdistrict['namedistrict']; ?>" required="true" style="text-transform: uppercase;">
                        </div>
                    </div>
                    <div class="control-group span4">
                        <label class="control-label" for="city">Cidade</label>
                        <div class="controls">
                            <input type="text" class="span3" id="city" name="city" value="<?= $currentcity['namecity']; ?>" required="true" style="text-transform: uppercase;">
                        </div>
                    </div>
                    <div class="control-group span2">
                        <label class="control-label" for="uf">UF</label>
                        <div class="controls">
                            <select class="span1" id="uf" name="uf" required="true">
                                <option value="0">    </option>
                                <?php foreach ($states as $state){ ?>
                                    <option value="<?= $state->idstate; ?>" <?= $currentstate['idstate'] == $state->idstate?'selected':''; ?>> <?php echo $state->uf; ?> </option>
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