<?php
	session_name("controlo");
 	session_start();

	include '../Head/header.php';
	
	$defpsw = md5("tempra", false);
	
	if(isset($_REQUEST['stat'])){
		$stt = $_REQUEST['stat'];
			
		if($stt == "succ"){
			echo '<div class="sucss">Utilizador adicionado com sucesso</div>';
		}
	}
	
	echo'<div class="login">';
	
		echo'<form action="addusr.php" method="post" style="border: none">';
		
			echo'<div class="container">';
				echo'<label for="usr"><b>Utilizador</b></label>';
				echo'<input type="text" placeholder="Inserir novo utilizador" name="usr" required>';
	
				echo'<label for="mail"><b>E-mail</b></label>';
				echo'<input type="email" placeholder="Inserir e-mail do utilizador" name="mail" required>';
				
				echo'<label for="lvl"><b>Permissões</b></label>';
				echo'<select name="lvl">';
					echo'<option selected value="0">Utilizador</option>';
					echo'<option value="1">Administrador</option>';
				echo'</select>';
				
				
				echo'<div class="sucss">A palavra-passe é automaticamente atribuida como "tempra"</div>';

				echo'<button type="submit">Adicionar utilizador</button>';
			
			echo'</div>';
		
		echo'</form>';
			
	echo'</div>';

?>