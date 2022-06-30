<?php
	include '../Head/conn.php';
?>

<div class='cont'>
	<form action='../gen/registo.php' method='GET'>
		<br>
		<a><b>Vidro:</b></a><br>
		
		<select class="select" id='vidro' name='vidro' onchange="sort()">
			<option value='lami'>Laminado</option>
			<option value='dupl'>Duplo</option>
			<option value='espe'>Espelho</option>
			<option value='4'>4 mm</option>
			<option value='5'>5 mm</option>
			<option value='6'>6 mm</option>
			<option value='8'>8 mm</option>
			<option value='10'>10 mm</option>
			<option value='12'>12 mm</option>
			<option value='15'>15 mm</option>
			<option value='19'>19 mm</option>
			<option value='outr'>Outro</option>
		</select>
		
		<div id="4" style="display:block">
			<br>
			<select id="esp" name='esp' class="select">
				<option value='3'>3 mm</option>
				<option value='4'>4 mm</option>
				<option value='5'>5 mm</option>
				<option value='6'>6 mm</option>
				<option value='8'>8 mm</option>
				<option value='10'>10 mm</option>
				<option value='12'>12 mm</option>
				<option value='16'>16 mm</option>
				<option value='20'>20 mm</option>
				<option value='out'>Outro</option>
			</select>
		</div>

		<script type="application/javascript">
			
			function sort() {
				var index = document.getElementById('vidro').selectedIndex;
				if(index == 0){
					document.getElementById('4').style.display='block';
				} else if(index == 2){
					document.getElementById('4').style.display='block';
				} else {
					document.getElementById('4').style.display='none';
				}
			}
				
		</script>
		<br><br>
		<a><b>Tipo de vidro:</b></a><br>
		
		<select id="tip" name='tipo' class="select">
			<option value='i'>Incolor</option>
			<option value='f'>Fosco</option>
			<option value='g'>Gris</option>
			<option value='b'>Bronze</option>
			<option value='p'>Padrão</option>
			<option value='c'>Neo-cerâmico</option>
			<option value='e'>Extra claro</option>
			<option value="v">Verde</option>
			<option value='o'>Outro</option>
		</select>
		<br><br>
		
		<a><b>Requisição:</b></a><br>
		
		<input onchange="check(this.value)" pattern='.{4,}' type='text' placeholder='Requisiçao' name='req' required title='Minimo 4 caracteres!'>
		<br><br>
		
		<a><b>Cliente:</b></a><br>
		
		<input id="clnt" type='text' placeholder='Cliente' name='cli' required>
		<br><br>
		
		<a><b>Dimensão:</b></a><br>
		
		<input type='text' placeholder='Dimensao' name='dim' required>
		<br><br>
		
		<a><b>Quantidade:</b></a><br>
		<?php
			$qtt = 50;
			echo('<select name="quantt" class="select">');
			for($x = 1; $x <= $qtt; $x++){
				echo('<option value="'.$x.'">'.$x.'</option>');
			}
			
		?>
		<br><br>
		
		<a><b>Nota:</b></a><br>
		<input type='text' placeholder='Nota' name='not'>
		<br><br>
		
		</select>
		<br><br>
		<button class="accbtn" type='submit' name='test' value='Adicionar'><b>Adicionar</b></button>
		<br><br>
		<script type="text/javascript">
					
			var v = document.getElementById('vidro');
			
			var e = document.getElementById('esp');
			
			var t = document.getElementById('tip');
			
			var c = document.getElementById('clnt');
			
			var x;
			
			function check(val){
			<?php
				$sql = "SELECT vidro, extra, tipo, req, cli FROM registos";
			
				$rr = $conn->query($sql);
							
				while ($r = $rr->fetch_assoc()){
			?>
					var r = <?php echo json_encode($r); ?>;
					if(r['req'] == val){
						for(var i = 0; i < 13; i++){
							if(typeof v.options[i] !== 'undefined' && r['vidro'] == v.options[i].value){
								v.options[i].selected = 'selected';
							}
							if(typeof e.options[i] !== 'undefined' && r['extra'] == e.options[i].value){
								e.options[i].selected = 'selected';
							}
							if(typeof t.options[i] !== 'undefined' && r['tipo'] == t.options[i].value){
								t.options[i].selected = 'selected';
							}
						}
						c.value = r['cli'];
					}
					sort();
			<?php			
				}
			?>
			}
		</script>
		
		
	</form>
</div>
    
