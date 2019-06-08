<?PHP
session_start();
if(isset($_SESSION['nome_usu_sessao']))
	{
		?>
        <div class="padding20"><?PHP echo 'Olá '.$_SESSION['nome_usu_sessao'].', Seja bem vindo!'; ?></div><?PHP
	}
?>
<link rel="stylesheet" href="css/style.css">
<div class="menu">Menu</div>

<p><a href="login.php">Login</a></p>
<p><a href="logout.php">Logout</a></p>
