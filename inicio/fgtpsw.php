<?php
	session_name("controlo");
	session_start();
	include '../Controlo/Head/conn.php';
	include '../head+foot/Header.php';
	
	if(isset($_SESSION['nome'])){
		header("Location: ../Controlo/gen/inicio.php");
	}
	
	if(isset($_GET['stat'])){
		if($_GET['stat'] == "err"){
			echo "<div class='err'>Utilizador não encontrado</div>";
		}elseif($_GET['stat'] == "suc"){
			echo "<div class='sucss'>E-mail enviado com sucesso</div>";
		}elseif($_GET['stat'] == "err1"){
			echo "<div class='err'>Não conseguimos enviar o e-mail</div>";
		}
  	} 
?>	

	
	<br><br>
	<div class="login">
	
		<form action="../Controlo/Head/rec.php" method="post">
		
			<div class="container">
				<label for="uname"><b>Utilizador</b></label>
				<input type="text" placeholder="Inserir nome de utilizador" name="uname" required>
	
				<button type="submit">Enviar e-mail de recuperação</button>
			</div>

		
		</form>