<!DOCTYPE html>
<html>
<body>
<?php

$veza = mysqli_connect("localhost", "root", "", "SI2");

 ?>
	<form id="form1" action="promena_cene1.php" method="GET">
		<select name="Vrsta_snizenja" onchange = "submitForm()">
			<option value="" selected disabled hidden>Izaberi kategoriju za snizenje</option>
			<option value="po_proizvodjacu">Po proizvodjacu</option>
	 		<option value="po_vrsti_robe">Po vrsti robe</option>
		</select>
	    <input type = "hidden" name = "vrsta">
	</form> 

	<script type="text/javascript">
		function submitForm()
		{
 			document.getElementById('form1').submit();
		}
	</script>
<?php
	if(isset($_GET["Vrsta_snizenja"]))
	{
		$select = $_GET["Vrsta_snizenja"];
		if($select == "po_proizvodjacu"){
			$sql= "SELECT * FROM proizvodi";
			$result = mysqli_query($veza, $sql);
			$proizvodjaci = array();
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($proizvodjaci, $row["Proizvodjac"]);
			}
			$proizvodjac = [];
			$arrlength = count($proizvodjaci);
			for($i = 0; $i < $arrlength; $i++) {
				if (!(in_array($proizvodjaci[$i], $proizvodjac))) {
	    			array_push($proizvodjac, $proizvodjaci[$i]);
	}}
		$arrlength2 = count($proizvodjac); ?>

		<form action="promena_cene2.php" method="GET">
			Promena cene (+ za povecanje u %, - za smanjenje):<br>
			<input type="number" name="procenat" required><br>
			<select name="Proizvodjaci"> 
				<option value="" selected disabled hidden>Izaberite proizvodjaca</option>
				<?php 
				for($i = 0; $i < $arrlength2; $i++){ ?>
					<option value="<?php echo $proizvodjac[$i]; ?>"><?php echo $proizvodjac[$i]; ?></option>
		<?php	} ?>
				</select>
			    <input type = "submit" name = "proizvodjac">
			</form>
			<?php } 

	if($select == "po_vrsti_robe"){
		$sql= "SELECT * FROM proizvodi";
		$result = mysqli_query($veza, $sql);
		$vrste_robe = array();
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($vrste_robe, $row["Tip"]);
		}
		$vrsta_robe = [];
		$arrlength = count($vrste_robe);
		for($i = 0; $i < $arrlength; $i++) {
			if (!(in_array($vrste_robe[$i], $vrsta_robe))) {
    			array_push($vrsta_robe, $vrste_robe[$i]);
}}
		$arrlength2 = count($vrsta_robe);

?>

		<form action="promena_cene2.php" method="GET">
			Promena cene (+ za povecanje u %, - za smanjenje):<br>
			<input type="number" name="procenat" required><br>
			<select name="Vrsta_robe"> 
				<option value="" selected disabled hidden>Izaberite vrstu robe</option>
				<?php 
				for($i = 0; $i < $arrlength2; $i++){ ?>
					<option value="<?php echo $vrsta_robe[$i]; ?>"><?php echo $vrsta_robe[$i]; ?></option>
		<?php	} ?>
				</select>
			    <input type = "submit" name = "vrsta_robe">
			</form>
			<?php }} ?>