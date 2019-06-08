<?php
require 'conexao.php';

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome,cpf, email, telefone, data_nacimento, endereco, foto FROM funcionario';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$funcionarios = $stm->fetchAll(PDO::FETCH_OBJ);

else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome, email FROM funcionario WHERE nome LIKE :nome OR email LIKE :email';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':email', $termo.'%');
	$stm->execute();
	$funcionarios = $stm->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Listagem de Funcinario</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend><h1>Listagem de Funcionario</h1></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-7'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome ou E-mail">
				</div>
			    <button type="submit" class="btn btn-primary">Pesquisar</button>
			    <a href='lis_funcionario.php' class="btn btn-primary">Ver Todos</a>
			</form>

		<!-- Link para página de cadastro -->
		<a href='cadastro_funcinario.php' class="btn btn-success pull-right">Cadastrar Funcionario</a>
			<div class='clearfix'></div>

			<?php if(!empty($funcionarios)):?>

				<!-- Tabela de Funcionario -->
				<table class="table table-striped">
					<tr class='active'>
						<th>Foto</th>
						<th>Nome</th>
						<th>CPF</th>
						<th>E-mail</th>
						<th>Telefone</th>
						<th>Data de Nacimento</th>
						<th>Endereço</th>
						<th>Ação</th>
					</tr>
					<?php foreach($funcionarios as $funcionario):?>
						<tr>
							<td><img src='fotos/<?=$funcionario->foto?>' height='40' width='40'></td>
							<td><?=$funcionario->nome?></td>
							<td><?=$funcionario->cpf?></td>
							<td><?=$funcionario->email?></td>
							<td><?=$funcionario->telefone?></td>
							<td><?=$funcionario->data_nacimento?></td>
							<td><?=$funcionario->endereco?></td>
							<td>
								<a href='editar.2.php?id=<?=$funcionario->id?>' class="btn btn-primary">Editar</a>
								<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$funcionario->id?>">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista funcionario ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem funcionario cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom2.js"></script>
</body>
</html>