<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Funcionario</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Cadastro de Funcionario</h1></legend>
			
			<form action="action_funcionario.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
					<label for="nome">Selecionar Foto</label>
			      	<div class="col-md-2">
					    <a href="#" class="thumbnail">
					      <img src="fotos/padrao.jpg" height="190" width="150" id="foto-cliente">
					    </a>
				  	</div>
				  	<input type="file" name="foto" id="foto" value="foto" >
			  	</div>

			    <div class="form-group">
			      <label for="nome">Nome</label>
			      <input type="text" class="form-control" id="nome" name="nome" placeholder="Infome o Nome">
			      <span class='msg-erro msg-nome'></span>
			    </div>

			    <div class="form-group">
			      <label for="email">E-mail</label>
			      <input type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail">
			      <span class='msg-erro msg-email'></span>
			    </div>

			    <div class="form-group">
			      <label for="cpf">CPF</label>
			      <input type="cpf" class="form-control" id="cpf" maxlength="14" name="cpf" placeholder="Informe o CPF">
			      <span class='msg-erro msg-cpf'></span>
			    </div>
			    <div class="form-group">
			      <label for="data_nascimento">Data de Nascimento</label>
			      <input type="data_nacimento" class="form-control" id="data_nacimento" maxlength="10" name="data_nascimento">
			      <span class='msg-erro msg-data'></span>
			    </div>
			    <div class="form-group">
			      <label for="telefone">Telefone</label>
			      <input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Informe o Telefone">
			      <span class='msg-erro msg-telefone'></span>
			    </div>
			    <div class="form-group">
			      <label for="nome">Endereço</label>
			      <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Infome o Endereço">
			      <span class='msg-erro msg-endereco'></span>
			    </div>

			    <input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'> Gravar </button>
			    <a href='index.php' class="btn btn-danger">Cancelar</a>
			</form>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom2.js"></script>
</body>
</html>