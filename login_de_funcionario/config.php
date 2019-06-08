<?PHP
# Conexão com o banco de dados
$conexao = mysqli_connect('127.0.0.1','root','') or die("Erro de conexão");
$banco = mysqli_select_db($conexao,'moveis_md') or die("Erro ao selecionar o banco de dados");
?>