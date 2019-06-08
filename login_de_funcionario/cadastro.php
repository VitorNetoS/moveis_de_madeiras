<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<?PHP include('../login_de_funcionario/menu.php'); ?>
<h1>Cadastro</h1>
<br>
<script type="text/javascript">
function valida_campos()
	{
		if(document.getElementById('nome').value == '')
			{
				alert('Por favor, preencha os campos obrigatórios.');
				document.getElementById('nome').focus();
				return false;
			}
		if(document.getElementById('email').value == '')
			{
				alert('Por favor, preencha os campos obrigatórios.');
				document.getElementById('email').focus();
				return false;
			}
		if(document.getElementById('senha').value == '' || document.getElementById('senha').value != document.getElementById('senha2').value)
			{
				alert('Por favor, as senhas não conferem, por favor, redigite.');
				document.getElementById('senha').focus();
				return false;
			}
	}
</script>
<form action="cadastrar.php" method="post" onSubmit="return valida_campos();">
	* Nome<br>
    <input type="text" name="nome" id="nome">
	<br>
	* E-mail<br>
	<input type="text" name="email" id="email">
<br>
	* Senha<br>
	<input type="password" name="senha" id="senha">
<br>
	* Confirmar senha
    <br>
    <input type="password" name="senha2" id="senha2">
  <br>
  <br><input type="submit" value="Cadastrar" class="but_comando">
</form>
</body>
</html>