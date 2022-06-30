<?php
	session_name("controlo");
	session_start();
	
	$_SESSION['page'] = 'Agenda';
	 	
	include '../Head/header.php';
 
	include '../Head/conn.php';

	$dt = getdate();
	
?>
	<div class="agenda">
		<?php
			include '../agenda/switch.php';
		
			echo('<h2>'.$dia.', '.$dt['mday'].' de '.$mes.' de '.$dt['year'].'</h2>');
			
			$sql = "SELECT * FROM agenda WHERE dia LIKE '%".$dt['mday']."%' AND mes LIKE '%".$dt['mon']."%' AND ano LIKE '%".$dt['year']."%'";
		
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
						echo $x[$i].':'.$o;
						for($y = 0; $y < count($arr); $y++){
							if($arr[$y][0] == $x[$i] && $arr[$y][1] == $o){
								echo('<a href="../gen/agndadd.php?chg=true&hi='.$arr[$y][0].'&mi='.$arr[$y][1].'&ct='.$arr[$y][2].'&cl='.$arr[$y][3].'&d='.$dt['mday'].'&m='.$dt['mon'].'&hf='.$arr[$y][4].'&mf='.$arr[$y][5].'" value="'.$arr[$y][2].'">'.$arr[$y][3].'</a>');
							} else if($arr[$y][0] == $x[$i] && $arr[$y][1] < $o){
								echo('<a style="float:right" href="../gen/agndadd.php?chg=true&hi='.$arr[$y][0].'&mi='.$arr[$y][1].'&ct='.$arr[$y][2].'&cl='.$arr[$y][3].'&d='.$dt['mday'].'&m='.$dt['mon'].'&hf='.$arr[$y][4].'&mf='.$arr[$y][5].'" value="'.$arr[$y][2].'">| '.$arr[$y][3].' |</a>');
							} else if($arr[$y][0] < $x[$i] && $arr[$y][0] < $x[$i] && $x[$i] < $arr[$y][4]){
								echo('<a style="float:right" href="../gen/agndadd.php?chg=true&hi='.$arr[$y][0].'&mi='.$arr[$y][1].'&ct='.$arr[$y][2].'&cl='.$arr[$y][3].'&d='.$dt['mday'].'&m='.$dt['mon'].'&hf='.$arr[$y][4].'&mf='.$arr[$y][5].'" value="'.$arr[$y][2].'">| '.$arr[$y][3].' |</a>');
							} else if($arr[$y][4] == $x[$i] && $arr[$y][0] < $x[$i] && $arr[$y][5] >= $o){ 
								echo('<a style="float:right" href="../gen/agndadd.php?chg=true&hi='.$arr[$y][0].'&mi='.$arr[$y][1].'&ct='.$arr[$y][2].'&cl='.$arr[$y][3].'&d='.$dt['mday'].'&m='.$dt['mon'].'&hf='.$arr[$y][4].'&mf='.$arr[$y][5].'" value="'.$arr[$y][2].'">| '.$arr[$y][3].' |</a>');
							}
						}
						echo '<hr>';
						echo '</div>';
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