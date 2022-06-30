<?php

include '../Head/conn.php';


$num = mysqli_real_escape_string($conn, $_REQUEST['num']);
$lad = mysqli_real_escape_string($conn, $_REQUEST['lad']);
$req = mysqli_real_escape_string($conn, $_REQUEST['req']);
$cliente = mysqli_real_escape_string($conn, $_REQUEST['cliente']);
$medida = mysqli_real_escape_string($conn, $_REQUEST['dimensao']);


$sql = "INSERT INTO Carro1 (carro, lado, requisicao, cliente, medida)
VALUES ('$num', '$lad', '$req', '$cliente', '$medida')";

if ($conn->query($sql) === TRUE) {
    header("Location: ./inicio.php");
    die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

