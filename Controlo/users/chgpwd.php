<?php
	session_name("controlo");
	session_start();

	include '../Head/conn.php';
	
	$user = md5($_SESSION['name'],false);
	
	$psw = $_REQUEST['psw'];
	
	$psw1 = $_REQUEST['psw1'];
	
	$pwd = $_REQUEST['pwd'];
		
	$sql = "SELECT id, user, pass, level FROM users
	WHERE userh LIKE '%".$user."%'" or die(mysql_error());
	
	$raw_results = $conn->query($sql);
	if($raw_results->num_rows > 0){
		$results = $raw_results->fetch_assoc();			
		
		if(md5($pwd,false) != $results['pass']){
			echo '<form id="pws" action="pwd.php" method="post">';
				echo '<input type="hidden" name="stat" value="err2">';
			echo '</form>';
				
			echo '<script>document.getElementById("pws").submit();</script>';
			die();
			$conn->close();
		}elseif(md5($psw,false) == $results['pass']){
			echo '<form id="pws" action="pwd.php" method="post">';
				echo '<input type="hidden" name="stat" value="err1">';
			echo '</form>';
				
			echo '<script>document.getElementById("pws").submit();</script>';
			die();
			$conn->close();
		}elseif($psw != $psw1){
			echo '<form id="pws" action="pwd.php" method="post">';
				echo '<input type="hidden" name="stat" value="err3">';
			echo '</form>';
				
			echo '<script>document.getElementById("pws").submit();</script>';
			die();
			$conn->close();
		}elseif(md5($pwd,false) == $results['pass'] && $psw1 == $psw){
			$psw = md5($psw,false);
				
			$sql = "UPDATE users SET pass = '$psw'
			WHERE id LIKE '%".$results['id']."%'" or die(mysql_error());
			
			$conn->query($sql);						
				
			echo '<form id="pws" action="pwd.php" method="post">';
				echo '<input type="hidden" name="stat" value="succ">';
			echo '</form>';
				
			echo '<script>document.getElementById("pws").submit();</script>';
			die();
			$conn->close();

		}
	}else{
		header("Location: ../../inicio/Login.php?stat=err");
		die();
		$conn->close();
	}
?>
