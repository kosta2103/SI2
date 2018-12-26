<!DOCTYPE html>
<html>
    <head>

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		

        
        <link rel="stylesheet" href="prikaz.css">
			
    </head>
<body>
<?php

$veza = mysqli_connect("localhost", "root", "", "SI2");
?>

<script type="text/javascript">
	function submitForm()
	{
		document.getElementById('form1').submit();
	}
</script>
<?php

if(!(isset($_GET["potvrda"]))){ ?>
	<form id="form1" action="promena_cene1.php" method="GET">
	<select name="Vrsta_snizenja">
		<option value="" selected disabled hidden>Izaberi kategoriju za promenu cene</option>
		<option value="po_proizvodjacu">Po proizvodjacu</option>
		<option value="po_vrsti_robe">Po vrsti robe</option>
	</select>
	<input type="submit" name="potvrda">
</form> <?php
}

if(isset($_GET["potvrda"])){
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
			<input type="number" name="procenat" required=""><br>
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

	elseif($select == "po_vrsti_robe"){
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
			<?php }
		}
?>
<br><br><br>
<?php
$sql = "SELECT * FROM snizenje";

$result = mysqli_query($veza, $sql);
if(mysqli_num_rows($result) != 0){ ?>
	<table>
		<tr>
	    <th>Vrsta</th>
	    <th>Naziv</th> 
	    <th>Procenat</th>
	    <th>Vazi</th>
	  </tr>

	  <tr> <?php 
	while ($row = mysqli_fetch_assoc($result)) { ?>
		<td><?php echo $row["Vrsta"]?></td>
		<td><?php echo $row["Naziv"]?></td>
		<td><?php echo $row["Procenat"]?></td>
		<td><?php echo $row["Vazi"]?></td>
		<form action="promena_cene2.php" method="GET">
		<td>
			<input type="hidden" name="id_akcije" value="<?php echo $row['ID'] ?>">
			<?php
			if($row["Vazi"] == 1){ ?>
				<input type="checkbox" name="checkbox" checked="checked" onClick="submit()">
			<?php }
			else{ ?>
				<input type="checkbox" name="checkbox" onClick="submit()" >
			<?php } ?>
		</td>
		</form>
		<form action="promena_cene2.php" method="POST">
		<td>
			<input type="hidden" name="id" value="<?php echo $row['ID'] ?>">
			<button type="submit" name="remove"><i class="glyphicon glyphicon-remove"></i></button></td>
		</form>
	</tr>
	<?php } ?>
	</table>
<?php } ?>