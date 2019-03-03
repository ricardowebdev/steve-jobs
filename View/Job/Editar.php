<div class="container"><br>
    <br><div class="row">
        <div class="col-md-12 text-center">
            <h1><b>Edição de Job</b></h1>
        </div>
    </div><br>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="index.php?r=job/update" enctype="multipart/form-data">    
                <input type="hidden" name="id" value="<?= $dados->getId(); ?>">
                <div class="row">
                    <div class="col-md-10">
                        <div class="md-form">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?= $dados->getNome(); ?>" required />
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-10">
                        <div class="md-form">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $dados->getDescricao(); ?>" />
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-5">
                        <div class="md-form">
                            <label for="script">Script</label>
                            <input type="text" name="script" id="script" class="form-control" value="<?= $dados->getScript(); ?>" />
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <select type="text" name="tipo" id="tipo" class="form-control" required >
                                <option value="">Selecione</option>
                                <option value="L" <?= $dados->getTipo() === "L" ? "selected" : "" ?> >Lembrete</option>
                                <option value="C" <?= $dados->getTipo() === "C" ? "selected" : "" ?> >CRON</option>
                            </select>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-5">
                        <div class="md-form">
                            <label for="diaMes">Dia Mês</label>
                            <input type="text" name="diaMes" id="diaMes" class="form-control" value="<?= $dados->getDiaMes(); ?>" required />
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="md-form">
                            <label for="hora">Hora</label>
                            <input type="text" name="hora" id="hora" class="form-control" value="<?= $dados->getHora(); ?>" required />
                        </div>
                    </div>                    
                </div><br>

                <div class="row">
                    <div class="col-md-10">
                        <div class="md-form">
                            <label for="instrucao">Instrução</label>
                            <input type="text" class="form-control" id="instrucao" name="instrucao" value="<?= $dados->getInstrucao(); ?>" />
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-4 offset-md-8">
                        <a class="btn btn-danger" href="index.php?r=job/listing" title="voltar">
                            <b><i class="fa fa-remove"></i> Cancelar</b>
                        </a>

                        <button class="btn btn-yellow" title="Cadastrar">
                            <b><i class="fa fa-plus"></i> Editar</b>
                        </button>
                    </div>            
                </div><br>
            </form>            
        </div>
    </div>            
</div>
