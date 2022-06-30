<?php
	session_name("controlo");
 	session_start();
 	
 	if (!is_writable(session_save_path())) {
	    echo 'Session path "'.session_save_path().'" is not writable for PHP!'; 
	}
	
	if (isset($_SESSION['query'])) {
		unset($_SESSION['query']);
	}
	
	$_SESSION['page'] = 'Inicio';

	include '../head/header.php';
	
	
?>
			    	
    	<div class="cont">
    	
		<form action="add.php">
			<br>
			<a><b>Carro:</b></a><br>
		
			<select name="num" class="select">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
			</select>
			<br><br>
			<a><b>Lado:</b></a><br>
		
			<select name="lad" class="select">
				<option value="A">A</option>
				<option value="B">B</option>
			</select>
			<br><br>
		
			<a><b>Requisição:</b></a><br>
		
			<input pattern=".{4,}" type="text" placeholder="Requisiçao" name="req" required title="Minimo 4 caracteres!">
			<br><br>
		
			<a><b>Cliente:</b></a><br>
		
			<input type="text" placeholder="Cliente" name="cliente" required>
			<br><br>
		
			<a><b>Dimensão:</b></a><br>
		
			<input type="text" placeholder="Dimensao" name="dimensao" required>
			<br>
			<br>
			
			<button type="submit"  class="accbtn" value="Adicionar"><b>Adicionar</b></button>
			<br>
			<br>
		</form>
		</div>

<?php
	include '../Head/foot.php';
?>
