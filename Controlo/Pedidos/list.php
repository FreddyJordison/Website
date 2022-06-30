<?php
	include '../Head/conn.php';

?>
	<div class='registob'>
		<form action='../gen/registo.php' method='GET'>

<?php
	$reqs = array();
	
	$sql = "SELECT vidro, tipo, req, dim, cli FROM registos
	WHERE vidro LIKE '%".$temp."%'" or die(mysql_error());
   
	$raw_results = $conn->query($sql);

	if($raw_results->num_rows > 0){

		while($results = $raw_results->fetch_assoc()){
			if(!in_array($results['req'], $reqs)){
				echo("<br><button class='button' type='submit' name='reg' value='".$results['req']."'><b>Req: </b>".$results['req']."</button>");
				array_push($reqs, $results['req']);
			}
		}
	} else {
		echo("<p><a>Não foram encontrados resultados</a></p><br><br>");
	}
	
?>
		<br><button class="button" type="button" onclick="location.href='../gen/registos.php'">Voltar</button>

		</form>
	</div>