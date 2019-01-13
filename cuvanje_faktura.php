<?php
	session_start();
?>

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
		<link rel="stylesheet" href="cuvanje_faktura.css">
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
						Dodavanje
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="dodavanje_korisnika.php.">Korisnika</a>
							<a class="dropdown-item" href="dodaj1.php">Proizvoda</a>	
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="prikaz.php?Tip=proizvodi">Prikaz</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="promena_cene1.php">Akcije</a>
					</li>
					<li class="nav-item dropdown active">
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

		if($_SESSION['sesija'] == 'komercijalista')
		{ ?>
			<nav class="navbar fixed-top navbar-expand-lg">
				<a class="navbar-brand" href="#">Komercijalista</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="komercijalista.php">Pocetna </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="prikaz.php?Tip=proizvodi">Prikaz</a>
					</li>
					<li class="nav-item dropdown active">
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
	?>

	<div class="container upload">
		<form action="cuvanje_faktura_1.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<div class="custom-file">
					<input type="file" name="file" class="custom-file-input" id="validatedCustomFile" required>
					<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
				</div>
			</div>
			<div class="form-grouo">
				<button type="submit" class="btn btn-primary btn-block size"><i class="glyphicon glyphicon-upload"></i> Upload</button>
			</div>
		</form>
	</div>
</body>
</html>



<?php 


 ?>