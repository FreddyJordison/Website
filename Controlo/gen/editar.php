<?php
	session_name("controlo");
	session_start();
	
	$_SESSION['page'] = 'Editar Vidro';
	
	include '../Head/conn.php';
	include '../Head/header.php';

			echo("<div class=\"cont\">");
			echo("<form action=\"edit.php\">");
			echo("<a>Carro:</a>");		
			echo("<select class='select' name=\"num\">");
				
			$carro = 14;
			
			$rem = $_GET['rem'];
			
			$sql = "SELECT vidro, carro, lado, requisicao, cliente, medida FROM carro1
			WHERE vidro LIKE '%".$rem."%'";
			
			$res_temp = $conn->query($sql);
			
			$res = $res_temp->fetch_assoc();
			
			for($x = 1; $x <= $carro; $x++) {
				if($x == $res['carro']){
					echo("<option value=\"".$x."\" selected>".$x."</option>");
				} else {
					echo("<option value=\"".$x."\">".$x."</option>");
				}
			}
			
			
			
		
			echo("</select><br><br>");
			echo("<a>Lado:</a>");
			echo("<select class='select' name=\"lad\">");
			
			if($res['lado'] == 'A'){
				echo("<option value=\"A\" selected>A</option>");
				echo("<option value=\"B\">B</option>");
			} else {
				echo("<option value='A'>A</option>");
				echo("<option value='B' selected>B</option>");
			}
			
			echo("</select><br><br><a>Requisição:</a><br>");
			
			echo("<input value='".$res['requisicao']."' pattern='.{4,}' type='text' placeholder='requisiçao' name='req' required title='Minimo 4 caracteres!'><br><br>");
			echo("<a>Cliente:</a><br>");
			echo("<input value='".$res['cliente']."' type='text' placeholder='cliente' name='cliente' required><br><br>");
			echo("<a>Dimensão:</a><br>");
			echo("<input value='".$res['medida']."' type='text' placeholder='dimensao' name='dimensao' required><br><br>");
			echo("<input value='".$rem."' name='rem' style='display: none;'></button>");
			echo("<button type='submit' class='accbtn' value='Adicionar'>Editar</button><br><br>");
			echo("</form></div>");
			
			$conn->close();
	
	include '../Head/foot.php';
?>