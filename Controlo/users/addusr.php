<?php
	include '../Head/conn.php';

	$user = mysqli_real_escape_string($conn, $_POST['usr']);
	$mail = mysqli_real_escape_string($conn, $_POST['mail']);
	$lvl = mysqli_real_escape_string($conn, $_POST['lvl']);
	$pswrd = md5("tempra",false);
	$userh = md5($user, false);
		
	$sql = "INSERT INTO users (user, pass, mail, level, userh)
	VALUES ('$user', '$pswrd', '$mail', '$lvl', '$userh')";
	
	$conn->query($sql);
	
	echo '<form id="pws" action="newmmbr.php" method="post">';
		echo '<input type="hidden" name="stat" value="succ">';
	echo '</form>';
	
	echo '<script>document.getElementById("pws").submit();</script>';
	die();
	$conn->close();
?>