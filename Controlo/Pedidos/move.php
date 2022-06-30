<?php
	include '../Head/conn.php';
	
	$temp = $_GET['done'];
	
	$sql = "SELECT num, vidro, extra, tipo, req, dim, cli FROM registos
	WHERE num LIKE '".$temp."'" or die(mysql_error());

	$raw_results = $conn->query($sql);
	
	$temp = $raw_results ->fetch_assoc();
	
	$num = $temp['num'];
	$vidro = $temp['vidro'];
	$extra = $temp['extra'];
	$tipo = $temp['tipo'];
	$req = $temp['req'];
	$cli = $temp['cli'];
	$dim = $temp['dim'];
	
	$raw_date = getdate();
	
	$date = $raw_date['mday']."/".$raw_date['mon']."/".$raw_date['year'];
	

	$sql = "INSERT INTO done (vidro, extra, tipo, req, cli, dim, data)
	VALUES ('$vidro', '$extra', '$tipo', '$req', '$cli', '$dim', '$date')";	
	$conn->query($sql);
   	
   	$sql = "DELETE FROM registos
   		WHERE num = $num";
   		
   	if ($conn->query($sql) === TRUE) {
		if($_GET['src'] == "registo"){
			echo '<form id="pws" action="../gen/registo.php" method="post">';
				echo '<input type="hidden" name="reg" value="'.$temp['req'].'">';
			echo '</form>';
	
			echo '<script>document.getElementById("pws").submit();</script>';
			die();
   	} else {
   			echo '<form id="pws" action="./pesquisar.php" method="post">';
			echo '</form>';
	
			echo '<script>document.getElementById("pws").submit();</script>';
			die();
		}
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();

?>