<?php
	if(!isset($_GET['con'])){
		switch ($dt['mon']){
			case "1":
				$mes = "Janeiro";
				break;
			case "2":
				$mes = "Fevereiro";
				break;
			case "3":
				$mes = "Março";
				break;
			case "4":
				$mes = "Abril";
				break;
			case "5":
				$mes = "Maio";
				break;
			case "6":
				$mes = "Junho";
				break;
			case "7":
				$mes = "Julho";
				break;
			case "8":
				$mes = "Agosto";
				break;
			case "9":
				$mes = "Setembro";
				break;
			case "10":
				$mes = "Outubro";
				break;
			case "11":
				$mes = "Novembro";
				break;
			case "12":
				$mes = "Dezembro";
				break;
		}
		
		switch ($dt['wday']){
			case "1":
				$dia = "Segunda-feira";
				break;
			case "2":
				$dia = "Terça-feira";
				break;
			case "3":
				$dia = "Quarta-feira";
				break;
			case "4":
				$dia = "Quinta-feira";
				break;
			case "5":
				$dia = "Sexta-feira";
				break;
			case "6":
				$dia = "Sábado";
				break;
			case "0":
				$dia = "Domingo";
				break;
		}
	} else {
		switch ($m){
			case "1":
				$mes = "Janeiro";
				break;
			case "2":
				$mes = "Fevereiro";
				break;
			case "3":
				$mes = "Março";
				break;
			case "4":
				$mes = "Abril";
				break;
			case "5":
				$mes = "Maio";
				break;
			case "6":
				$mes = "Junho";
				break;
			case "7":
				$mes = "Julho";
				break;
			case "8":
				$mes = "Agosto";
				break;
			case "9":
				$mes = "Setembro";
				break;
			case "10":
				$mes = "Outubro";
				break;
			case "11":
				$mes = "Novembro";
				break;
			case "12":
				$mes = "Dezembro";
				break;
		}
		
		switch ($ds){
			case "1":
				$dia = "Segunda-feira";
				break;
			case "2":
				$dia = "Terça-feira";
				break;
			case "3":
				$dia = "Quarta-feira";
				break;
			case "4":
				$dia = "Quinta-feira";
				break;
			case "5":
				$dia = "Sexta-feira";
				break;
			case "6":
				$dia = "Sábado";
				break;
			case "7":
				$dia = "Domingo";
				break;
		}

	}

?>