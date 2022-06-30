<?php
	include '../Head/conn.php';	

	$vidro = $_POST['rem'];
	
	$temp = "DELETE FROM carro1
		WHERE vidro = $vidro";
	
	if ($conn->query($temp) === TRUE) {
   		header("Location: ./pesquisar.php");
		die();
	} else {
	    echo "Erro!: " . $conn->error;
	}
	$conn->close();
?>