<html>
<head>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		

        
		<link rel="stylesheet" href="prikaz.css">
		<link rel="stylesheet" href="navbar.css">
			
    </head>
<body>
<?php

$veza = mysqli_connect("localhost", "root", "", "SI2");

if(isset($_POST["naruci"])){
	$barcode = $_POST["barcode"];
	$naziv = $_POST["naziv"];
	$proizvodjac = $_POST["proizvodjac"];
	$cena = $_POST["cena"];
	$kolicina = $_POST["kolicina"];
	$dobavljac = $_POST["Dobavljac"];
	$link = $_POST["link"];
	$tip = $_POST["tip"];
	$email = "";
	$sql = "SELECT * FROM dobavljaci WHERE Naziv = '".$dobavljac."'";
	$result = mysqli_query($veza, $sql);
	if(mysqli_num_rows($result) != 0){
		while($row = mysqli_fetch_assoc($result)){
			$email = $row["Email"];
		}
	}

	$sql = "INSERT INTO naruceni (Barcode, Naziv, Proizvodjac, Cena, Kolicina, Dobavljac, Link, Email, Tip) VALUES ('".$barcode."', '".$naziv."', '".$proizvodjac."', '".$cena."', '".$kolicina."', '".$dobavljac."', '".$link."', '".$email."', '".$tip."')";
	mysqli_query($veza, $sql);
}

$barcode_naruceni = array();
$barcode = array();
$naziv = array();
$proizvodjac = array();
$cena = array();
$dobavljac = array();
$link = array();
$tip = array();

$sql = "SELECT * FROM naruceni";
$result = mysqli_query($veza, $sql);
if(mysqli_num_rows($result) != 0){
	while($row = mysqli_fetch_assoc($result)){
		array_push($barcode_naruceni, $row["Barcode"]);
	}
}

$sql = "SELECT * FROM dobavljaci";
$result = mysqli_query($veza, $sql);

if(mysqli_num_rows($result) != 0){
	while($row = mysqli_fetch_assoc($result)){
		array_push($dobavljac, $row["Naziv"]);
	} 
}
$sql = "SELECT * FROM proizvodi WHERE Kolicina = '0'";
$result = mysqli_query($veza, $sql);

if(mysqli_num_rows($result) != 0){
	while($row = mysqli_fetch_assoc($result)){
		array_push($barcode, $row["Barcode"]);
		array_push($naziv, $row["Naziv"]);
		array_push($proizvodjac, $row["Proizvodjac"]);
		array_push($cena, $row["Nabavna_cena"]);
		array_push($link, $row["Link"]);
		array_push($tip, $row["Tip"]);
	} 

	$barcode_ispisi = array();
	$naziv_ispisi = array();
	$proizvodjac_ispisi = array();
	$cena_ispisi = array();
	$link_ispisi = array();
	$tip_ispisi = array();

	for($i=0; $i<count($barcode); $i++){
		if(!(in_array($barcode[$i], $barcode_naruceni))){
			array_push($barcode_ispisi, $barcode[$i]);
			array_push($naziv_ispisi, $naziv[$i]);
			array_push($proizvodjac_ispisi, $proizvodjac[$i]);
			array_push($cena_ispisi, $cena[$i]);
			array_push($link_ispisi, $link[$i]);
			array_push($tip_ispisi, $tip[$i]);
		}
	}

	if(!(empty($barcode_ispisi))){ ?>
 		<table>
 			<tr>
				<th>Barcode</th>
				<th>Naziv</th>
				<th>Cena</th>
				<th>Dobavljac</th>
				<th>Link</th>
				<th>Tip</th>
				<th>Kolicina</th>
			</tr>
			 <?php
			for($i=0; $i<count($barcode_ispisi); $i++){ ?>
				<tr>
					<td><?php echo $barcode_ispisi[$i]; ?> </td>
					<td><?php echo $naziv_ispisi[$i]; ?> </td>
					<td><?php echo $cena_ispisi[$i]; ?> </td>
					<td>
						<form action="nema_na_stanju.php" style="display: inline-block;" method="POST">
						<select name="Dobavljac" required> 
							<option value="" selected disabled hidden>Izaberi dobavljaca</option> <?php
							for($j=0; $j<count($dobavljac); $j++){ ?>
								<option><?php echo $dobavljac[$j] ?></option>
							<?php } ?>
						</select>
						
					</td>
					<td><?php echo $link_ispisi[$i]; ?> </td>
					<td><?php echo $tip_ispisi[$i]; ?> </td>
					
						
							<input type="hidden" name="barcode" value="<?php echo $barcode[$i] ?>">
							<input type="hidden" name="naziv" value="<?php echo $naziv[$i] ?>">
							<input type="hidden" name="proizvodjac" value="<?php echo $proizvodjac[$i] ?>">
							<input type="hidden" name="cena" value="<?php echo $cena[$i] ?>">
							
							<input type="hidden" name="link" value="<?php echo $link[$i] ?>">
							<input type="hidden" name="tip" value="<?php echo $tip[$i] ?>">

							<td><input type="number" name="kolicina"><td>
							<input type="submit" name="naruci" value="Naruci">
						</form>
				<tr> <?php
			} ?>
			</table> <?php

	}
}