<?php
	include '../head+foot/conn.php';
	
	if(isset($_GET['edit'])){ 
		$sql = "SELECT * FROM blog WHERE id LIKE '%".$_GET['id']."%'";
		
		$raw_res = $conn->query($sql);
		
		$res = $raw_res->fetch_assoc();
	}

?>

<div class="login content">
	<form action="outro.php" method="post">
		<label for="title"><b>Título</b></label>
		<input type="text" placeholder="Inserir título" name="title" <?php if(isset($res)){echo 'value="'.$res['title'].'"';} ?> required>
		
		<label for="cont"><b>Mensagem</b></label>
		<textarea name="cont" rows="10" style="min-height:2em" required><?php if(isset($res)){echo $res['content'];} ?></textarea>
		
		<input type="hidden" <?php if(!isset($res)){echo 'name="new"';}else{echo 'name="edit"';}?> value="1">
		<?php
			$_SESSION['subm'] = "2";
			if(isset($res)){
				$_SESSION['id'] = $res['id'];
			}
		?>
		
		<button type="submit"><?php if(!isset($res)){echo 'Adicionar entrada';}else{echo 'Editar entrada';}?></button>
	</form>
</div>
