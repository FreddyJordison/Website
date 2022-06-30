<?php
	include '../Head/conn.php';
	
	$vidro = $_GET['rem'];
		
	$temp = "DELETE FROM registos
		WHERE num = $vidro";
	if ($conn->query($temp) === TRUE) {
   		if($_GET['src'] == "registo"){
   			header("Location: ../gen/registos.php");
			die();
		} else {
			header("Location: ../gen/pesquisar.php");
			die();
		}
	} else {
	    echo "Erro!: " . $conn->error;
	}
	$conn->close();
?>