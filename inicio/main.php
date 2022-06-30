<?php
	session_name("controlo");
	session_start();
	$_SESSION['page'] = 'BatalhaTempra';
	include '../head+foot/Header.php';
?>
<div id="left"><img alt="batalha" src="../imagens/menu/batalha.png"/></div>
<div id="right"><img alt="tempra" src="../imagens/menu/tempra.png"/></div>

<div class="piccv">
	
	<img alt="menu" id="image" src="../imagens/menu/menu.png" usemap="#imap"/>
	<img alt="hst" id="hst" src="../imagens/menu/hst.gif" usemap="#imap" style="display:none"/>
	<img alt="tempera" id="tem" src="../imagens/menu/temp.gif" usemap="#imap" style="display:none"/>
	<img alt="laminagem" id="lam" src="../imagens/menu/lami.gif" usemap="#imap" style="display:none"/>
	<map name="imap">
		<area shape="poly" coords="89,140,89,704,90,711,93,715,98,719,102,724,109,727,117,725,128,719,280,618,285,614,290,606,288,594,291,20,288,15,283,8,277,4,264,3,249,9,96,109,92,116,90,124" alt="Laminagem" href="../submenu/lamin.php" onmouseover="lam()" onmouseout="lam1()">
		<area shape="poly" coords="318,441,545,658,544,451,544,439,541,433,531,425,340,223,334,220,326,220,320,227,319,244" alt="HST" href="../submenu/hst.php" onmouseover="hst()" onmouseout="hst1()">
		<area shape="poly" coords="419,555,136,743,126,746,119,748,110,745,220,867,232,874,242,874,253,877,266,875,284,873,302,862,544,701,548,694,546,687,542,675,534,669" alt="Têmpera" href="../submenu/tempera.php" onmouseover="tem()" onmouseout="tem1()">
	</map>
	
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../js/imageMapResizer.min.js"></script>
<script>
	$('map').imageMapResize();
	
</script>

<script>
jQuery(document).ready(function() {
     var data = $('#1').mouseout().data('maphilight') || {};
     data.alwaysOn = !data.alwaysOn;
     $('#1').data('maphilight', data).trigger('alwaysOn.maphilight');
});
</script>

<script>
	function lam(){
		document.getElementById("image").style.display='none';
		document.getElementById("lam").style.display='block';
	}
	
	function lam1(){
		document.getElementById("image").style.display='block';
		document.getElementById("lam").style.display='none';
	}
	
	function hst(){
		document.getElementById("image").style.display='none';
		document.getElementById("hst").style.display='block';
	}
	
	function hst1(){
		document.getElementById("image").style.display='block';
		document.getElementById("hst").style.display='none';
	}
	
	function tem(){
		document.getElementById("image").style.display='none';
		document.getElementById("tem").style.display='block';
	}
	
	function tem1(){
		document.getElementById("image").style.display='block';
		document.getElementById("tem").style.display='none';
	}


</script>
<?php
	include '../head+foot/foot.php';
?>