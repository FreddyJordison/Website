<?php
	include '../Head/conn.php';
	
	$id = $_GET['id'];
		
	$temp = "DELETE FROM users
		WHERE id = $id";
	if ($conn->query($temp) === TRUE) {
   		header("Location: gerusr.php?stat=rem");
		die();

	} else {
	    echo "Erro!: " . $conn->error;
	}
	$conn->close();
?>