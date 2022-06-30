<?php
	session_name('controlo');
	session_start();
	
	header("Location: ../inicio/main.php");
	unset($_SESSION['name']);
	unset($_SESSION['perm']);
?>
