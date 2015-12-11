<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
ini_set(“display_errors”, 0 );

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CCB - Visitantes</title>
        <meta charset="utf-8">
        <link href="<?= base_url('assets/css/bootstrap-responsive.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap-responsive.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/codeigniter.css'); ?>" rel="stylesheet" media="screen">
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" media="screen">
    </head>
    <body>

        <h1>
            Visitantes da Biblioteca
            <div class="input-append pull-right">
                <form method="get" action="<?= base_url('visitor/searchvisitor'); ?>">
                    <input class="span6" placeholder="Pesquisar visitante" title="CPF, RG ou Nome" type="text" id="searchcamp" name="searchcamp" style="text-transform: uppercase;">
                    <button class="btn" type="submit">
                        <img title="Procurar" src="<?= base_url(); ?>assets/img/icon/search.png" class="img-responsive" height="17" width="17">
                    </button>
                </form>
            </div>
        </h1>
        <table class="table table-condensed">
            <?php if($visitors){ ?>
                <thead>
                    <tr>
                        <th></th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th class="span4">Nome</th>
                        <th>Telefone</th>
                        <th class="span7">Endereço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($visitors as $visitor){ ?>
                        <tr>
                            <td>
                                <?php if($visitor->status == 1){ ?>
                                    <img title="Ativo" src="<?= base_url(); ?>assets/img/icon/active.png" class="img-responsive" height="17" width="17">
                                <?php }else{ ?>
                                    <img title="Inativo" src="<?= base_url(); ?>assets/img/icon/inactive.png" class="img-responsive" height="17" width="17">
                                <?php } ?>
                            </td>
                            <td><?php echo $visitor->cpf; ?></td>
                            <td><?php echo $visitor->rg; ?></td>
                            <td><?php echo $visitor->name; ?></td>
                            <td><?php echo $visitor->phone; ?></td>
                            <td><?php echo $visitor->street; ?>, <?php echo $visitor->number; ?> - <?php echo $visitor->namedistrict; ?> - <?php echo $visitor->namecity ?>/<?php echo $visitor->uf ?></td>
                            <td>
                                <a href="<?= base_url('visitor/changestat/'.$visitor->id); ?>">
                                    <?php if($visitor->status == 1){ ?>
                                    <img title="Desativar" src="<?= base_url(); ?>assets/img/icon/disable.png" class="img-responsive" height="17" width="17" onclick="return confirm('Desativar um visitante vai impossibilitar que o mesmo possa portar um empréstimo.');">
                                    <?php }else{ ?>
                                        <img title="Ativar" src="<?= base_url(); ?>assets/img/icon/disable.png" class="img-responsive" height="17" width="17" onclick="return confirm('Ativar um visitante vai possibilitar que o mesmo possa portar um empréstimo.');">
                                    <?php } ?>
                                </a>
                                <a href="<?= base_url('visitor/edit/'.$visitor->id); ?>">
                                    <img title="Editar" src="<?= base_url(); ?>assets/img/icon/edit.png" class="img-responsive" height="17" width="17">
                                </a>
                                <a href="<?= base_url('visitor/delete/'.$visitor->id); ?>">
                                    <img title="Remover" src="<?= base_url(); ?>assets/img/icon/remove.png" class="img-responsive" height="13" width="13" onclick="return confirm('Tem certeza que deseja fazer isto? Remover um visitante vai apagar todos os registros dele no sistema.');">
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            <?php }
                  else{
                      echo '<h4>Faça uma busca para listar os visitantes cadastrados no sistema.</h4>';
                  }?>
        </table>
        <a class="btn btn-primary" href="<?= base_url(); ?>visitor/newvisitor">Novo visitante</a>
        
        <?php if ($savesuccess != null) { if ($savesuccess['id'] == '1'){?>
            <script>alert('Visitante cadastrado com sucesso!');</script>
            <?php }else{ ?>
            <script>alert('Cadastro atualizado com sucesso!');</script>
        <?php }} ?>
        
    </body>
</html>