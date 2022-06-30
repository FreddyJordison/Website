<?php
	include '../head+foot/Header.php';
	include '../head+foot/conn.php';
?>

<script>
	
	

	function edit(id) {
		window.location.href="outro.php?subm=4&edit=true&id=" + id;
	}
	
	function dlt(id) {
		var r = confirm("Deseja eliminar a publicação?");
		if (r == true) {
			window.location.href="outro.php?subm=2&dlt=true&id=" + id;
		}
	}
</script>



<?php
	
	if(isset($_GET['dlt'])){
		$id = $_GET['id'];
	
		$sql = "DELETE FROM blog WHERE id = $id";
		
		$conn->query($sql);
		
		echo $id;
		
		$_SESSION['subm'] = "2";

		header("Location:outro.php");
		die();
		$conn->close();
	}elseif(isset($_POST['edit'])){
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$cont = mysqli_real_escape_string($conn, $_POST['cont']);
		$id = $_SESSION['id'];
	
		$sql = "UPDATE blog SET title = '$title', content = '$cont' WHERE id = $id";
			
		unset($_SESSION['id']);
		
		$conn->query($sql);
		
		$_SESSION['subm'] = "2";
		
		header("Location:outro.php");
		die();
		$conn->close();
	}elseif(isset($_POST['new'])){
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$cont = mysqli_real_escape_string($conn, $_POST['cont']);
		$creat = $_SESSION['name'];
		$dt = getdate();
		$date = $dt['mday'].'/'.$dt['mon'].'/'.$dt['year'];
	
	
		$sql = "INSERT INTO blog (title, content, creator, date)
			VALUES ('$title', '$cont', '$creat', '$date')";
			
		$conn->query($sql);
		
		$_SESSION['subm'] = "2";
		
		header("Location:outro.php");
		die();
		$conn->close();
	}
	
	
	$sql = "SELECT * FROM blog ORDER BY id DESC";
	
	$raw_results = $conn->query($sql);
	
	if($raw_results->num_rows > 0){
		while($results = $raw_results->fetch_assoc()){	
			echo'<div class="login container blog">';
				echo '<label for="title"><b>'.$results['title'].'</b></label>';
				
				echo '<pre>'.$results['content'].'</pre>';
				
				echo '<p><b>Publicado por: </b>'.$results['creator'].'<b> em </b>'.$results['date'].'</p>';
				
				if(isset($_SESSION['name'])){
					if($_SESSION['name'] == $results['creator'] || $_SESSION['perm'] == "1"){
						echo'<img name="editar" alt="editar" src="../imagens/edit.png" onclick="edit('.$results['id'].')">';
						echo'<img name="eliminar" alt="eliminar" src="../imagens/delete.png" onclick="dlt('.$results['id'].')">';
					}
				}
				
			echo'<br></div>';
		}
	}else{
		echo '<div class="login container blog">';
			echo '<label for="noentry">Ainda não temos conteúdo para apresentar.</label>';
		echo '</div>';
	}
	
	if(isset($_SESSION['name']) && $_SESSION['perm'] == 1){
		echo '<div class="addn">';
			echo '<a href="outro.php?subm=4">Adicionar nova entrada</a>';
		echo '</div><br><br>';
	}
?>