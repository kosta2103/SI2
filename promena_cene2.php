<?php

$veza = mysqli_connect("localhost", "root", "", "SI2");

if(isset($_GET["proizvodjac"])){
	$proizvodjac = $_GET["Proizvodjaci"];
	$procenat = $_GET["procenat"];
	$procenat = $procenat/100;

	$sql= "SELECT * FROM proizvodi WHERE Proizvodjac = '".$proizvodjac."'";
	$result = mysqli_query($veza, $sql);
	$cene = array();
	$barcode = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($cene, $row["Cena"]);
		array_push($barcode, $row["Barcode"]);
	}
	$arrlength = count($cene);

	$cena = array();
	for($i = 0; $i < $arrlength; $i++) {
		array_push($cena, ($cene[$i] + ($cene[$i])*$procenat));
	}

	for($i = 0; $i < $arrlength; $i++) {
		$sql = "UPDATE proizvodi SET Cena = '".$cena[$i]."' WHERE Barcode = '".$barcode[$i]."'";
		$veza->query($sql) or die($veza->error);
	}	    	
}

elseif(isset($_POST["proizvodjac"])){
	$proizvodjac = $_POST["Proizvodjaci"];

	$sql= "SELECT * FROM proizvodi WHERE Proizvodjac = '".$proizvodjac."'";
	$result = mysqli_query($veza, $sql);
	$nabavna_cena = array();
	$cene = array();
	$barcode = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($nabavna_cena, $row["Nabavna_cena"]);
		array_push($cene, $row["Cena"]);
		array_push($barcode, $row["Barcode"]);
	}
	$arrlength = count($cene);

	$cena = array();
	for($i = 0; $i < $arrlength; $i++) {
		array_push($cena, ($nabavna_cena[$i] + ($nabavna_cena[$i])*0.2));
	}

	for($i = 0; $i < $arrlength; $i++) {
		$sql = "UPDATE proizvodi SET Cena = '".$cena[$i]."' WHERE Barcode = '".$barcode[$i]."'";
		$veza->query($sql) or die($veza->error);
	}	    	
}

elseif(isset($_GET["vrsta_robe"])){
	$vrsta_robe = $_GET["Vrsta_robe"];
	$procenat = $_GET["procenat"];
	$procenat = $procenat/100;

	$sql= "SELECT * FROM proizvodi WHERE Tip = '".$vrsta_robe."'";
	$result = mysqli_query($veza, $sql);
	$cene = array();
	$barcode = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($cene, $row["Cena"]);
		array_push($barcode, $row["Barcode"]);
	}
	$arrlength = count($cene);

	$cena = array();
	$arrlength = count($cene);
	for($i = 0; $i < $arrlength; $i++) {
		array_push($cena, ($cene[$i] + ($cene[$i])*$procenat));
	}

	for($i = 0; $i < $arrlength; $i++) {
		$sql = "UPDATE proizvodi SET Cena = '".$cena[$i]."' WHERE Barcode = '".$barcode[$i]."'";
		$veza->query($sql) or die($veza->error);
	}	    	
}

elseif(isset($_POST["vrsta_robe"])){
	$vrsta_robe = $_POST["Vrsta_robe"];

	$sql= "SELECT * FROM proizvodi WHERE Tip = '".$vrsta_robe."'";
	$result = mysqli_query($veza, $sql);
	$nabavna_cena = array();
	$cene = array();
	$barcode = array();
	while ($row = mysqli_fetch_assoc($result)) {
		array_push($nabavna_cena, $row["Nabavna_cena"]);
		array_push($cene, $row["Cena"]);
		array_push($barcode, $row["Barcode"]);
	}
	$arrlength = count($cene);

	$cena = array();
	$arrlength = count($cene);
	for($i = 0; $i < $arrlength; $i++) {
		array_push($cena, ($nabavna_cena[$i] + ($nabavna_cena[$i])*0.2));
	}

	for($i = 0; $i < $arrlength; $i++) {
		$sql = "UPDATE proizvodi SET Cena = '".$cena[$i]."' WHERE Barcode = '".$barcode[$i]."'";
		$veza->query($sql) or die($veza->error);
	}	    	
}

?>
<script>
    window.location.href = 'promena_cene1.php';
</script>