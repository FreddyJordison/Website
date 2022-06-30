<?php
	include '../Head/conn.php';
	
	$vidro = $_POST['rem'];
		
	$temp = "DELETE FROM done
		WHERE num = $vidro";
	
	if ($conn->query($temp) === TRUE) {
   		header("Location: ../gen/pesquisar.php");
		die();
	} else {
	    echo "Erro!: " . $conn->error;
	}
	$conn->close();
	
?>