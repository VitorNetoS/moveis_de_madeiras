<?PHP include('../login_de_funcionario/menu.php'); ?>
<?PHP
#session_start();
if(isset($_SESSION['nome_usu_sessao']))
	{
		?>
		 <div class="borda2 padding20">
		 <ul>
            <li>
               <a href='../index_funcionario.php' class="btn btn-success pull-right">Controle do Funcionario</a>
            </li>
		</ul>
		<div> 
             <ul>
                 <li>    
                    <img src="../fotos/moveis_1.jpg" width="1280" height="550">
                 </li>
            </ul> 
        </div>
            <br>
            <br>
        	  <a href="../login_de_funcionario/logout.php"><strong>Sair</strong></a>
        </div>
        
		<?PHP
	}
else
	{
		?>
        <div class="borda1 padding20">
        	<img src="imagens/lock.png" width="200">
            <br>
            <br>
        	Esta é uma área restrita, por favor, <a href="../login_de_funcionario/login.php"><strong>efetue login</strong></a>.
        </div>
		<?PHP
	}
?>
