<?php

include '../Head/conn.php';

$rem = $_GET['rem']; 
$num = mysqli_real_escape_string($conn, $_REQUEST['num']);
$lad = mysqli_real_escape_string($conn, $_REQUEST['lad']);
$req = mysqli_real_escape_string($conn, $_REQUEST['req']);
$cliente = mysqli_real_escape_string($conn, $_REQUEST['cliente']);
$medida = mysqli_real_escape_string($conn, $_REQUEST['dimensao']);


$sql = "UPDATE Carro1 SET carro = '$num', lado = '$lad', requisicao = '$req', cliente = '$cliente', medida = '$medida' WHERE vidro = $rem";

if ($conn->query($sql) === TRUE) {
    header("Location: ./pesquisar.php");
    die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>