<?php
	session_name("controlo");
	session_start();
	
	$_SESSION['page'] = 'Pedidos';

	include '../Head/header.php';
?>
	<div class="registo">
		<form action="registo.php" method="GET">

			<button type="submit" name="vidro" value="lami"><b>Laminados</b></button><br><br>

			<button type="submit" name="vidro" value="dupl"><b>Duplos</b></button><br><br>

			<button type="submit" name="vidro" value="espe"><b>Espelhos</b></button><br><br>

			<button type="submit" name="vidro" value="4"><b>4 mm</b></button><br><br>

			<button type="submit" name="vidro" value="5"><b>5 mm</b></button><br><br>

			<button type="submit" name="vidro" value="6"><b>6 mm</b></button><br><br>

			<button type="submit" name="vidro" value="8"><b>8 mm</b></button><br><br>

			<button type="submit" name="vidro" value="10"><b>10 mm</b></button><br><br>

			<button type="submit" name="vidro" value="12"><b>12 mm</b></button><br><br>

			<button type="submit" name="vidro" value="15"><b>15 mm</b></button><br><br>

			<button type="submit" name="vidro" value="19"><b>19 mm</b></button><br><br>

			<button type="submit" name="vidro" value="outr"><b>Outro</b></button><br><br>
			
		</form>
	</div>
<?php
	include '../Head/foot.php';
?>





