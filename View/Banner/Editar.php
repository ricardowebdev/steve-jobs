<div class="container"><br>
    <br><div class="row">
        <div class="col-12 text-center"><h1><b>Edição de Banner</b></h1></div>
    </div><br>

    <div class="card">
        <div class="card-body">       
            <form method="POST" action="index.php?r=banner/update" enctype="multipart/form-data">    
                <input type="hidden" name="id" value="<?= $dados->getId(); ?>">

                <div class="row">
                    <div class="col-md-9">
                        <div class="md-form">
                            <label for="titulo">Titulo</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required value="<?= $dados->getTitulo(); ?>">                            
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-4">
                        <label for="bannerOld">Foto</label>                
                        <img src="./uploads/banners/<?= $dados->getFoto(); ?>" alt="foto do Banner" class="img-thumbnail img-fluid z-depth-1" alt="1" >
                        <input type="hidden" name="bannerOld" value="<?= $dados->getFoto(); ?>">                    
                    </div>
                    <div class="col-md-3">
                        <label for="foto">Alterar foto</label>
                        <input type="file" name="foto" id="foto">
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-9 md-form">
                        <label for="texto">Texto</label>
                        <input type="text" name="texto" id="texto" class="form-control" value="<?= $dados->getTexto(); ?>" />
                    </div>        
                </div><br>

                <div class="row">
                    <div class="col">&nbsp;</div>
                    <div class="col-md-3">
                        <a class="btn btn-danger form-control btn-sm" href="index.php?r=banner/listing" title="voltar">
                            <b><i class="fa fa-remove"></i>&nbsp;Cancelar</b>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-yellow form-control btn-sm" title="editar">
                            <b><i class="fa fa-edit"></i>&nbsp;Editar</b>
                        </button>
                    </div>            
                </div><br>
            </form>
        </div>
    </div>
</div>
