<?php
	session_name("controlo");
 	session_start();

	include '../Head/conn.php';	
	
	if($_POST['edt'] == "edt"){
	
		include '../Head/header.php';
	
		$sql = "SELECT id, user, mail, level FROM users
		WHERE id LIKE '".$_POST['id']."'" or die(mysql_error());	
		$raw_results = $conn->query($sql);
	
		if($raw_results->num_rows > 0){
			while($results = $raw_results->fetch_assoc()){	
				echo'<div class="login">';
		
					echo'<form action="manuser.php" method="post" style="border: none">';
		
						echo'<div class="container">';
							echo'<label for="usr"><b>Utilizador</b></label>';
							echo'<input type="text" placeholder="Inserir novo utilizador" name="usr" value="'.$results['user'].'" required>';
	
							echo'<label for="mail"><b>E-mail</b></label>';
							echo'<input type="email" placeholder="Inserir e-mail do utilizador" name="mail" value="'.$results['mail'].'"required>';
							
							echo'<select name="lvl">';
								echo'<option ';
									if($results['level'] == "0"){ echo'selected ';}
								echo 'value="0">Utilizador</option>';
								
								echo'<option ';
									if($results['level'] == "1"){ echo'selected ';}
								echo'value="1">Administrador</option>';
							echo'</select>';

							
							echo'<input type="hidden" name="id" value="'.$results['id'].'">';

							echo'<button type="submit" name="edt" value="cfrm">Confirmar</button>';
							
							echo'<br><a class="remover" href="dltusr.php?id='.$results['id'].'">Remover</a>';
									
						echo'</div>';
		
					echo'</form>';
			
				echo'</div>';
			}
			
		}
		
		include '../Head/foot.php';
	}elseif($_POST['edt'] == "cfrm"){
		$userh = md5($_POST['user'], false);
	
		$sql = "UPDATE users SET user = '".$_POST['usr']."', mail = '".$_POST['mail']."', level = '".$_POST['lvl']."', userh = '".$userh."' WHERE id = ".$_POST['id'];
		
		if ($conn->query($sql) === TRUE) {
			header("Location: gerusr.php?stat=succ");
		} else {
	   		echo "Erro!: " . $conn->error;
		}
	}
	$conn->close();
	die();
?>
