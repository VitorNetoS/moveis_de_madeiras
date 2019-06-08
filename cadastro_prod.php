<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Cliente</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Cadastro de Produto</h1></legend>
			
			<form action="action_produto.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
					<label for="nome">Selecionar Foto</label>
			      	<div class="col-md-2">
					    <a href="#" class="thumbnail">
					      <img src="fotos/padrao2.jpg" height="190" width="150" id="foto-produto">
					    </a>
				  	</div>
				  	<input type="file" name="foto" id="foto" value="foto" >
			  	</div>

			    <div class="form-group">
			      <label for="nome">Nome</label>
			      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto">
			      <span class='msg-erro msg-nome'></span>
			    </div>

			    <div class="form-group">
			      <label for="preco">Preço</label>
			      <input type="preco" class="form-control" id="preco" maxlength="13" name="preco" placeholder="Informe o valor do produto">
			      <span class='msg-erro msg-celular'></span>
					</div>
					
			    <div class="form-group">
			      <label for="status">Status</label>
			      <select class="form-control" name="status" id="status">
				    <option value="">Selecione o Status</option>
				    <option value="Ativo">Ativo</option>
				    <option value="Inativo">Inativo</option>
				  </select>
				  <span class='msg-erro msg-status'></span>
					</div>

					<div class="form-group">
			      <label for="estoque">Estoque</label>
			      <input type="estoque" class="form-control" id="estoque" name="estoque" placeholder="Informe o estoque do produto">
			      <span class='msg-erro msg-estoque'></span>
			    </div>

			    <input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
			    </button>
			    <a href='index.php' class="btn btn-danger">Cancelar</a>
			</form>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom3.js"></script>
</body>
</html>