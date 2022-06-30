<html lang="pt-pt">
	<head lang="pt-pt">
	 <?php
		echo('<title>'.$_SESSION['page'].'</title>');
		
		if(basename($_SERVER['PHP_SELF']) != "Login.php" && basename($_SERVER['PHP_SELF']) != "psw.php" && !isset($_SESSION['name'])){
			header("Location: ../../inicio/Login.php");
		}
		
	?>
		<link rel="shortcut icon" href='../imagens/favicon.ico' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../CSS/dropdown.css">
		<link rel="stylesheet" type="text/css" href="../CSS/Controlo.css">
		<link rel="stylesheet" type="text/css" href="../CSS/header.css">
		<link rel="stylesheet" type="text/css" href="../CSS/consulta.css">
		<link rel="stylesheet" type="text/css" href="../CSS/registo.css">
		<link rel="stylesheet" type="text/css" href="../CSS/content.css">
		<link rel="stylesheet" type="text/css" href="../CSS/agenda.css">
		<link rel="stylesheet" type="text/css" href="../CSS/login.css">
		<link rel="manifest" href="../manifest.json">
		<meta name="theme-color" content="#ffffff">
	</head>
	<body>
		
		<?php
			if(isset($_SESSION['name'])){
				echo '<div class="headertab1">';
					echo '<div class="id">';
						echo '<button onclick="func()" class="menu">'.$_SESSION['name'].'</button>';
					
						echo '<div id="menu" class="dd">';
							echo'<a href="../users/edit.php?type=pwd">Alterar<br>palavra-passe</a';
				
							if($_SESSION['perm'] == 1){
								echo '><a href="../users/edit.php?type=ger">Gerir utilizadores</a';
							}
					
				
							echo '><a href="../users/edit.php?type=exit">Terminar sessão</a>';
						echo '</div>';
				
					echo'</div>';
				echo'</div>';
			}
		?>

		<img alt="home" id="bgi" src="../imagens/btempra1.png" title="Início" onclick="redir()"/>
		<img alt="home" id="bgi1" src="../imagens/btempra.png" title="Início" onclick="redir()"/>
		
		<?php 
			if(isset($_REQUEST['psw'])){
				echo'<div class="err">Recomendamos que altere a sua palavra-passe</div>';
			}
		?>
		
		<div class="headertab">
			<div class="dropdown"><div class="home"><button onclick="location.href='../gen/inicio.php'" class="home1">Início</button></div></div>
			<div class="dropdown">
   				<button onclick="myFunction()" class="dropbtn">Pedidos</button>
   			
				<div id="myDropdown" class="dropdown-content">
					<a href="../gen/registos.php">Por executar</a>
					<a href="../gen/registo.php?vidro=add">Adicionar</a>
				</div>
			</div
			
			><div class="dropdown"
				><button onclick="location.href = '../gen/consulta.php'" class="dropbtn1">Consultar Carros</button
			></div
			
			><div class="dropdown"
				><button onclick="function1()" class="dropbtn2">Agenda</button
				
				><div id="agenda" class="dropdown-content1"
					><a href="../gen/agenda.php">Hoje</a
					><a href="../gen/agndadd.php">Adicionar marcação</a
					><a href="../agenda/cons.php">Consultar</a
				></div
		
			></div
			
			><div class="search">
				<form action="../gen/pesquisar.php" method="get">
					
					<?php
						if(isset($_GET['Pesquisa'])){
      						echo '<input type="text" placeholder="Pesquisar..." name="Pesquisa" id="1" value="'.$_GET['Pesquisa'].'">';
      					}else{
							echo '<input type="text" placeholder="Pesquisar..." name="Pesquisa" id="1">';
						}
					?>
      				<button type="submit" value="1">

					<img alt="pesquisa" src="../imagens/search.png" height="20" width="20"/></button>

    			</form>
    			<br>
    		</div
   		></div><br><br>
		
		<script>
			/* When the user clicks on the button, 
			toggle between hiding and showing the dropdown content */
			function func(){
				document.getElementById("menu").classList.toggle("show");

			}
			
			function myFunction() {
			  document.getElementById("myDropdown").classList.toggle("show");
			}
			
			function function1(){
				document.getElementById("agenda").classList.toggle("show");
			}
		
			// Close the dropdown if the user clicks outside of it
			window.onclick = function(event) {
			  if (!event.target.matches('.dropbtn')) {
			    var dropdowns = document.getElementsByClassName("dropdown-content");
			    var i;
			    for (i = 0; i < dropdowns.length; i++) {
			      var openDropdown = dropdowns[i];
			      if (openDropdown.classList.contains('show')) {
			        openDropdown.classList.remove('show');
			      }
			    }
			  }
			  if (!event.target.matches('.dropbtn2')) {
				var dropdowns = document.getElementsByClassName("dropdown-content1");
				var i;
			    for (i = 0; i < dropdowns.length; i++) {
			      var openDropdown = dropdowns[i];
			      if (openDropdown.classList.contains('show')) {
			        openDropdown.classList.remove('show');
			      }
			    }
			  }
			  if (!event.target.matches('.menu')) {
				var dropdowns = document.getElementsByClassName("dd");
				var i;
			    for (i = 0; i < dropdowns.length; i++) {
			      var openDropdown = dropdowns[i];
			      if (openDropdown.classList.contains('show')) {
			        openDropdown.classList.remove('show');
			      }
			    }
			  }

			}
						
			function redir(){
				window.location.href = "../../inicio/main.php"
			}
			
		</script>