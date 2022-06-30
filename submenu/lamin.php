<?php
	session_name("controlo");
	session_start();
	$_SESSION['page'] = 'Laminagem';
	include '../head+foot/Header.php';
?>


<div id="pgtop">
	<img alt="Laminagem.png" src="../imagens/submenu/Laminagem.png">
</div>

<div id="smenu">
	<a id="a" class="active" onclick="preparação()">Preparação</a>
	<a id="b" onclick="processo()">Processo</a>
	<a id="c" onclick="qualidade()">Controlo Qualidade</a>
	<a id="d" onclick="tipos()">Tipos de vidro</a>
</div>

<div id="smcont">
	<div id="prep">
		<br>
		<h1>O que é:</h1>
		<p>A laminagem do vidro consiste na junção de dois ou mais vidros através de uma pelicula PVB. Isto permite que o vidro, aquando da quebra, se mantenha no lugar.</p>
	</div>
	
	<div id="proc">
		<br>
		<h1>Preparação:</h1>
		<p>Os vidros a laminar são lavados e sobrepostos com pelicula de PVB entre elas.</p>
		<h1>Cura PVB:</h1>
		<p>Após adicionada a pelicula PVB, os vidros passam por um processo de pré-aquecimento e prensagem, seguido de um novo aquecimento, a temperatura mais alta, e nova prensagem.</p>
		<p>Isto permite a eliminação da maioria das bolhas de ar que se formam entre os vidros.</p>
		<h1>Acabamento:</h1>
		<p>Finalmente, os vidros vão a uma autoclave, onde serão retiradas quaisquer bolhas que tenham ficado no processo de prensagem, criando uma união sólida.</p>
		<br>
	</div>
	
	<div id="qual">
		<br>
		<h1>Sala limpa:</h1>
		<p>A aplicação de pelicula PVB é efetuada numa sala livre de sujidades e com temperatura e humidade controladas.</p>
		<h1>Controlo qualidade:</h1>
		<p>Durante a produção, verificam-se todos, se algum, os defeitos dos vidros, antes e após a laminagem.</p>
		<br>
	</div>
	
	<div id="tipo">
		<br>
		<h1>Tipos de Laminados:</h1>
		<p>Com a nossa linha de laminagem KST Deluxe, podemos fazer vários tipos de laminados, entre eles:</p>
		<p style="text-align:justify;margin-left:30%">-Temperado;<br>-Termoendurecido;<br>-Monolítico;<br>-Misto(Temperado/Monolítico, Temperado/Termoendurecido, Monolítico/Termoendurecido);<br>-Decorativo;<br>-Incolor;<br>-Fosco;<br>...</p>
		<br>
	</div>
</div>

<script>
		
	function preparação(){
		document.getElementById("prep").style.display = "block";
		document.getElementById("proc").style.display = "none";
		document.getElementById("qual").style.display = "none";
		document.getElementById("tipo").style.display = "none";
		
		document.getElementById("a").classList.add('active');
		document.getElementById("b").classList.remove('active');
		document.getElementById("c").classList.remove('active');
		document.getElementById("d").classList.remove('active');
	}
	
	function processo(){
		document.getElementById("prep").style.display = "none";
		document.getElementById("proc").style.display = "block";
		document.getElementById("qual").style.display = "none";
		document.getElementById("tipo").style.display = "none";

		document.getElementById("a").classList.remove('active');
		document.getElementById("b").classList.add('active');
		document.getElementById("c").classList.remove('active');
		document.getElementById("d").classList.remove('active');
	}
	
	function qualidade(){
		document.getElementById("prep").style.display = "none";
		document.getElementById("proc").style.display = "none";
		document.getElementById("qual").style.display = "block";
		document.getElementById("tipo").style.display = "none";

		document.getElementById("a").classList.remove('active');
		document.getElementById("b").classList.remove('active');
		document.getElementById("c").classList.add('active');
		document.getElementById("d").classList.remove('active');
	}
	
	function tipos(){
		document.getElementById("prep").style.display = "none";
		document.getElementById("proc").style.display = "none";
		document.getElementById("qual").style.display = "none";
		document.getElementById("tipo").style.display = "block";

		document.getElementById("a").classList.remove('active');
		document.getElementById("b").classList.remove('active');
		document.getElementById("c").classList.remove('active');
		document.getElementById("d").classList.add('active');
	}

	
</script>


<?php
	include '../head+foot/foot.php';
?>
