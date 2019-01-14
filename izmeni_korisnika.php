<?php 
	session_start();
?>

<html>
	<head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

		<link rel="stylesheet" href="dodaj1.css">
		<link rel="stylesheet" href="navbar.css">
		<link rel="stylesheet" href="izmena_korisnika.css">
	</head>

	<body>
	<?php 
		if($_SESSION['sesija'] == 'admin')
		{ ?>
			<nav class="navbar fixed-top navbar-expand-lg">
				<a class="navbar-brand" href="#">Admin</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="admin.php">Pocetna </a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Korisnici
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="dodavanje_korisnika.php.">Dodavanje</a>
							<a class="dropdown-item" href="prikaz_korisnika.php">Prikaz</a>	
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Proizvodi
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="dodaj1.php.">Dodavanje</a>
							<a class="dropdown-item" href="prikaz.php?Tip=proizvodi">Prikaz</a>	
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="promena_cene1.php">Akcije</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Fakture
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="cuvanje_faktura.php">Upload</a>
							<a class="dropdown-item" href="prikaz_faktura.php">Prikaz</a>	
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Roba
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="listanarucenih.php">Narucivanje</a>
							<a class="dropdown-item" href="nema_na_stanju.php">Nema na stanju</a>
							<a class="dropdown-item" href="pristigla_roba.php">Prijem</a>	
						</div>
					</li>               
					</ul>
				</div>
				<div>
					<a class="color"><?php echo $_SESSION['email'] ?></a>
					<a class="nav-item" href="logout.php">
						<i class="glyphicon glyphicon-log-out"></i>
					</a> 
				</div>
			</nav>
		<?php
		}

if(isset($_POST["izmeni"])){
	$id = $_POST["id"];
	$veza = mysqli_connect("localhost", "root", "", "SI2");
	$sql = "SELECT * FROM autorizovani_korisnici WHERE ID = '".$id."'";
	$result = mysqli_query($veza, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$ime = $row['Ime'];
		$prezime = $row['Prezime'];
		$email = $row['E_mail_adresa'];
		$password = $row['Password'];
		$pristup = $row['Nivo_pristupa'];
	}
	if(($_POST['ime']) != ""){
		$ime = $_POST["ime"];
	}
	if(($_POST['prezime']) != ""){
		$prezime = $_POST["prezime"];
	}
	if(($_POST['email']) != ""){
		$email = $_POST["email"];
	}
	if(($_POST['password']) != ""){
		$password = $_POST["password"];
	}
	if(($_POST['pristup']) != ""){
		$pristup = $_POST["pristup"];
	}
	$sql = "UPDATE autorizovani_korisnici SET Ime ='" .$ime. "', Prezime = '" .$prezime. "', E_mail_adresa = '" .$email. "', Password = '" .$password. "', Nivo_pristupa = '" .$pristup. "' WHERE ID = '" .$id. "'";
	$veza->query($sql) or die($veza->error);

	?>

<script>
           window.location.href = 'prikaz_korisnika.php';
</script> <?php
}
else{ 
	$id = $_GET["id"];
	?>
	<div class="container izmena_korisnika">	
		<form action="izmeni_korisnika.php" method="POST">
			<div class="col">
				<div class="form-group">									
					<input type="text" name="ime" placeholder="Ime" class="form-control selectTip" autofocus>
				</div>
				<div class="form-group">
					<input type="text" name="prezime" placeholder="Prezime" class="form-control selectTip" autofocus>
				</div>
				<div class="form-group">
					<input type="text" name="email" placeholder="E-mail" class="form-control selectTip" autofocus>
				</div>
				<div class="form-group">
					<input type="text" name="password" placeholder="Password" class="form-control selectTip" autofocus>
				</div>
				<div class="form-group">
					<select name="pristup" class="form-control">
						<option value="">Odaberi nivo pristupa</option>
						<option value="Administrator">Administrator</option>
						<option value="Vlasnik">Vlasnik</option>
						<option value="Komercijalista">Komercijalista</option>
						<option value="Radnik">Radnik</option>
					</select>
				</div>
				<div class="form-group">    
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<button type="submit" name="izmeni" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-edit"></i> Izmeni</button>  
				</div>
			</div>
		</form>
	</div>
<?php }

?>
	</body>
</html>