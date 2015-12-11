<?php
defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(0);
ini_set(“display_errors”, 0 );

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Login</title>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="container">
            <div class="bs-docs-grid">
                <div class="row-fluid show-grid">
                    <div class="span8" style="text-align: center">
                        <img src="<?= base_url(); ?>assets/img/presentation.png"
                        <p></p>
                        <p></p>
                    </div>
                    <div class="span4" style="text-align: center">
                        <?php if($loginfail != null){ ?>
                            <div class="alert alert-<?php echo $loginfail["class"]; ?>"> <?php echo $loginfail["message"]; ?> </div>
                        <?php } ?>
                        <form method="get" action="<?= base_url('login/signin');?>" >
                            <h2 class="form-signin-heading pull-left">Autenticação</h2>
                            <input type="text" name="username" id="username" class="input-block-level" 
                                   placeholder="Usuário" required>
                            <input type="password"name="password" id="password" class="input-block-level" 
                                   placeholder="Senha" required>
                            <button class="btn btn-primary pull-left" name="signin" value="signin" type="submit">Entrar</button>
                        </form>
                        <p></p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>