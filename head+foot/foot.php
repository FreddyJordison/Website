
</div>
<footer>
	<div id="foot"
		><form action="../submenu/outro.php"  method="post"
			><button type="submit" name="subm" value="1" id="btn1">Sobre</button
			><button type="submit" name="subm" value="2" id="btn2">Blog</button
			><button type="submit" name="subm" value="3" id="btn3">Contactos</button
		></form
	></div
><br><div class="otro" 
	><?php
		if(isset($_SESSION['name'])){
			echo '<a id="1" href="../inicio/logout.php?main">'.$_SESSION['name'].'</a>';
			
		}else{
			echo '<a href="../inicio/login.php?main">Login</a>';
		}
	?>
		<a href="../inicio/login.php">Controlo</a

></div
	
></footer>

</body></html>

<script>
	if ( window.history.replaceState ) {
	  window.history.replaceState( null, null, window.location.href );
	}
</script>