<?php
	include '../Head/conn.php';
?>

<div class='cont'>
		<form action='../Pedidos/editar.php' method='GET'>

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
			<option value='o'>Outro</option>
		</select>
		<br><br>
		
		<a><b>Requisição:</b></a><br>
		
		<input id="rq" pattern='.{4,}' type='text' placeholder='Requisiçao' name='req' required title='Minimo 4 caracteres!'>
		<br><br>
		
		<a><b>Cliente:</b></a><br>
		
		<input id="clnt" type='text' placeholder='Cliente' name='cli' required>
		<br><br>
		
		<a><b>Dimensão:</b></a><br>
		
		<input id="dm" type='text' placeholder='Dimensao' name='dim' required>
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
		<input id="nt" type='text' placeholder='Nota' name='not'>
		<br><br>
		
		<input type="text" style="display:none" name="num" value="<?php echo $_GET['edit']; ?>">
		
		<?php
			if($_GET['src'] == "registo"){
				echo '<input type="text" style="display:none" name="src" value="registo">';
			} else {
				echo '<input type="text" style="display:none" name="src" value="pesquisa">';
			}
		?>
		
		</select>
		<br><br>
		<button class="accbtn" type='submit' name='test' value='Editar'><b>Editar</b></button>
		<script type="text/javascript">
					
			var v = document.getElementById('vidro');
			
			var e = document.getElementById('esp');
			
			var t = document.getElementById('tip');
			
			var c = document.getElementById('clnt');
			
			var d = document.getElementById('dm');
			
			var n = document.getElementById('nt');
			
			var rq = document.getElementById('rq');
			
			var x;
			
			<?php
				$sql = "SELECT vidro, extra, tipo, dim, req, cli, nota FROM registos WHERE num LIKE '".$_GET['edit']."'";
			
				$rr = $conn->query($sql);
							
				while ($r = $rr->fetch_assoc()){
			?>
					var r = <?php echo json_encode($r); ?>;
						
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
						rq.value = r['req'];
						c.value = r['cli'];
						d.value = r['dim'];
						if(r['nota'] != null){
							n.value = r['nota'];
						}
					sort();
			<?php
				}			
			?>
		</script>
		
		
	</form>
	
	<?php
		if($_GET['src'] == "registo"){
			echo '<form action="../Pedidos/rem.php" method="get"><input style="display:none" name="src" value="registo"><button type="submit" class="rembtn" name="rem" value="'.$_GET['edit'].'"><b>Remover</b></button></form><br><br>';
		} else {
			echo '<form action="../Pedidos/rem.php" method="get"><input style="display:none" name="src" value="pesquisa"><button type="submit" class="rembtn" name="rem" value="'.$_GET['edit'].'"><b>Remover</b></button></form><br><br>';
		}
	?>
</div>
