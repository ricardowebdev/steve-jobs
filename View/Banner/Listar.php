<br><div class="container-fluid"><br>
    <div class="row">
        <div class="col-12 text-center"><h1><b>Banners</b></h1></div>
    </div><br>
    <div class="row">            
        <div class="col-md-2 text-center">
            <a href="index.php?r=banner/insert" class="btn btn-primary btn-sm" title="adicionar novo">
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
                            <th>Titulo</th>
                            <th>Texto</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados as $banner) : ?>
                            <tr>    
                                <th scope="row"><?= $banner->getId(); ?></th>                 
                                <td><?= $banner->getTitulo(); ?></td>
                                <td><?= $banner->getTexto();  ?></td>
                                <td>
                                    <a href="index.php?r=banner/update/<?= $banner->getId(); ?>" class="btn btn-yellow btn-sm" title="editar">
                                        <i class="fa fa-pencil"></i> Editar
                                    </a>
                                    <a onclick="callDelete('Banner', <?= $banner->getId(); ?>)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal" title="apagar">
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
</div>"
