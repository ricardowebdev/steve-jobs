<div class="container"><br>
    <br><div class="row">
        <div class="col-12 text-center"><h1><b>Novo Banner</b></h1></div>
    </div><br>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="index.php?r=banner/insert" enctype="multipart/form-data">    
                <input type="hidden" name="id">
                <div class="row">
                    <div class="col-md-9">
                        <div class="md-form">
                            <label for="titulo">Titulo do Banner</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>                            
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-3">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto">
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-9 md-form">
                        <label for="texto">Texto</label>
                        <input type="text" name="texto" id="texto" class="form-control" />
                    </div>        
                </div><br>

                <div class="row">
                    <div class="col">&nbsp;</div>

                    <div class="col-md-3">
                        <a class="btn btn-danger btn-sm form-control" href="index.php?r=banner/listing" title="voltar">
                            <b><i class="fa fa-remove"></i>&nbsp;Cancelar</b>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-success btn-sm form-control" title="Cadastrar">
                            <b><i class="fa fa-plus"></i>&nbsp;Cadastrar</b>
                        </button>
                    </div>            
                </div><br>
            </form>            
        </div>
    </div>            
</div>
