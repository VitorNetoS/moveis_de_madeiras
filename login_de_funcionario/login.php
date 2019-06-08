<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<?PHP include('../login_de_funcionario/menu.php'); ?>
<h1>Login</h1>
<br>
<form action="../login_de_funcionario/valida.php" method="post">
	* E-mail<br>
	<input type="text" name="email" id="email">
<br>
	* Senha<br>
	<input type="password" name="senha" id="senha">
    <br>
    <br><input type="submit" value="Login" class="but_comando">
</form>
</body>
</html>