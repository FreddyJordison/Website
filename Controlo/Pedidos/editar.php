<?php

include '../Head/conn.php';

	$num = mysqli_real_escape_string($conn, $_REQUEST['num']);
	$vidro = mysqli_real_escape_string($conn, $_REQUEST['vidro']);
	$extra = mysqli_real_escape_string($conn, $_REQUEST['esp']);
	$tipo = mysqli_real_escape_string($conn, $_REQUEST['tipo']);
	$req = mysqli_real_escape_string($conn, $_REQUEST['req']);
	$cli = mysqli_real_escape_string($conn, $_REQUEST['cli']);
	$dim = mysqli_real_escape_string($conn, $_REQUEST['dim']);
	$qtt = mysqli_real_escape_string($conn, $_REQUEST['quantt']);
	$nt = mysqli_real_escape_string($conn, $_REQUEST['not']);

$sql = "UPDATE registos SET vidro = '$vidro', extra = '$extra', tipo = '$tipo', req = '$req', cli = '$cli', dim = '$dim', nota = '$nt' WHERE num = $num";

if ($conn->query($sql) === TRUE) {
	if($_GET['src'] == "registo"){
		header("Location: ../gen/registo.php?reg=".$req);
		die();
	} else {
		header("Location: ../gen/pesquisar.php");
		die();
	}
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>