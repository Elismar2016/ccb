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
        <form class="form-horizontal" method="get" action="<?= base_url('user/update'); ?>">
            <input type="hidden" id="id" name="id" value="<?= $user['id']; ?>">
            <input type="hidden" id="password" name="password" value="<?= $user['password']; ?>" maxlength="32">
            <input type="hidden" id="status" name="status" value="<?= $user['status']; ?>" >
            <div class="control-group">
                <label class="control-label" for="name">Nome</label>
                <div class="controls">
                    <input type="text" id="name" name="name" onkeypress="charMask()" value="<?= $user['name']; ?>" required="true" style="text-transform: uppercase;">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="phone">Telefone</label>
                <div class="controls">
                    <input type="text" id="phone" name="phone" value="<?= $user['phone']; ?>" onkeyup="PhoneMask(this);" onkeypress="integerMask();"  required="true" maxlength="13">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="role">Tipo</label>
                <div class="controls">
                    <select id="role" name="role" required="true">
                        <option value="0" > </option>
                        <option value="2" <?= $user['role']=='2'?'selected':''; ?>> Atendimento </option>
                        <option value="1" <?= $user['role']=='1'?'selected':''; ?>> Administrador </option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="username">Nome de Usuário</label>
                <div class="controls">
                    <input type="text" id="username" name="username" value="<?= $user['username']; ?>" required="true">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="changepass">Senha</label>
                <div class="controls">
                    <input type="password" id="changepass" name="changepass" >
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="confirmpass">Confirme a senha</label>
                <div class="controls">
                    <input type="password" id="confirmpass" name="confirmpass" >
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                    <a class="btn btn-danger" href="<?= base_url(); ?>user/cancel">Cancelar</a>
                </div>
            </div>
        </form>
    </body>
</html>