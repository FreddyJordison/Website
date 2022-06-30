<?php
	session_name("controlo");
	session_start();
	
	if(isset($_POST['subm'])){
		$_SESSION['subm'] = $_POST['subm'];
	}
	if(isset($_GET['subm'])){
		$_SESSION['subm'] = $_GET['subm'];
	}
	
	
	
	if(isset($_SESSION['subm'])){
		if($_SESSION['subm'] == "1"){
			$_SESSION['page'] = 'Sobre';
			include '../head+foot/Header.php';
			include'outro/sobre.php';
		}elseif($_SESSION['subm'] == "2"){
			$_SESSION['page'] = 'Blog';		
			include'outro/blog.php';
		}elseif($_SESSION['subm'] == "3"){
			$_SESSION['page'] = 'Contactos';
			include '../head+foot/Header.php';
			include'outro/contactos.php';
		}elseif($_SESSION['subm'] == "4"){
			$_SESSION['page'] = 'Adicionar entrada';
			include '../head+foot/Header.php';
			include'outro/blogn.php';
		}
	}
?>

<?php
	include '../head+foot/foot.php';
?>