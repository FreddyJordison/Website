<?php
	session_name("controlo");
	session_start();
	
	$_SESSION['page'] = 'Consultar Agenda';
		    
	include '../Head/header.php';
 
	include '../Head/conn.php';
	
?>
	<div class="agenda">
	<?php
		$dt = getDate();
		
		$month = array(31,28,31,30,31,30,31,31,30,31,30,31);
		
		if(!isset($_GET['con'])){
			$ds = $dt['wday'];
			
			$d = $dt['mday'];			
			
			$m = $dt['mon'];
			
			$y = $dt['year'];	

		} else {
			$ds = $_GET['ds'];
			
			$d = $_GET['d'];			
			
			$m = $_GET['m'];
			
			$y = $_GET['y'];	
		}
		
		include '../agenda/sort.php';
			
		include '../agenda/switch.php';
		
		echo('<h2>'.$dia.', '.$d.' de '.$mes.' de '.$y.'</h2>');
			
		echo '<a href="./cons.php?con=true&ds='.($ds-1).'&d='.($d-1).'&m='.$m.'&y='.$y.'" style="text-decoration: none; float: left; margin-left: 5px;"><img alt="Anterior" style="width:50px;height:35px;transform: scaleX(-1);background-color: transparent;" src="../imagens/IR.png"/></a>';
			
		echo '<a href="./cons.php?con=true&ds='.($ds+1).'&d='.($d+1).'&m='.$m.'&y='.$y.'" style="text-decoration: none; float: right; margin-right: 5px;"><img alt="Seguinte" style="width:50px;height:35px; background-color: transparent;" src="../imagens/IR.png"/></a>';
			
		$sql = "SELECT * FROM agenda WHERE dia LIKE '%".$d."%' AND mes LIKE '%".$m."%'";
		
		$rr = $conn->query($sql);
		$arr = array();
		$hi = array();
		$cnt = array();
		
		$x = array("6","7","8","9","10","11","12","13","14","15","16","17","18");
		$x1 = array("00","30");
			
		echo('<div class="table"><h1>Hora:</h1><h1 style="float: right"> Cliente:</h1><br><br><br><hr>');
		
		if($rr -> num_rows > 0){
			while($res = $rr->fetch_assoc()){
				if(!in_array($res['cli'], $arr)){
					array_push($arr, [$res['hi'], $res['mi'], $res['count'], $res['cli'], $res['hf'], $res['mf']]);
				}
			}

			for($i = 0; $i < count($x); $i++){
				foreach($x1 as $o){
					echo '<div class="divs">';
					echo $x[$i].':'.$o.'<br>';
					for($y = 0; $y < count($arr); $y++){
						if($arr[$y][0] == $x[$i] && $arr[$y][1] == $o){
							echo('<a href="../gen/agndadd.php?chg=true&hi='.$arr[$y][0].'&mi='.$arr[$y][1].'&ct='.$arr[$y][2].'&cl='.$arr[$y][3].'&d='.$d.'&m='.$m.'&hf='.$arr[$y][4].'&mf='.$arr[$y][5].'" value="'.$arr[$y][2].'">'.$arr[$y][3].'</a>');
						} else if($arr[$y][0] == $x[$i] && $arr[$y][1] < $o){
							echo('<a style="float:right" href="../gen/agndadd.php?chg=true&hi='.$arr[$y][0].'&mi='.$arr[$y][1].'&ct='.$arr[$y][2].'&cl='.$arr[$y][3].'&d='.$d.'&m='.$m.'&hf='.$arr[$y][4].'&mf='.$arr[$y][5].'" value="'.$arr[$y][2].'">| '.$arr[$y][3].' |</a>');
						} else if($arr[$y][0] < $x[$i] && $arr[$y][0] < $x[$i] && $x[$i] < $arr[$y][4]){
							echo('<a style="float:right" href="../gen/agndadd.php?chg=true&hi='.$arr[$y][0].'&mi='.$arr[$y][1].'&ct='.$arr[$y][2].'&cl='.$arr[$y][3].'&d='.$d.'&m='.$m.'&hf='.$arr[$y][4].'&mf='.$arr[$y][5].'" value="'.$arr[$y][2].'">| '.$arr[$y][3].' |</a>');
						} else if($arr[$y][4] == $x[$i] && $arr[$y][0] < $x[$i] && $arr[$y][5] >= $o){ 
							echo('<a style="float:right" href="../gen/agndadd.php?chg=true&hi='.$arr[$y][0].'&mi='.$arr[$y][1].'&ct='.$arr[$y][2].'&cl='.$arr[$y][3].'&d='.$d.'&m='.$m.'&hf='.$arr[$y][4].'&mf='.$arr[$y][5].'" value="'.$arr[$y][2].'">| '.$arr[$y][3].' |</a>');
						}
					}
					echo '</div>';
					echo ('<hr>');
				}
			}
		}else{
			for($i = 0; $i < count($x); $i++){
				foreach($x1 as $o){
					echo '<div class="divs">';
					echo (' '.$x[$i].':'.$o.'<hr>');
					echo '</div>';
				}
			}
		}
			
		echo('</div>');
?>
	</div>
	
<?php
	include '../Head/foot.php';
?>