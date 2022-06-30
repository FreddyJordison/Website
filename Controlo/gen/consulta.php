<?php
	session_name("controlo");
	session_start();
	
	$_SESSION['page'] = 'Consultar Carros';
	include '../Head/conn.php';

	include '../Head/header.php';
			
			if(isset($_SESSION['carro'])){
				unset($_SESSION['carro']);
			}

			$carro = 14;
			$numA = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
			$numB = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
						
			$sql = "SELECT carro, lado FROM Carro1";
			
			$res_temp = $conn->query($sql);
			
			
			while($res = $res_temp->fetch_assoc()){
				for($x = 0; $x < $carro; $x++){
					if($res['carro'] == $x+1 && $res['lado'] == "A") {
						$numA[$x]++;
						break;
					} else if($res['carro'] == $x+1 && $res['lado'] == "B") {
						$numB[$x]++;
						break;
					}
				}
			}
			echo '<div style="display:block; float:left;">';
			echo '<a><img style="height: 15px; width: 15px; margin-left: 5px;" alt="cheio" src="../imagens/cheio.png"/> Ocupado</a><br>';
			echo '<a><img style="height: 15px; width: 15px; margin-left: 5px;" alt="vazio" src="../imagens/vazio.png"/> Livre</a>';
			echo '</div>';
			
			echo "<div class='veri'>";
			for($x = 0; $x < $carro; $x++){
				echo("<form action='../gen/pesquisar.php' method='GET'><button type='submit' class='button' value='".($x+1)."' name='carro'><b>Carro ".($x+1)."</b></button></form>");
				echo("<p>Lado A | Lado B</p>");
				if($numA[$x] > 0) {
					echo("<a href='../gen/pesquisar.php?carro=".($x+1)."&lado=A' style='float: none; margin: 0 auto;'><img alt='cheio' src='../imagens/cheio.png'/></a>  ");
				} else {
					echo("<img alt='vazio' src='../imagens/vazio.png'/>  ");
				}
					
				if($numB[$x] > 0) {
					echo("  <a href='../gen/pesquisar.php?carro=".($x+1)."&lado=B' style='float: none; margin: 0 auto;'><img alt='cheio' src='../imagens/cheio.png'/></a>");
				} else {
					echo("  <img alt='vazio' src='../imagens/vazio.png'/>");
				}
			}
			
			echo("</div>");
												
			$conn->close();

	include '../Head/foot.php';
?>    
