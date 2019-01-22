<?php 
    session_start();
    if(isset($_SESSION['pristup']) && ($_SESSION['pristup'] == "Administrator" || $_SESSION['pristup'] == "Vlasnik")){
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
		

        
		<link rel="stylesheet" href="prikaz.css">
		<link rel="stylesheet" href="navbar.css">
			
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
                        <li class="nav-item dropdown active">
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
		<div class="config">								
			<div class="container big">
                <div class="row">
                    <div class="col">
                        <div class="container">
							<?php 															
								$sql = "SELECT * FROM autorizovani_korisnici";
								$niz_izabranih = $veza->query($sql)->fetch_all(MYSQLI_ASSOC);													
                                ?>
									<table align = 'center' border = 1>
										<?php
											if(!empty($niz_izabranih[0]))
											{
												echo "<tr>";
												foreach(array_keys($niz_izabranih[0]) as $line)
												{
													echo "<th>".$line."</th>";
												}
												?>												

												</tr>

												<?php
											}
											$i = 0;
											foreach($niz_izabranih as $line1)
											{
												echo "<tr>";
													foreach($line1 as $line2)
													{
                                                        echo "<td>$line2</td>";
													}	
													$id = $niz_izabranih[$i]["ID"];
													?>
													<td>											 	
													 	<form action="izmeni_korisnika.php" method="GET">
													 		<input type="hidden" name="id" value="<?php echo $id ?>">
													 		<button type="submit" title="Edit"><i class="glyphicon glyphicon-edit"></i></button>
													 	</form>
														<form action="obrisi_korisnika.php" method="GET">
															<input type="hidden" name="id" value="<?php echo $id ?>">
															<button type="submit" title="Obrisi"><i class="glyphicon glyphicon-remove"></i></button>
														</form>
													 </td>

													 <?php	
													 $i++;											
												echo "</tr>";

											}



										?>
										
									</table>
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
		</div>		
	</body>
</html>
<?php
}
else{
    header('Location: login.php');
    exit();
}