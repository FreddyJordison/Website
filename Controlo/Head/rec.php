<?php
	session_name("controlo");
	session_start();
	
	include '../Head/conn.php';
	
	$user = md5($_REQUEST['uname'],false);
	
	$sql = "SELECT * FROM users
	WHERE userh LIKE '%".$user."%'" or die(mysql_error());
	
	$raw_results = $conn->query($sql);
	
	if($raw_results->num_rows > 0){
		while($results = $raw_results->fetch_assoc()){
					
			$mess = "Pedido de recuperação de palavra-passe do utilizador ".$results['user'].".\r\nSe não foi você, ignore esta mensagem.\r\nPara recuperar a palavra-passe, clique no link: http://94.62.150.151:12555/Controlo/users/psw.php?id=".$user;
			
			$mess = wordwrap($mess, 70, "\r\n");
			
			$email = $results['mail'];
			
			$head = 'From: BatalhaTempra';
						
			if(mail($email, 'Recuperação de palavra-passe', $mess, 'From: BatalhaTempra')){
				header("Location: ../../inicio/fgtpsw.php?stat=suc");
			}else{
				header("Location: ../../inicio/fgtpsw.php?stat=err1");
			}
		}
	}else{
		header("Location: ../../inicio/fgtpsw.php?stat=err");
		die();
		$conn->close();
	}
?>