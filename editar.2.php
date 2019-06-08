<?php
require 'conexao.php';

// Recebe o id do funcionario do funcionario via GET
$id_funcionario = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_funcionario) && is_numeric($id_funcionario)):

	// Captura os dados do funcionario solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome, email, cpf, data_nacimento, telefone, endereco, foto FROM funcionario WHERE id = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_funcionario);
	$stm->execute();
	$funcionario = $stm->fetch(PDO::FETCH_OBJ);

	if(!empty($funcionario)):

		// Formata a data no formato nacional
		$array_data     = explode('-', $funcionario->data_nascimento);
		$data_formatada = $array_data[2] . '/' . $array_data[1] . '/' . $array_data[0];

	endif;

endif;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Edição de Funcionario</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class='container'>
		<fieldset>
			<legend><h1>Formulário - Edição de Funcionario</h1></legend>
			
			<?php if(empty($funcionario)):?>
				<h3 class="text-center text-danger">Funcionario não encontrado!</h3>
			<?php else: ?>
				<form action="action_funcionario.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<div class="row">
						<label for="nome">Alterar Foto</label>
				        <div class="col-md-2">
						        <a href="#" class="thumbnail">
						        <img src="fotos/<?=$funcionario->foto?>" height="190" width="150" id="foto-funcionario">
						    </a>
					    	</div>
					  	<input type="file" name="foto" id="foto" value="foto" >
				  	</div>
				    <div class="form-group">
				      <label for="nome">Nome</label>
				      <input type="text" class="form-control" id="nome" name="nome" value="<?=$funcionario->nome?>" placeholder="Infome o Nome">
				      <span class='msg-erro msg-nome'></span>
				    </div>
				    <div class="form-group">
				      <label for="email">E-mail</label>
				      <input type="email" class="form-control" id="email" name="email" value="<?=$funcionario->email?>" placeholder="Informe o E-mail">
				      <span class='msg-erro msg-email'></span>
				    </div>
				    <div class="form-group">
				      <label for="cpf">CPF</label>
				      <input type="cpf" class="form-control" id="cpf" maxlength="14" name="cpf" value="<?=$funcionario->cpf?>" placeholder="Informe o CPF">
				      <span class='msg-erro msg-cpf'></span>
				    </div>
				    <div class="form-group">
				      <label for="data_nascimento">Data de Nascimento</label>
				      <input type="data_nascimento" class="form-control" id="data_nascimento" maxlength="10" value="<?=$data_formatada?>" name="data_nascimento">
				      <span class='msg-erro msg-data'></span>
				    </div>
				    <div class="form-group">
				      <label for="telefone">Telefone</label>
				      <input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" value="<?=$funcionario->telefone?>" placeholder="Informe o Telefone">
				      <span class='msg-erro msg-telefone'></span>
						</div>
						<div class="form-group">
				      <label for="endereco">Endereco</label>
				      <input type="text" class="form-control" id="endereco" name="endereco" value="<?=$funcionario->nome?>" placeholder="Infome o Nome">
				      <span class='msg-erro msg-endereco'></span>
						</div>
				    <input type="hidden" name="acao" value="editar">
				    <input type="hidden" name="id" value="<?=$funcionario->id?>">
				    <input type="hidden" name="foto_atual" value="<?=$funcionario->foto?>">
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='lis_funcionario.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom2.js"></script>
</body>
</html>