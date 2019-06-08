<?PHP include('../login_de_funcionario/menu.php'); ?>
<?PHP
# Receber os dados vindos do formulário
# incluir arquivo de conexao
include('config.php');

$nome = ucwords($_POST['nome']); # Coloca a primeira letra da string em maiúsculo
$email = $_POST['email'];
$senha = $_POST['senha'];

$in = mysqli_query($conexao,"insert into usuario (nome,email,senha) values ('$nome','$email','$senha')") or die("Erro");
?>
<div class="msg1 padding20">Cadastro realizado com sucesso</div>