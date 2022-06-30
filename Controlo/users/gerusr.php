<?php
	session_name("controlo");
 	session_start();

	include '../Head/header.php';
	include '../Head/conn.php';
	
	if(isset($_REQUEST['stat'])){
		$stt = $_REQUEST['stat'];
			
		if($stt == "succ"){
			echo '<div class="sucss">Utilizador editado com sucesso</div>';
		}elseif($stt == "rem"){
			echo '<div class="sucss">Utilizador removido com sucesso</div>';
		}
	}
	
	$sql = "SELECT id, user FROM users";
	
	$raw_results = $conn->query($sql);
	
	if($raw_results->num_rows > 0){
		while($results = $raw_results->fetch_assoc()){	
			if($results['user'] != $_SESSION['name']){
			echo'<div class="login">';
	
				echo'<form action="manuser.php" method="post" style="border: none">';
		
					echo'<div class="container">';
						echo '<label for="usr"><b>'.$results['user'].'</b></label>';
						echo '<input type="hidden" name="id" value="'.$results['id'].'">';
				
						echo '<button type="submit" name="edt" value="edt">Editar</button>';
			
					echo'</div>';
		
				echo'</form>';
			
			echo'</div>';
			}
		}
	}
	
	echo '<form action="newmmbr.php" method="post">';
		
		echo'<div class="container login">';
						
			echo '<button class="buttn" type="submit" name="edt" value="edt">Novo Utilizador</button>';
			
		echo'</div>';
		
	echo'</form>';

?>