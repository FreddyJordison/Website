<?php
	session_name("controlo");
	session_start();
	include '../Head/conn.php';

	$user = $_GET['id'];
		
	$sql = "SELECT * FROM users
	WHERE userh LIKE '%".$user."%'" or die(mysql_error());
	
	$raw_results = $conn->query($sql);
	
	if($raw_results->num_rows > 0){
		$results = $raw_results->fetch_assoc();
		
		if(!isset($_GET['chk'])){
			include '../Head/header.php';
			if(isset($_GET['err'])){
				echo "<div class='err'>Palavra-passe nova não pode ser igual à antiga</div>";
  			}
			echo '<div class="login">';
	
				echo '<form action="psw.php?id='.$user.'&chk=true" method="post" style="border: none">';
		
					echo '<div class="container">';
					
						echo '<label for="psw"><b>Palavra-passe nova</b></label>';
						echo '<input type="password" placeholder="Inserir nova palavra-passe" name="psw" required>';
					
						echo '<button type="submit">Alterar palavra-passe</button>';
			
					echo '</div>';
		
				echo '</form>';
			
			echo '</div>';
			include '../Head/foot.php';
		}elseif(!isset($_GET['err'])){
			$pass = md5($_POST['psw'],false);
			
			if($results['pass'] != $pass){
				$psw = $_POST['psw'];
			
				$psw = md5($psw,false);
				
				$sql = "UPDATE users SET pass = '$psw'
				WHERE userh LIKE '%".$user."%'" or die(mysql_error());
			
				$conn->query($sql);
				
				header("Location: ../../inicio/Login.php?stat=suc");
			}else{
				header("Location: psw.php?err=true&id=".$user);
			}
		}
	}else{
		echo $user;
		echo 'ERRO!!!!!!';
	}
	
?>