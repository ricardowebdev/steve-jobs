<br><div class="container-fluid"><br>
    <div class="row">
        <div class="col-12 text-center"><h1><b>Usuarios</b></h1></div>
    </div><br>
    <div class="row">            
        <div class="col-md-2 text-center">
            <a href="index.php?r=usuario/insert" class="btn btn-primary btn-sm" title="Adicionar novo usuario">
                <b><i class="fa fa-plus"></i>&nbsp;Adicionar</b>
            </a>
        </div>
    </div>
    <div class="row card" style="margin: 15px;">
        <div class="card-body">
            <div class="col-md-12" style="padding: 10px;">
                <table class="table table-striped table-hover table-bordered" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados as $usuario) : ?>
                            <tr>    
                                <th scope="row"><?= $usuario->getId(); ?></th>                 
                                <td><?= $usuario->getNome(); ?></td>
                                <td><?= $usuario->getEmail();     ?></td>
                                <td>
                                    <a href="index.php?r=usuario/update/<?= $usuario->getId(); ?>" class="btn btn-yellow btn-sm" title="Editar usuario">
                                        <i class="fa fa-pencil"></i> Editar
                                    </a>
                                    <a onclick="callDelete('Usuario', <?= $usuario->getId(); ?>)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" title="Excluir Usuario">
                                        <i class="fa fa-trash"></i> Deletar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>    
                      </tbody>
                </table>                
            </div>                
        </div>    
    </div>
</div>"
