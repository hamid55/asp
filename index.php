<?php
// index.php  Bewegungsmoeglichkeiten beider Springer und die Gefahrstellen herausfinden.
include_once('autoloading.php');
session_start();
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Schach</title>
	<script src="https://code.jquery.com/jquery-latest.js"></script>
	<script>
	$( document ).ready(function() {
        $(".button").on("click", function () {
			$(this).css("background-image", "url(pferd_w.png)");
		});
    });
	</script>
</head>
<body style="font-family: Helvetica; font-size: 14px;">
	<!--<input type="button" class="button" style="height: 200px; width: 200px;" ></input>-->
	Bitte auswählen<br />
	A1 bis D8 werden für Springer 1 benutzt<br />
	E1 bis H8 werden für Springer 2 benutzt.<br />
	<?php
	
	$objekt = "";
	if(isset($_REQUEST['button'])){
		$ersteZeichen = substr($_REQUEST['button'], 0, 1);
		if($ersteZeichen == 'A' || $ersteZeichen == 'B' || $ersteZeichen == 'C' || $ersteZeichen == 'D'){
			$objekt = 'Objekt1';     $_SESSION['obj1'] = $_REQUEST['button']; 
		}
		if($ersteZeichen == 'E' || $ersteZeichen == 'F' || $ersteZeichen == 'G' || $ersteZeichen == 'H'){
			$objekt = 'Objekt2';     $_SESSION['obj2'] = $_REQUEST['button'];  
		}
	}
	
	$array = array();
	$buch = array(1=>'A',2=>'B',3=>'C',4=>'D',5=>'E',6=>'F',7=>'G',8=>'H');
	echo '<center>';
	for($i=1 ; $i<=8 ; $i++)
	{
		echo "<form action='' method='post'>";
		for($k=1 ; $k<=8 ; $k++)
		{	
			echo "<button type='submit' class='button' style='height: 80px; width: 80px; background-color: ";
			if($i%2 == 0){
				echo ($k % 2 == 0) ? '#fff;' : '#999;';
			}else{
				echo ($k % 2 == 0) ? '#999;' : '#fff;';
			}
			echo "' value='".$buch[$i]."".$k."' id='".$buch[$i]."".$k."' name='button'>".$buch[$i]."".$k."</button>";
		}
		if(isset($_SESSION['obj1'])){
			echo "<input type='hidden' value='".$_SESSION['obj1']."' name='obj1'></button>";
		}
		if(isset($_SESSION['obj2'])){
			echo "<input type='hidden' value='".$_SESSION['obj2']."' name='obj2'></button>";
		}
		echo "</form>";
	}
	echo '</center>';

		
	if(isset($_SESSION['obj1'])){
	
		$wObj1 = new Asp();
		$wObj1->setAsp($_SESSION['obj1']);
	
		echo 'Auswahl Springer 1: '; echo $wObj1->getAsp();
		echo '<br />';
		echo $wObj1->setOptions();
		
		$w = "";
		$sammlung = array();
		
		array_push($sammlung, $_SESSION['obj1']);
	
		echo 'Bewegungsmoeglichkeiten: ';

		echo $w = $wObj1->getOption1();
		array_push($sammlung, $w); echo '&nbsp; ';

		echo $w = $wObj1->getOption2();
		array_push($sammlung, $w); echo '&nbsp; ';

		echo $w = $wObj1->getOption3();
		array_push($sammlung, $w); echo '&nbsp; ';

		echo $w = $wObj1->getOption4();
		array_push($sammlung, $w); echo '&nbsp; ';
	
		echo $w = $wObj1->getOption5();
		array_push($sammlung, $w); echo '&nbsp; ';

		echo $w = $wObj1->getOption6();
		array_push($sammlung, $w); echo '&nbsp; ';

		echo $w = $wObj1->getOption7();
		array_push($sammlung, $w); echo '&nbsp; ';

		echo $w = $wObj1->getOption8();
		array_push($sammlung, $w);
	}
	echo '<br />';
	
	if(isset($_SESSION['obj2'])){
		
		$wObj2 = new Asp();
		$wObj2->setAsp($_SESSION['obj2']);
	
		echo 'Auswahl Springer 2: '; echo $wObj2->getAsp();
		echo '<br />';
		echo $wObj2->setOptions();
		
		$w = "";
		$sammlung2 = array();

		array_push($sammlung2, $_SESSION['obj2']);
		
		echo 'Bewegungsmoeglichkeiten: ';
		echo $w = $wObj2->getOption1();
		array_push($sammlung2, $w); echo '&nbsp; ';

		echo $w = $wObj2->getOption2();
		array_push($sammlung2, $w); echo '&nbsp; ';

		echo $w = $wObj2->getOption3();
		array_push($sammlung2, $w); echo '&nbsp; ';

		echo $w = $wObj2->getOption4();
		array_push($sammlung2, $w); echo '&nbsp; ';
	
		echo $w = $wObj2->getOption5();
		array_push($sammlung2, $w); echo '&nbsp; ';

		echo $w = $wObj2->getOption6();
		array_push($sammlung2, $w); echo '&nbsp; ';

		echo $w = $wObj2->getOption7();
		array_push($sammlung2, $w); echo '&nbsp; ';

		echo $w = $wObj2->getOption8();
		array_push($sammlung2, $w);
	
	}
	echo '<br />';
		
	if(isset($sammlung) && isset($sammlung2)){
		$ergebnis = array_merge($sammlung, $sammlung2);
		$neuSammlung1 = array_unique($ergebnis);
		$ergSammlung = array_diff_assoc($ergebnis, $neuSammlung1);
		echo '<br />';
		echo 'Gegenseitige Bedrohungstellen: ';
		foreach($ergSammlung as $val){
			echo '<span style="color: red;" >'.$val.'</span> ';
		}
	}
	?>
</body>
</html>
