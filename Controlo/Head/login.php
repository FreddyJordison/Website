<?php
	session_name("controlo");
	session_start();
	
	include '../Head/conn.php';
	
	$user = md5($_POST['uname'],false);
	
	$psw = $_POST['psw'];
	
	$sql = "SELECT * FROM users
	WHERE userh LIKE '%".$user."%'" or die(mysql_error());
	
	$raw_results = $conn->query($sql);
	
	if($raw_results->num_rows > 0){
		while($results = $raw_results->fetch_assoc()){
		
			if(md5($psw,false) === $results['pass']){
				$_SESSION['name'] = $results['user'];
				$_SESSION['perm'] = $results['level'];
			
				if(isset($_POST['main'])){
					header("Location: ../../inicio/main.php");
				}elseif($results['pass'] == md5("tempra",false)){
					header("Location: ../gen/inicio.php?psw=err");
				}else{
					header("Location: ../gen/inicio.php");
				}
				die();
				$conn->close();
			}else{
				header("Location: ../../inicio/Login.php?stat=err");
				die();
				$conn->close();
			}
		}
	}else{
		header("Location: ../../inicio/Login.php?stat=err&".$user);
		die();
		$conn->close();
	}
?>