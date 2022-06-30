<?php
	include '../Head/conn.php';

	$vidro = mysqli_real_escape_string($conn, $_REQUEST['vidro']);
	$extra = mysqli_real_escape_string($conn, $_REQUEST['esp']);
	$tipo = mysqli_real_escape_string($conn, $_REQUEST['tipo']);
	$req = mysqli_real_escape_string($conn, $_REQUEST['req']);
	$cli = mysqli_real_escape_string($conn, $_REQUEST['cli']);
	$dim = mysqli_real_escape_string($conn, $_REQUEST['dim']);
	$qtt = mysqli_real_escape_string($conn, $_REQUEST['quantt']);
	$nt = mysqli_real_escape_string($conn, $_REQUEST['not']);


	for($x = 1; $x <= $qtt; $x++){
		
		$sql = "INSERT INTO registos (vidro, extra, tipo, req, cli, dim, nota)
		VALUES ('$vidro', '$extra', '$tipo', '$req', '$cli', '$dim', '$nt')";
	
		$conn->query($sql);
	   		
	}
	
	echo '<form id="pws" action="../gen/registos.php" method="post">';
		echo '<input type="hidden" name="vidro" value="add">';
		echo '<input type="hidden" name="status" value="succ">';
	echo '</form>';
	
	echo '<script>document.getElementById("pws").submit();</script>';
	die();
	$conn->close();
?>