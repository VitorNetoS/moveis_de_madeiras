<?php
require 'conexao.php';
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome, preco, status, foto, estoque FROM produto';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$produtos = $stm->fetchAll(PDO::FETCH_OBJ);
else:
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome, preco, status, foto, estoque FROM produto WHERE nome LIKE :nome';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	//$stm->bindValue(':email', $termo.'%');
	$stm->execute();
	$produtos = $stm->fetchAll(PDO::FETCH_OBJ);
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de produtos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend id="titulo"><h1>Listagem de Produtos</h1></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-7'>
			        <input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome do Produto">
				</div>
			    <button type="submit" class="btn btn-primary">Pesquisar</button>
			    <a href='lis_produto.php' class="btn btn-primary">Ver Todos</a>
			</form>

			<!-- Link para página de cadastro -->
			<a href='cadastro_prod.php' class="btn btn-success pull-right">Cadastrar Novo Produto</a>
			<div class='clearfix'></div>

			<?php if(!empty($produtos)):?>
					<?php foreach($produtos as $produto):?>
					<div id="itens">
						<img class="btn" src='fotos/<?=$produto->foto?>' height='200' width='200'>
						<div id="name">
							<?=$produto->nome?>
					    </div>
						<div>
					        <?=$produto->preco?>
					    </div>
						<div>
							<?=$produto->status?>
					    </div>
						<div>
							<a href='editar.1.php?id=<?=$produto->id?>' class="btn btn-primary">Editar</a>
							<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$produto->id?>">Excluir</a>
						</div>
					</div>
							
					<?php endforeach;?>
				</table>
			<?php else: ?>
				<!-- Mensagem caso não exista clientes ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem produtos cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom3.js"></script>
</body>
</html>