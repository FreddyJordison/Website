<?php
	session_name("controlo");
	session_start();
	
	$_SESSION['page'] = 'Login';
	include '../Controlo/Head/conn.php';
	include '../head+foot/Header.php';
	
	if(isset($_SESSION['name'])){
		header("Location: ../Controlo/gen/inicio.php");
	}
	
	if(isset($_GET['stat'])){
		if($_GET['stat'] == "err"){
			echo "<div class='err'>Palavra-passe ou nome de utilizador errado</div>";
		}else{
			echo "<div class='sucss'>Palavra-passe definida com sucesso</div>";
		}
  	}
?>	

	
	<br><br>
	<div class="login">
	
		<form action="../Controlo/Head/login.php" method="post">
		
			<div class="container">
				<label for="uname"><b>Utilizador</b></label>
				<input type="text" placeholder="Inserir nome de utilizador" name="uname" required>
	
				<label for="psw"><b>Palavra-passe</b></label>
				<input type="password" placeholder="Inserir palavra-passe" name="psw" required>

				<button type="submit">Iniciar sessão</button>
				<label>
					<input type="checkbox" checked="checked" name="remember"> Lembrar-me
				</label>
			
				<div class="container">
					<span class="psw">Esqueci a <a href="fgtpsw.php">palavra-passe!</a></span>
				</div><br>
				<?php
					if (isset($_GET['main'])) {
						echo '<input type="hidden" name="main"></input>';
					}
				?>
			</div>

		
		</form>
	
		<form action="../Controlo/Head/acesso.php" method="post">
	
			<br><label>Ou</label><br><br>
			
			<div class="container">
				<label for="access"><b>Código de acesso</b></label>
				<input type="text" placeholder="Código de acesso" name="access" required>
			
				<button type="submit">Entrar</button>

			</div>
					
		</form>
	</div>
<?php
	include '../Controlo/Head/foot.php';
?>
