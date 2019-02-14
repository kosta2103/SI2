<?php
		session_start();
        if(isset($_SESSION['pristup']) && ($_SESSION['pristup'] == "Administrator" || $_SESSION['pristup'] == "Vlasnik" || $_SESSION['pristup'] == "Komercijalista")){

	    $localhost = "localhost";
	    $username = "root";
	    $password = "";
	    $db_name = "SI2";
	    //echo "Uspostavljanje konekcije...<br>";
	    $konekcija = new mysqli($localhost, $username, $password);
	     mysqli_select_db($konekcija, $db_name);
	    //echo "Baza izabrana! <br>";
	    $sql = "SELECT * FROM NARUCENI";
        $result = $konekcija->query($sql);
	    

?> 

<html>
	<head>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
		<link rel="stylesheet" href="naruceni.css">
		
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
        						<a class="dropdown-item" href="dodavanje_korisnika.php">Dodavanje</a>
        						<a class="dropdown-item" href="prikaz_korisnika.php">Prikaz</a>	
        					</div>
        				</li>
                        <li class="nav-item dropdown">
        					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        					Proizvodi
        					</a>
        					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
        						<a class="dropdown-item" href="dodaj1.php">Dodavanje</a>
        						<a class="dropdown-item" href="prikaz.php?Tip=proizvodi">Prikaz</a>	
        					</div>
        				</li>
						<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Racuni
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="prikaz_racuni.php">Prikaz</a>
                                <a class="dropdown-item" href="zamena.php">Zamena</a> 
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
                        <li class="nav-item dropdown active">
        					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        					Roba
        					</a>
        					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="listanarucenih.php">Narucivanje</a>
                                <a class="dropdown-item" href="nema_na_stanju.php">Nema na stanju</a>
        						<a class="dropdown-item" href="pristigla_roba.php">Prijem</a>	
        					</div>
        				</li>
                        </li>       
                          <li class="nav-item">
                            <a class="nav-link" href="help.php">Help</a>
                        </li>           
                        </ul>              
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Fakture
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="cuvanje_faktura.php">Upload</a>
                                <a class="dropdown-item" href="prikaz_faktura.php">Prikaz</a>   
                            </div>
                        </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Roba
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="listanarucenih.php">Narucivanje</a>
                                <a class="dropdown-item" href="pristigla_roba.php">Prijem</a>   
                            </div>
                        </li>
                        </li>       
                          <li class="nav-item">
                            <a class="nav-link" href="help.php">Help</a>
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
		
		<div class="container naruceni">
			<table class="table" style="width: 100%">
				
				<tr>
					<th>ID</th>
					<th>Barkod</th>
					<th>Naziv</th>
					<th>Proizvodjac</th>
					<th>Cena</th>
					<th>Kolicina</th>
					<th>Dobavljac</th>
					<th>Link</th>
					<th>Email</th>
					<th>Tip</th>
					<th>Naruci</th>
				</tr>	

					<?php
					$sql = "SELECT * FROM NARUCENI";
					$result = $konekcija->query($sql);
					while ($red = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>{$red["ID"]}</td>";
					echo "<td>{$red["Barcode"]}</td>";
					echo "<td>{$red["Naziv"]}</td>";
					echo "<td>{$red["Proizvodjac"]}</td>";
					echo "<td>{$red["Cena"]}</td>";
					echo "<td>{$red["Kolicina"]}</td>";
					echo "<td>{$red["Dobavljac"]}</td>";
					echo "<td>{$red["Link"]}</td>";
					echo "<td>{$red["Email"]}</td>";
					echo "<td>{$red["Tip"]}</td>";
					$email = $red["Email"];
					$barkod = $red["Barcode"];
					$naziv = $red["Naziv"];
					$kolicina = $red ["Kolicina"];
					?>
		
					<td>
						<form id = "forma" action="" method="POST">
							<button name="naruci">Naruci</button>
							<input type="hidden" name="email" value="<?php  echo $email;       ?>">
							<input type="hidden" name="sifra" value="<?php  echo $barkod;       ?>">
							<input type="hidden" name="naziv" value="<?php  echo $naziv;       ?>">
							<input type="hidden" name="kolicina" value="<?php  echo $kolicina;       ?>">
						</form>
					</td>
					<?php
					echo "</tr>";
				}
					?>


			</table>
		</div>

		<?php
			if(isset($_POST["naruci"]))
			{
		?>
			

		<div id="id01" class="w3-modal" style="display: inline-block;z-index:4;">
            <div class="w3-modal-content w3-animate-zoom">
                <div class="w3-container w3-padding w3-red">
                <h2>Send Mail</h2>
                </div>
                <div class="w3-panel">
                <label>To</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?php echo $_POST["email"];    ?> ">
                <label>From</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?php echo "tim3@gmail.com";      ?>">
                <label>Subject</label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?php echo "Porudzbina"     ?>">
                <textarea class="w3-input w3-border w3-margin-bottom" style="height:150px" ><?php
                echo "Narudzbenica: \n\n";
                echo "Sifra proizvoda: " . $_POST["sifra"]. "\n";
                echo "Naziv proizvoda: " . $_POST["naziv"]. "\n";
				echo "Kolicina: "  . $_POST["kolicina"];          ?>
				</textarea>
                <div class="w3-section">
                    <form action = "" method = "POST">
                        <input type="hidden" name="email" value="<?php  echo $email;       ?>">
                        <input type="hidden" name="sifra" value="<?php  echo $barkod;       ?>">
                        <input type="hidden" name="naziv" value="<?php  echo $naziv;       ?>">
                        <input type="hidden" name="kolicina" value="<?php  echo $kolicina;       ?>">
                        <a class="w3-button w3-red" onclick="document.getElementById('id01').style.display='none'">Cancel  <i class="fa fa-remove"></i></a>
                        <button type="submit" name="dugme" class="w3-button w3-light-grey w3-right">Send  <i class="fa fa-paper-plane"></i></button>
                    </form>
                </div>    
                </div>
            </div>
		</div>
		<?php } 
            if(isset($_POST["dugme"]))
            {    
                $ime = date('Y_m_d_H_i_s');
                $fajl = fopen('mail/'.$ime.'.txt', 'a');

                $tekst = "Mail". "\n";
                fwrite($fajl, $tekst);

                $tekst = "To: ".$_POST["email"];
                fwrite($fajl, $tekst);

                $tekst = "\nFrom: tim3@gmail.com";
                fwrite($fajl, $tekst);

                $tekst = "\nSubject:";
                fwrite($fajl, $tekst);
                fwrite($fajl, "");

                $tekst = "\n\nPorudzbina: ";
                fwrite($fajl, $tekst);

                $tekst = "\nSifra proizvoda: ".$_POST["sifra"];
                fwrite($fajl, $tekst);

                $tekst = "\nNaziv proizvoda: ".$_POST["naziv"];
                fwrite($fajl, $tekst);

                $tekst = "\nKolicina: ".$_POST["kolicina"];
                fwrite($fajl, $tekst);
                fclose($fajl);

                $sifra = $_POST["sifra"];
                $konekcija->query("DELETE FROM NARUCENI WHERE Barcode = $sifra");
            
                echo"
                <script>
                    window.location.href = 'listanarucenih.php';
                    document.getElementById('id01').style.display='none';
                </script>";
            }?>
           
	</body>
</html>
<?php
}
else{
    header('Location: login.php');
    exit();
}