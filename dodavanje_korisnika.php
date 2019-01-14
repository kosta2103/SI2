<?php
	session_start();
	$veza = mysqli_connect("localhost", "root", "", "SI2");
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

        
		<link rel="stylesheet" href="dodaj1.css">
		<link rel="stylesheet" href="navbar.css">
		<link rel="stylesheet" href="korisnik.css">
			
    </head>

	<body>
		<nav class="navbar sticky-top navbar-expand-lg">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Pocetna <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown active">
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

		<div class="config">								
			<div class="form-horizontal" role="form">
				<div class="container">
					<div class="row">
						<div class="col">					
							<div class="form-group">
								<div class="col">
									<form id="form1" action="dodavanje_korisnika.php" method="POST">
										<div class="form-group">
											<label class="col-sm-3 control-label">Ime</label>
											<div class="col-sm-9">
												<input type="text" name="ime" placeholder="Ime" class="form-control" autofocus required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Prezime</label>
											<div class="col-sm-9">
												<input type="text" name="prezime" placeholder="Prezime" class="form-control" autofocus required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">E-mail</label>
											<div class="col-sm-9">
												<input type="email" name="email" placeholder="E-mail" class="form-control" autofocus required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Password</label>
											<div class="col-sm-9">
												<input type="password" name="password" placeholder="Password" class="form-control" autofocus required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-3"></div>
											<div class="col-sm-9">
												<select name="Nivo_pristupa" class="form-control" required>
													<option value="" selected disabled hidden >Odaberi nivo pristupa</option>
													<option value="Administrator">Administrator</option>
													<option value="Vlasnik">Vlasnik</option>
													<option value="Komercijalista">Komercijalista</option>
													<option value="Radnik">Radnik</option>
												</select>
											</div>
										</div>
										<div class="form-group">    
											<div class="col-sm-3"></div>
											<div class="col-sm-9">
												<button type="submit" name="dodaj" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-plus"></i> Dodaj</button>                                 
											</div>
										</div>
									</form>
								</div>
							</div>

						<?php
							if (isset($_POST["dodaj"])) {
								$select = $_POST["Nivo_pristupa"];
								$ime = $_POST["ime"];
								$prezime = $_POST["prezime"];
								$email = $_POST["email"];
								$password = $_POST["password"];

								$sql = "INSERT INTO AUTORIZOVANI_KORISNICI (Ime, Prezime, E_mail_adresa, Password, Nivo_pristupa) VALUES ('$ime', '$prezime', '$email', '$password', '$select')";
								$veza->query($sql) or die($veza->error);
						?>
						<script>
           					window.location.href = 'dodavanje_korisnika.php';
						</script>
					<?php } ?>
						</div>                                                                
					</div>   
				</div>                                
			</div>					
		</div>
		<div class="bottom">											
			<div class="divider2">&nbsp;</div>
			<ul id="foot">
			</ul>
		</div>
	</body>
</html>