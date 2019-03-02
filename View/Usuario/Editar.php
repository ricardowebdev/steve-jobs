<br><div class="container"><br>
	<div class="row">
		<div class="col-12 text-center">
			<h1><b>Edição de Usuario</b></h1>
		</div>
	</div><br>

	<div class="card">
	    <div class="card-body">	   
			<form method="POST" action="index.php?r=usuario/update">	
				<input type="hidden" name="id" id="selectedId" value="<?= $dados->getId(); ?>">
				<div class="row">
					<div class="col-md-6">
						<div class="md-form">
							<label for="nome">
								Nome <span class="star-required">*</span>
							</label>
							<input type="text"
								   name="nome"
								   id="nome"
								   class="form-control"
								   required
								   value="<?= $dados->getNome(); ?>">							
						</div>
					</div>
				</div><br>

				<div class="row">
					<div class="col-md-6">
						<div class="md-form">						
							<label for="email">
								Email <span class="star-required">*</span>
							</label>
							<input type="email"
								   name="email"
								   id="email"
								   class="form-control email"
								   required value="<?= $dados->getEmail(); ?>">
						</div>
					</div>
				</div><br>

				<div class="row">
					<div class="col-md-6">
						<div class="md-form">
							<input type="hidden"
								   name="senhaOld"
								   id="senhaOld"
								   value="<?= $dados->getSenha(); ?>">
							
							<label for="senha">
								Senha <span class="star-required">*</span>
							</label>
							<input type="password"
								   name="senha"
								   id="senha"
								   class="form-control"
								   required 
								   value="<?= $dados->getSenha(); ?>">							
						</div>
					</div>
				</div><br>	

				<div class="row">

					<div class="col">&nbsp;</div>

					<div class="col-md-3">
						<a class="btn btn-danger form-control btn-sm" href="index.php?r=usuario/listing" title="Voltar">
							<b><i class="fa fa-remove"></i>&nbsp;Cancelar</b>
						</a>
					</div>

					<div class="col-md-3">
						<button class="btn btn-yellow form-control btn-sm" title="Confirmar Edição">
							<b><i class="fa fa-edit"></i>&nbsp;Editar</b>
						</button>
					</div>			
				</div>
			</form>
		</div>
	</div>
</div>