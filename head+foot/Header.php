<!DOCTYPE html>
<html lang="pt-pt">
<head>
	<?php	
		echo('<title>'.$_SESSION['page'].'</title>');
	?>

	<link rel="shortcut icon" href='../inicio/favicon.ico' />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../CSS/Background.css">
	<link rel="stylesheet" type="text/css" href="../CSS/footer.css">
	<link rel="stylesheet" type="text/css" href="../CSS/header.css">
	<link rel="stylesheet" type="text/css" href="../CSS/content.css">
	<link rel="stylesheet" type="text/css" href="../CSS/submenus.css">
	<link rel="stylesheet" type="text/css" href="../CSS/login.css">
	<link rel="manifest" href="../manifest.json">
</head>
<body
	
	><?php	
		if (isset($_GET['index'])){
			echo('<div id="cv"');
			echo('><video playsinline autoplay muted id="bg" onclick="redir()"');
			echo('><source src="../imagens/anim/btvid.webm" type="video/webm"');
			echo('></video');
			echo('></div>');
		}		
		
		if(basename($_SERVER['PHP_SELF']) == "main.php"){
			echo '<div style="width: 100%; height: 20px"></div>';
		} else {
			echo('<img alt="home" id="bgi" src="../imagens/btempra1.png" title="Início" onclick="redir()"/><img alt="home" id="bgi1" src="../imagens/btempra.png" title="Início" onclick="redir()"/>');
		}
		
	?>
	
<script>function redir(){window.location.href = "../inicio/main.php"}</script>

	<?php	
		if (isset($_GET['index'])){
			echo('<script>');
			echo('var x = setTimeout(function(){');
			echo('document.getElementById("cv").style.display = "none";');
			echo('document.getElementById("bg").style.display = "none";');
			echo('document.getElementById("cv").style.width = "0";');
			echo('document.getElementById("cv").style.height = "0";');
			echo('},1900);');
			echo('</script>');
		}
	?>
	
<div id="pgcont">