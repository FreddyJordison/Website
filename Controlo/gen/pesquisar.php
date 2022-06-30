<?php
	session_name("controlo");
	session_start();
	
	$_SESSION['page'] = 'Pesquisa';
		    
	include '../Head/header.php';
 
	include '../Head/conn.php';
	
			if(isset($_GET['carro'])){
				$_SESSION['carro'] = $_GET['carro'];
			} else if(isset($_GET['Pesquisa'])){
				unset($_SESSION['carro']);
			}
						
			if(isset($_SESSION['carro'])) {
				$Car = $_SESSION['carro'];
				
				if(isset($_GET['lado'])) {
					$sql = "SELECT vidro, carro, lado, requisicao, cliente, medida FROM carro1 WHERE carro LIKE '".$Car."' AND lado LIKE '".$_GET['lado']."'" or die(mysql_error());
				} else {
					$sql = "SELECT vidro, carro, lado, requisicao, cliente, medida FROM carro1 WHERE carro LIKE '".$Car."'" or die(mysql_error());
				}
            
		        $raw_results = $conn->query($sql);
             
		        // * means that it selects all fields, you can also write: `id`, `title`, `text`
		        // articles is the name of our table
	         
		        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         		
         		$valor = array();
         		
		        if($raw_results->num_rows > 0){ // if one or more rows are returned do following
             
		            while($results = $raw_results->fetch_assoc()){
		            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
		                echo ("<p><b> Carro: </b>".$results['carro'].",<b> Lado: </b>".$results['lado'].",<b> Requisição: </b>".$results['requisicao'].",<b> Cliente: </b>".$results['cliente'].",<b> Medida: </b>".$results['medida']."</p>");
		                array_push($valor, $results['vidro']);
		                echo ("<div class='cont'><form action='remover.php' method='post'><button type='submit' class='rembtn' name='rem' value=\"".$results['vidro']."\"><b>Remover</b></button></form>");
                      	echo ("<form action='editar.php' method= 'get'><button type='submit' class='editbtn' name='rem' value=\"".$results['vidro']."\"><b>Editar</b></button></form></div><br><br><br><br>");
		            }
	             
		        }
		        else{ // if there is no matching rows do following
		            echo "<p><b>Não foram encontrados resultados!</b></p>";
		        }
		    } else {
				$min_length = 3;
				
				if(isset($_GET['Pesquisa'])){
					$temp = $_GET['Pesquisa'];
					$temp = htmlspecialchars($temp);
		         
			    	$temp = mysqli_real_escape_string($conn, $temp);
			
			
					if (isset($_SESSION['query'])) {
						if($_SESSION['query'] != $temp && strlen($temp) > 0){
							unset($_SESSION['query']);
							$_SESSION['query'] = $_GET['Pesquisa'];
	  						$_SESSION['query'] = htmlspecialchars($_SESSION['query']); 
			    	    	$_SESSION['query'] = mysqli_real_escape_string($conn, $_SESSION['query']);
						}
					} else {
	  					$_SESSION['query'] = $_GET['Pesquisa'];
	  					$_SESSION['query'] = htmlspecialchars($_SESSION['query']); 
			    	    // changes characters used in html to their equivalents, for example: < to &gt;
		        	 
			    	    $_SESSION['query'] = mysqli_real_escape_string($conn, $_SESSION['query']);
			    	    // makes sure nobody uses SQL injection
	  				}		
			    }// gets value sent over search form
	     
		    
		    	// you can set minimum length of the query if you want
     		
		    	if(strlen($_SESSION['query']) >= $min_length){ // if query length is more or equal minimum length then
         	
		    	    $sql = "SELECT vidro, carro, lado, requisicao, cliente, medida FROM carro1
		    	        WHERE carro LIKE '%".$_SESSION['query']."%' OR lado LIKE '%".$_SESSION['query']."%' OR requisicao LIKE '%".$_SESSION['query']."%' OR cliente LIKE '%".$_SESSION['query']."%' OR medida LIKE '%".$_SESSION['query']."%'" or die(mysql_error());
            	
		    	    $raw_results = $conn->query($sql);
		    	    
		    	    $sql1 = "SELECT num, vidro, extra, tipo, req, cli, dim, nota FROM registos
		    	    WHERE req LIKE '%".$_SESSION['query']."%' OR cli LIKE '%".$_SESSION['query']."%' OR dim LIKE '%".$_SESSION['query']."%' OR nota LIKE '%".$_SESSION['query']."%'" or die(mysql_error());
            	
		    	    $raw_results1 = $conn->query($sql1);
		    	    
		    	    $sql2 = "SELECT num, vidro, extra, tipo, req, cli, dim, data, nota FROM done
		    	    WHERE req LIKE '%".$_SESSION['query']."%' OR cli LIKE '%".$_SESSION['query']."%' OR dim LIKE '%".$_SESSION['query']."%' OR nota LIKE '%".$_SESSION['query']."%'" or die(mysql_error());
            	
	    	    	$raw_results2 = $conn->query($sql2);
             
		    	    // * means that it selects all fields, you can also write: `id`, `title`, `text`
		    	    // articles is the name of our table
	         
		    	    // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		    	    // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		    	    // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         		
         		
         			if($raw_results->num_rows > 0 || $raw_results1->num_rows > 0 || $raw_results2->num_rows > 0){
		    	    	if($raw_results->num_rows > 0){ // if one or more rows are returned do following
             				echo('<div class="cont"><h2>Carros</h2><br></div>');
		    	    	    while($results = $raw_results->fetch_assoc()){
		    	    		    // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
		    	    	        echo ("<p><b> Carro: </b>".$results['carro'].",<b> Lado: </b>".$results['lado'].",<b> Requisição: </b>".$results['requisicao'].",<b> Cliente: </b>".$results['cliente'].",<b> Medida: </b>".$results['medida']."</p>");
		    	    	        echo ("<div class='cont'><form action='remover.php' method='post'><button type='submit' class='rembtn' name='rem' value=\"".$results['vidro']."\"><b>Remover</b></button></form>");
            	    	      	echo ("<form action='editar.php' method= 'get'><button type='submit' class='editbtn' name='rem' value=\"".$results['vidro']."\"><b>Editar</b></button></form></div><br>");
		    	    	    }
		    	    	}

		    		
			    	    if($raw_results1->num_rows > 0){ // if one or more rows are returned do following
	             			echo('<div class="cont"><h2>Pedidos por executar</h2><br></div>');
			    	        while($results = $raw_results1->fetch_assoc()){
			    	        	switch($results['vidro']){
									case "lami":
										$type = "Laminado";
										break;
									case "dupl":
										$type = "Duplo";
										break;
									case "espe":
										$type = "Espelho";
										break;
									case "outr":
										$type = "Outro";
										break;
									default:
										$type = $results['vidro']." mm";
										break;
								}
             					if($results['nota'] != null){
             						echo("<p><b>".$type."</b><br><b>Nota: </b>".$results['nota']."</p>");
								} else {
									echo("<p><b>".$type."</b><br></p>");
								}
             						
			    	            echo ("<p><b>Requisição: </b>".$results['req'].",<b> Cliente: </b>".$results['cli'].",<b> Medida: </b>".$results['dim']."</p><br>");
			    	            echo("<div class='registo'><button type='button' style='display:inline-block;width: 25%;' class='accbtn' value='".$results['num']."' onclick='Feito(this.value);'>Feito</button> ");
								echo(" <button type='button' style='display:inline-block;width: 25%;' class='editbtn' value='".$results['num']."' onclick='Editar(this.value);'>Editar</button><br><br></div><br>");
			    	    	}
		    	    }		    		
		    		
		    		
			    	    if($raw_results2->num_rows > 0){ // if one or more rows are returned do following
	             			echo('<div class="cont"><h2>Pedidos executados</h2><br></div>');
			    	        while($results = $raw_results2->fetch_assoc()){
			    	        	switch($results['vidro']){
									case "lami":
										$type = "Laminado";
										break;
									case "dupl":
										$type = "Duplo";
										break;
									case "espe":
										$type = "Espelho";
										break;
									case "outr":
										$type = "Outro";
										break;
									default:
										$type = $results['vidro']." mm";
										break;
								}
								if($results['nota'] != null){
             						echo("<p><b>".$type."</b><br><b>Nota: </b>".$results['nota']."</p>");
								} else {
									echo("<p><b>".$type."</b><br></p>");
								}
	             
		    	    	        echo ("<p><b> Requisição: </b>".$results['req'].",<b> Cliente: </b>".$results['cli'].",<b> Medida: </b>".$results['dim'].", <b>Data: </b>".$results['data']."</p>");
		    	    	        echo ("<div class='cont'><form action='../Pedidos/remover.php' method='post'><button type='submit' class='accbtn' name='rem' value=\"".$results['num']."\"><b>Expedido</b></button></form></div><br>");
		    	    		}
		    	    	}
		    	    } else { // if there is no matching rows do following
		     	       echo "<p><b>Não foram encontrados resultados!</b></p><br><br>";
		    		}

         
		    	} else { // if query length is less than minimum
		    	    echo "<p><b>O mínimo de caracteres para pesquisa é ".$min_length."</b></p>";
		    	    unset($_SESSION['query']);
		    	}
		    }
		    		    
		    $conn->close();
		?>
		<script type="text/javascript">
			function Feito(val){
				window.location.href = "./registo.php?done="+val+"&src=pesquisa";
			}
	
			function Editar(val){
				window.location.href = "./registo.php?edit="+val+"&src=pesquisa";
			}
		</script>

<?php
	include '../Head/foot.php';
?>    