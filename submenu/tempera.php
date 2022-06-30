<?php
	session_name("controlo");
	session_start();
	$_SESSION['page'] = 'Têmpera';
	include '../head+foot/Header.php';
?>


<div id="pgtop">
	<img alt="Tempera.png" src="../imagens/submenu/Tempera.png"><br>
</div>

<div id="smenu">
	<a id="a" class="active" onclick="preparação()">Preparação</a>
	<a id="b" onclick="processo()">Processo</a>
	<a id="c" onclick="qualidade()">Controlo Qualidade</a>
</div>

<div id="smcont">
	<div id="prep">
		<br>
		<h1>O forno:</h1>
		<p>Com um tamanho máximo de 3,30m por 7m e presença de convecção aquecida, podemos satisfazer qualquer pedido de clientes, seja ele em vidro comum como em baixo-emissivo.</p>
		<h1>O vidro:</h1>
		<p>Para proceder à tempra do vidro, este tem de vir devidamente acabado, respeitando as normas de têmpera.</p>
		<p>O vidro depois de temperado, não pode ser cortado, furado ou entalhado, tendo que ser temperado pronto a aplicar.</p>
		<br>
	</div>
	
	<div id="proc">
		<br>
		<h1>Aquecimento:</h1>
		<p>Antes de poder ser temperado, o vidro é aquecido lentamente até aos 650 graus.</p>
		<p>O aquecimento lento permite que o vidro tenha uma temperatura uniforme aquando da têmpera e evita quebra do mesmo, dentro e fora do forno.</p>
		<h1>Têmpera:</h1>
		<p>Após o aquecimento do vidro, este leva um sopro de ar frio, fazendo com que as suas partículas fiquem em tensão.</p>
		<p>Este choque térmico é o que faz com que o vidro ganhe uma grande resistência mecânica e ao impacto.</p>
		<br>
	</div>
	
	<div id="qual">
		<br>
		<h1>Lavagem:</h1>
		<p>Antes da têmpera, todos os vidros são lavados. Com a lavagem, podemos facilmente verificar se existem anomalias no vidro.</p>
		<h1>Cuidados de têmpera:</h1>
		<p>Após a saída da têmpera, verificamos sempre a planimetria e defeitos dos vidros.</p>
		<p>Para assegurar que os vidros continuam em perfeito estado, todos eles levam separadores de cortiça entre eles.</p>
		<h1>Testes de têmpera:</h1>
		<p>Todos os dias efectuamos testes de resistência mecânica, fragmentação e planimetria ao vidro temperado.</p>
		<p>Estes testes permitem que continuemos com a mesma qualidade de dia para dia, ajustando o forno conforme necessário.</p>
		<br>
	</div>
</div>

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
