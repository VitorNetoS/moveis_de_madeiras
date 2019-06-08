<?php
require 'conexao.php';

// Recebe o id do cliente do cliente via GET
$id_produto = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_produto) && is_numeric($id_produto)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome, preco, status, foto, estoque FROM produto WHERE id = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_produto);
	$stm->execute();
	$produto = $stm->fetch(PDO::FETCH_OBJ);

endif;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Edição de produto</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Edição de produto</h1></legend>	
			<?php if(empty($produto)):?>
				<h3 class="text-center text-danger">produto não encontrado!</h3>
			<?php else: ?>
				<form action="action_produto.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<div class="row">
						<label for="nome">Alterar Foto</label>
				    	<div class="col-md-2">
						    <a href="#" class="thumbnail">
						      <img src="fotos/<?=$produto->foto?>" height="190" width="150" id="foto-produto">
						    </a>
						  </div>
					  	<input type="file" name="foto" id="foto" value="foto" >
				  </div>

				  <div class="form-group">
				      <label for="nome">Nome</label>
				      <input type="text" class="form-control" id="nome" name="nome" value="<?=$produto->nome?>" placeholder="Infome o Nome">
				      <span class='msg-erro msg-nome'></span>
				  </div>

				    <div class="form-group">
				      <label for="preco">Preco</label>
				      <input type="preco" class="form-control" id="preco" name="preco" value="<?=$produto->preco?>" placeholder="Informe o Preço do produto">
				      <span class='msg-erro msg-preco'></span>
				    </div>

				    <div class="form-group">
				      <label for="status">Status</label>
				      <select class="form-control" name="status" id="status">
					    <option value="<?=$cliente->status?>"><?=$produto->status?></option>
					    <option value="Ativo">Ativo</option>
					    <option value="Inativo">Inativo</option>
					  </select>
					  <span class='msg-erro msg-status'></span>
				    </div>

						<div class="form-group">
				      <label for="estoque">Estoque</label>
				      <input type="estoque" class="form-control" id="estoque" name="estoque" value="<?=$produto->estoque_id?>" placeholder="Informe o estoque">
				      <span class='msg-erro msg-estoque_id'></span>
				    </div>

				    <input type="hidden" name="acao" value="editar">
				    <input type="hidden" name="id" value="<?=$produto->id?>">
				    <input type="hidden" name="foto_atual" value="<?=$produto->foto?>">
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='lis_produto.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom3.js"></script>
</body>
</html>