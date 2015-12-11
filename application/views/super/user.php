<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
ini_set(“display_errors”, 0 );

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Usuários</title>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css');?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" media="screen">
    </head>
    <body>
        
        <h1>Usuários do Sistema</h1>

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Situação</th>
                    <th>Nome</th>
                    <th>Nome de usuário</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user){ ?>
                    <tr>
                        <td>
                            <?php if($user->role == 1){ ?>
                                <img title="Administrador" src="<?= base_url(); ?>assets/img/icon/role_super.png" class="img-responsive" height="17" width="17">
                            <?php }else{ ?>
                                <img title="Atendimento" src="<?= base_url(); ?>assets/img/icon/role_user.png" class="img-responsive" height="17" width="17">
                            <?php } ?>
                            <?php if($user->status == 1){ ?>
                                <img title="Ativo" src="<?= base_url(); ?>assets/img/icon/active.png" class="img-responsive" height="17" width="17">
                            <?php }else{ ?>
                                <img title="Inativo" src="<?= base_url(); ?>assets/img/icon/inactive.png" class="img-responsive" height="17" width="17">
                            <?php } ?>
                        </td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->username; ?></td>
                        <td><?php echo $user->phone; ?></td>
                        <td>
                            <a href="<?= base_url('user/changestat/'.$user->id); ?>">
                                <?php if($user->status == 1){ ?>
                                <img title="Desativar" src="<?= base_url(); ?>assets/img/icon/disable.png" class="img-responsive" height="17" width="17" onclick="return confirm('Desativar um usuário vai impossibilitar que o mesmo possa se logar no sistema.');">
                                <?php }else{ ?>
                                    <img title="Ativar" src="<?= base_url(); ?>assets/img/icon/disable.png" class="img-responsive" height="17" width="17" onclick="return confirm('Ativar um usuário vai possibilitar que o mesmo possa se logar no sistema.');">
                                <?php } ?>
                            </a>
                            <a href="<?= base_url('user/edit/'.$user->id); ?>">
                                <img title="Editar" src="<?= base_url(); ?>assets/img/icon/edit.png" class="img-responsive" height="17" width="17">
                            </a>
                            <a href="<?= base_url('user/delete/'.$user->id); ?>">
                                <img title="Remover" src="<?= base_url(); ?>assets/img/icon/remove.png" class="img-responsive" height="13" width="13" onclick="return confirm('Tem certeza que deseja fazer isto? Remover um usuário vai apagar todos os registros dele no sistema.');">
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a class="btn btn-primary" href="<?= base_url();?>user/newuser">Novo usuário</a>
                
        <?php if ($savesuccess != null) { if ($savesuccess['id'] == '1'){?>
            <script>alert('<?php echo $savesuccess['message']; ?>');</script>
            <?php }else{ if ($savesuccess['id'] == '2'){?>
            <script>alert('<?php echo $savesuccess['message']; ?>');</script>
            <?php }else{ if ($savesuccess['id'] == '3'){?>
            <script>alert('<?php echo $savesuccess['message']; ?>');</script>
            <?php }else{ ?>
            <script>alert('<?php echo $savesuccess['message']; ?>');</script>
            <?php }}}} ?>
    </body>
</html>