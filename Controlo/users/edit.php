<?php
	session_name("controlo");
 	session_start();
	
	if($_REQUEST['type'] == "exit"){
	
		header("Location: ../../inicio/Login.php");
		unset($_SESSION['name']);
		unset($_SESSION['perm']);
	
	}elseif($_REQUEST['type'] == "pwd"){
	
		header("Location: pwd.php");
		
	}elseif($_REQUEST['type'] == "ger"){
	
		header("Location: gerusr.php");
	
	}


?>
