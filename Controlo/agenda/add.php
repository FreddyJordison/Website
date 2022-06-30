<?php	
	include '../Head/conn.php';
	
	$dt = getdate();
?>

		
<?php
	$dia = mysqli_real_escape_string($conn, $_REQUEST['dia']);
	$mes = mysqli_real_escape_string($conn, $_REQUEST['mes']);
	$ano = $dt['year'];
	$hi = mysqli_real_escape_string($conn, $_REQUEST['hi']);
	$mi = mysqli_real_escape_string($conn, $_REQUEST['mi']);
	$cli = mysqli_real_escape_string($conn, $_REQUEST['cli']);
	$hf = mysqli_real_escape_string($conn, $_REQUEST['hf']);
	$mf = mysqli_real_escape_string($conn, $_REQUEST['mf']);
	
	
	if(!isset($_GET['edt'])){	
		$sql = "INSERT INTO agenda (dia, mes, ano, hi, mi, cli, hf, mf)
		VALUES ('$dia', '$mes', '$ano', '$hi', '$mi', '$cli', '$hf', '$mf')";
	
		$conn->query($sql);
	
		header("Location: ../gen/agndadd.php");
		die();
	}else{
		$cnt = $_REQUEST['edt'];
		
		$sql = "UPDATE agenda SET dia = '$dia', mes = '$mes', ano = '$ano', hi = '$hi', mi = '$mi', cli = '$cli', hf = '$hf', mf = '$mf' WHERE count = $cnt";

		$conn->query($sql);
		header("Location: ../gen/agenda.php");
		die();
	}
	$conn->close();
?>

