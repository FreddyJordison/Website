<?php
	session_name("controlo");
	session_start();
	
	if(isset($_GET['vidro']) && $_GET['vidro'] == "add"){
		$_SESSION['page'] = "Adicionar Novo";
	} else if(isset($_GET['vidro'])){
		$_SESSION['page'] = "Consulta ".$_GET['vidro'];
	} else if(isset($_REQUEST['reg'])){
		$_SESSION['page'] = "Consulta ".$_REQUEST['reg'];
	} else {
		$_SESSION['page'] = "Consultar Pedidos";
	}
	
	include '../Head/conn.php';
	
	include '../Head/header.php';
	
	if(isset($_GET['vidro'])){
		$temp = $_GET['vidro'];
	
		$temp = htmlspecialchars($temp);
	         
		$temp = mysqli_real_escape_string($conn, $temp);
	}
	
	if(isset($_GET['done'])){
	
		include '../Pedidos/move.php';
		
	} else if(isset($temp) && $temp == "add"){
	
		include '../Pedidos/add.php';
		
	} else if(isset($_REQUEST['test'])){
	
		include '../Pedidos/insert.php';
		
	} else if(isset($_REQUEST['reg'])) {
	
		include '../Pedidos/show.php';

	} else if(isset($_GET['edit'])){
	
		include '../Pedidos/edit.php';
	
	} else {
	
		include '../Pedidos/list.php';
	}
	
	$conn->close();

	include '../Head/foot.php';
?>    