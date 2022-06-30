<?php
	session_name("controlo");
	session_start();
	
	$_SESSION['page'] = 'Adicionar Marcação';
		    
	include '../Head/header.php';
 
	include '../Head/conn.php';

	$dt = getdate();
	
	if(!isset($_GET['chg'])){
		echo '<div class="agendaadd">';
		echo '<form action="../agenda/add.php"><br>';
			echo '<a><b>Data:</b></a><br>';
		
			echo '<a style="float: left; margin-left: 10px">Dia:</a><a style="float:right; margin-right: 10px">Mes:</a><br>';
			echo '<select id="day" name="dia" class="selectagnd">';

				for($x=1;$x <= 31; $x++){
					if($x == $dt['mday']){
						echo('<option id="'.$x.'" value="'.$x.'" selected>'.$x.'</option>');
					}else{
						echo('<option id="'.$x.'" value="'.$x.'">'.$x.'</option>');
					}
				}
			
			echo '</select>';
			echo '<select id="mes" name="mes" class="selectagnd" onchange="show(this.value)">';

				for($i=1; $i <= 12; $i++){
					if($i == $dt['mon']){
						echo('<option value="'.$i.'" selected style="display: block">'.$i.'</option>');
					}else{
						echo('<option value="'.$i.'" style="display: block">'.$i.'</option>');
					}
				}

			echo '</select>';
			echo '<script type="text/javascript">';
				echo 'var y = [31,28,31,30,31,30,31,31,30,31,30,31];';
				
				echo 'var m = document.getElementById("mes").value;';
				
				echo 'var d = '.$dt["mday"].';';
				
				echo 'var mon = '.$dt["mon"].';';
				
				echo 'var m1 = document.getElementById("day");';
												
				echo 'for(var o = 0; o <= 31; o++){';
					echo 'if(o > y[m-1]){';
						echo 'm1.options[o].style.display = "none";';
					echo '}}';
				
				echo 'function show(mes){';
					echo 'if(mes == mon){';
						echo 'm1.options[d-1].selected = "selected";';
					echo '}else{';
						echo 'm1.options[0].selected = "selected";}';
				
					echo 'for(var x = 0; x <= 31; x++){';
						echo 'if(m1.options[x].value > y[mes-1]){';
							echo 'm1.options[x].style.display = "none";';
						echo '}else{';
							echo 'm1.options[x].style.display = "block";}}}';
			echo '</script>';

			echo '<br><br>';
			echo '<a><b>Hora Inicio:</b></a><br>';
			echo '<select name="hi" class="selectagnd">';
			
				$x = array("06","07","08","09","10","11","12","13","14","15","16","17","18");

				for($i=0;$i < count($x); $i++){
					echo('<option value="'.$x[$i].'">'.$x[$i].'</option>');
				}
			
			echo '</select>';
			echo '<select name="mi" class="selectagnd">';
				echo '<option value="00">00</option>';
				echo '<option value="30">30</option>';
			echo '</select>';
			echo '<br><br>';
				
			echo '<a><b>Hora Fim:</b></a><br>';
			echo '<select name="hf" class="selectagnd">';
			
				$x = array("06","07","08","09","10","11","12","13","14","15","16","17","18");

				for($i=0;$i < count($x); $i++){
					echo('<option value="'.$x[$i].'">'.$x[$i].'</option>');
				}
			
			echo '</select>';
			echo '<select name="mf" class="selectagnd">';
				echo '<option value="00">00</option>';
				echo '<option value="30">30</option>';
			echo '</select>';
			echo '<br><br>';
			
			echo '<a><b>Cliente:</b></a><br>';
		
			echo '<input type="text" placeholder="Cliente" name="cli" required>';
			echo '<br><br>';
					
			echo '<button type="submit"  class="accbtn" value="Adicionar"><b>Adicionar</b></button><br><br>';

		echo '</form>';
		echo '</div>';
	} else {
		echo '<div class="agendaadd">';
		echo '<form action="../agenda/add.php"><br>';
			echo '<a><b>Data:</b></a><br>';
		
			echo '<a style="float: left; margin-left: 10px">Dia:</a><a style="float:right; margin-right: 10px">Mes:</a><br>';
			echo '<select id="day" name="dia" class="selectagnd">';

				for($x=1;$x <= 31; $x++){
					if($x == $_GET['d']){
						echo('<option id="'.$x.'" value="'.$x.'" selected>'.$x.'</option>');
					}else{
						echo('<option id="'.$x.'" value="'.$x.'">'.$x.'</option>');
					}
				}
			
			echo '</select>';
			echo '<select id="mes" name="mes" class="selectagnd" onchange="show(this.value)">';

				for($i=1; $i <= 12; $i++){
					if($i == $_GET['m']){
						echo('<option value="'.$i.'" selected style="display: block">'.$i.'</option>');
					}else{
						echo('<option value="'.$i.'" style="display: block">'.$i.'</option>');
					}
				}

			echo '</select>';
			echo '<script type="text/javascript">';
				echo 'var y = [31,28,31,30,31,30,31,31,30,31,30,31];';
				
				echo 'var m = document.getElementById("mes").value;';
				
				echo 'var d = '.$dt["mday"].';';
				
				echo 'var mon = '.$dt["mon"].';';
				
				echo 'var m1 = document.getElementById("day");';
												
				echo 'for(var o = 0; o <= 31; o++){';
					echo 'if(o > y[m-1]){';
						echo 'm1.options[o].style.display = "none";';
					echo '}}';
				
				echo 'function show(mes){';
					echo 'if(mes == mon){';
						echo 'm1.options[d-1].selected = "selected";';
					echo '}else{';
						echo 'm1.options[0].selected = "selected";}';
				
					echo 'for(var x = 0; x <= 31; x++){';
						echo 'if(m1.options[x].value > y[mes-1]){';
							echo 'm1.options[x].style.display = "none";';
						echo '}else{';
							echo 'm1.options[x].style.display = "block";}}}';
			echo '</script>';

			echo '<br><br>';
			echo '<a><b>Hora Inicio:</b></a><br>';
			echo '<select name="hi" class="selectagnd">';
			
				$x = array("06","07","08","09","10","11","12","13","14","15","16","17","18");

				for($i=0;$i < count($x); $i++){
					if($x[$i] == $_GET['hi']){
						echo('<option value="'.$x[$i].'" selected>'.$x[$i].'</option>');
					}else{
						echo('<option value="'.$x[$i].'">'.$x[$i].'</option>');
					}
				}
			
			echo '</select>';
			echo '<select name="mi" class="selectagnd">';
				if($_GET['mi'] == "00"){
					echo '<option value="00" selected>00</option>';
					echo '<option value="30">30</option>';
				}else{
					echo '<option value="00">00</option>';
					echo '<option value="30" selected>30</option>';
				}
			echo '</select>';
			echo '<br><br>';
						
			echo '<a><b>Hora Fim:</b></a><br>';
			echo '<select name="hf" class="selectagnd">';

				for($i=0;$i < count($x); $i++){
					if($x[$i] == $_GET['hf']){
						echo('<option value="'.$x[$i].'" selected>'.$x[$i].'</option>');
					}else{
						echo('<option value="'.$x[$i].'">'.$x[$i].'</option>');
					}
				}
			
			echo '</select>';
			echo '<select name="mf" class="selectagnd">';
				if($_GET['mf'] == "00"){
					echo '<option value="00" selected>00</option>';
					echo '<option value="30">30</option>';
				}else{
					echo '<option value="00">00</option>';
					echo '<option value="30" selected>30</option>';
				}
			echo '</select>';
			echo '<br><br>';

	
			echo '<a><b>Cliente:</b></a><br>';
		
			echo '<input type="text" placeholder="Cliente" name="cli" value="'.$_GET['cl'].'" required>';
			echo '<br><br>';
			
			echo '<input type="text" name="edt" value="'.$_GET['ct'].'" style="display: none;">';
					
			echo '<button type="submit"  class="accbtn" value="Confirmar"><b>Confirmar</b></button></form>';
			echo '<form action="../agenda/remover.php" method="post"><button type="submit" class="rembtn" name="rem" value="'.$_GET['ct'].'"><b>Remover</b></button><br><br>';
		echo '</form>';
		echo '</div>';
	}

	include '../Head/foot.php';
?>