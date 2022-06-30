<?php
	include '../Head/conn.php';

	$vidro = $_POST['rem'];
	
	$temp = "DELETE FROM agenda
		WHERE count = $vidro";
	
	if ($conn->query($temp) === TRUE) {
   		header("Location: ../gen/agenda.php");
		die();
	} else {
	    echo "Erro!: " . $conn->error;
	}
	$conn->close();
	
?>