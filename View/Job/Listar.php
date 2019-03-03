<br><div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1><b>Jobs</b></h1>
        </div>
    </div><br>
    <div class="row">            
        <div class="col-md-2">
            <a href="index.php?r=job/insert" class="btn btn-primary btn-sm" title="adicionar novo">
                <b><i class="fa fa-plus"></i> Adicionar</b>
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 table-responsive" style="padding: 5px;" >
                    <table class="table table-striped table-hover table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Dia Mês</th>
                                <th>Hora</th>
                                <th>Tipo</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dados as $job) : ?>
                                <tr>    
                                    <th scope="row"><?= $job->getId(); ?></th>                 
                                    <td><?= $job->getNome();   ?></td>
                                    <td><?= $job->getDiaMes(); ?></td>
                                    <td><?= $job->getHora();   ?></td>
                                    <td><?= $job->getTipo();   ?></td>
                                    <td>
                                        <a href="index.php?r=job/update/<?= $job->getId(); ?>" class="btn btn-yellow btn-sm" title="editar">
                                            <i class="fa fa-pencil"></i> Editar
                                        </a>
                                        <a onclick="callDelete('Job', <?= $job->getId(); ?>)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" title="apagar">
                                            <i class="fa fa-trash"></i> Apagar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>    
                          </tbody>
                    </table>                
                </div>            
            </div>
        </div>
    </div>
</div>
