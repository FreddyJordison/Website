<?php
	session_name("controlo");
 	session_start();

	include '../Head/header.php';
	if(isset($_REQUEST['stat'])){
		$stt = $_REQUEST['stat'];
			
		if($stt == "succ"){
			echo '<div class="sucss">Palavra-passe alterada com sucesso</div>';
		}elseif($stt == "err1"){
			echo '<div class="err">Palavra-passe não pode ser igual à antiga</div>';
		}elseif($stt == "err2"){
			echo '<div class="err">Palavra-passe antiga não está correcta</div>';
		}elseif($stt == "err3"){
			echo '<div class="err">Palavras-passe novas não correspondem</div>';
		}
	}		
?>		
	<div class="login">
	
		<form action="chgpwd.php" method="post" style="border: none">
		
			<div class="container">
				<label for="pwd"><b>Palavra-passe antiga</b></label>
				<input type="password" placeholder="Inserir palavra-passe antiga" name="pwd" required>
	
				<label for="psw"><b>Palavra-passe nova</b></label>
				<input type="password" placeholder="Inserir nova palavra-passe" name="psw" required>
				
				<input type="password" placeholder="Repetir palavra-passe" name="psw1" required>

				<button type="submit">Alterar palavra-passe</button>
			
			</div>
		
		</form>
			
	</div>

<?php
	include '../Head/foot.php';		
?>