<?php
	include '../Head/conn.php';
	
	$temp = mysqli_real_escape_string($conn, $_REQUEST['reg']);
		
	$sql = "SELECT num, vidro, extra, tipo, req, dim, cli, nota FROM registos
	WHERE req LIKE '%".$temp."%'" or die(mysql_error());	
		
	$raw_results = $conn->query($sql);
		
	if($raw_results->num_rows > 0){
		echo("<div class='registo'>");
		$temp = $raw_results->fetch_assoc();
		$_SESSION['vidro'] = $temp['vidro'];
		switch($temp['tipo']){
			case "i":
				$type = "Incolor";
				break;
			case "f":
				$type = "Fosco";
				break;
			case "g":
				$type = "Gris";
				break;
			case "b":
				$type = "Bronze";
				break;
			case "p":
				$type = "Padrão";
				break;
			case "c":
				$type = "Neo-cerâmico";
				break;
			case "e":
				$type = "Extra Claro";
				break;
			case "v":
				$type = "Verde";
				break;
			case "o":
				$type = "Outro";
				break;
		}
		if($temp['vidro'] == 'lami'){
			echo("<h2><b>Laminado</b><br><b>Requisição: </b>".$temp['req']."<br><b>Cliente: </b>".$temp['cli']."<br><b>Tipo de Vidro: </b>".$type."<br><b>Espessura: </b>".$temp['extra']." mm</h2><br>");
		} else if($temp['vidro'] == 'espe'){
			echo("<h2><b>Espelho</b><br><b>Requisição: </b>".$temp['req']."<br><b>Cliente: </b>".$temp['cli']."<br><b>Tipo de Vidro: </b>".$type."<br><b>Espessura: </b>".$temp['extra']." mm</h2><br>");
		} else if($temp['vidro'] == 'dupl'){
			echo("<h2><b>Duplo</b><br><b>Requisição: </b>".$temp['req']."<br><b>Cliente: </b>".$temp['cli']."<br><b>Tipo de Vidro: </b>".$type."</h2><br>");
		} else if($temp['vidro'] == 'outr'){
			echo("<h2><b>Outro</b><br><b>Requisição: </b>".$temp['req']."<br><b>Cliente: </b>".$temp['cli']."<br><b>Tipo de Vidro: </b>".$type."</h2><br>");
		} else {
			echo("<h2><b>".$temp['vidro']." mm</b><br><b>Requisição: </b>".$temp['req']."<br><b>Cliente: </b>".$temp['cli']."<br><b>Tipo de Vidro: </b>".$type."</h2><br>");
		}
		if($temp['nota'] != null){
			echo("<p><b>Nota: </b>".$temp['nota']."</p>");
		}
		echo("<p style='display: inline-block'><b> Dimensão: </b>".$temp['dim']."  </p><br>");
		echo("<button type='button' style='display:inline-block;width: 25%;' class='accbtn' value='".$temp['num']."' onclick='Feito(this.value);'>Feito</button> ");
		echo(" <button type='button' style='display:inline-block;width: 25%;' class='editbtn' value='".$temp['num']."' onclick='Editar(this.value);'>Editar</button><br><br>");
		
		while($results = $raw_results->fetch_assoc()){
			if($results['nota'] != null){
				echo("<p><b>Nota: </b>".$results['nota']."</p>");
			}
	
			echo("<p style='display: inline-block'><b> Dimensão: </b>".$results['dim']."</p><br>");
			echo("<button type='button' style='display:inline-block;width: 25%;' class='accbtn' value='".$results['num']."' onclick='Feito(this.value);'>Feito</button> ");
			echo(" <button type='button' style='display:inline-block;width: 25%;' class='editbtn' value='".$results['num']."' onclick='Editar(this.value);'>Editar</button><br><br>");

		}
		echo("</div>");
	} else {
		
		echo("<p><a>Não foram encontrados resultados</a></p><br><br>");
			
	}
	
	echo("<br><button class='but' type='button' value='".$_SESSION['vidro']."' onclick='Voltar(this.value)'>Voltar</button>");

	
?>


<script type="text/javascript">
	function Feito(val){
		window.location.href = "./registo.php?done="+val+"&src=registo";
	}
	
	function Editar(val){
		window.location.href = "./registo.php?edit="+val+"&src=registo";
	}
	
	function Voltar(val){
		window.location.href = "./registo.php?vidro="+val;
	}

</script>

