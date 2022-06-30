<?php
	session_name("controlo");
	session_start();
	$_SESSION['page'] = 'HST';
	include '../head+foot/Header.php';
?>


<div id="pgtop">
	<img alt="hst.png" src="../imagens/submenu/hst.png">
</div>

<div id="smenu">
	<a id="a" class="active" onclick="preparação()">O que é</a>
	<a id="b" onclick="processo()">Processo</a>
	<a id="c" onclick="qualidade()">Segurança</a>
</div>

<div id="smcont">
	<div id="prep">
		<br>
		<h1>O que é:</h1>
		<p>O Heat Soak Test, comummente referido pela sua sigla HST, é actualmente a melhor garantia disponível para as empresas do sector para evitar explosões súbitas e inesperadas do vidro temperado, que podem ser devidas a impurezas de sulfureto de níquel nas folhas de vidro float originais.</p>
	</div>
	
	<div id="proc">
		<br>
		<h1>Aquecimento:</h1>
		<p>O ciclo completo dura seis horas e é composto por três fases. Durante a primeira fase, o vidro é carregado no forno, sendo progressivamente aquecido durante 2,5 horas, atingindo uma temperatura máxima de 290ºC, monitorizado por termopares a partir de um painel externo.</p>
		<h1>Mantimento:</h1>
		<p>No ponto de temperatura máxima, inicia-se a segunda fase, durante a qual é efectuada uma imersão a quente das folhas, que remove todas as partículas de enxofre e níquel da superfície, sendo depois o vidro mantido no forno a uma temperatura estável durante duas horas.</p>
	</div>
	
	<div id="qual">
		<br>
		<h1>Segurança:</h1>
		<p>O forno HST garante o cumprimento das normas de segurança DIN-EN14179-1 e UNI EN 14179 para a utilização de vidro temperado, garantindo um produto com esta certificação e maximizando a segurança dos seus colaboradores</p>
	</div>
	
</div><br>.

<script>
		
	function preparação(){
		document.getElementById("prep").style.display = "block";
		document.getElementById("proc").style.display = "none";
		document.getElementById("qual").style.display = "none";
		
		document.getElementById("a").classList.add('active');
		document.getElementById("b").classList.remove('active');
		document.getElementById("c").classList.remove('active');
	}
	
	function processo(){
		document.getElementById("prep").style.display = "none";
		document.getElementById("proc").style.display = "block";
		document.getElementById("qual").style.display = "none";

		document.getElementById("a").classList.remove('active');
		document.getElementById("b").classList.add('active');
		document.getElementById("c").classList.remove('active');
	}
	
	function qualidade(){
		document.getElementById("prep").style.display = "none";
		document.getElementById("proc").style.display = "none";
		document.getElementById("qual").style.display = "block";

		document.getElementById("a").classList.remove('active');
		document.getElementById("b").classList.remove('active');
		document.getElementById("c").classList.add('active');
	}
	
</script>


<?php
	include '../head+foot/foot.php';
?>
