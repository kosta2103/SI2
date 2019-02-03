<?php 
    session_start();
    if(isset($_SESSION['pristup']) && ($_SESSION['pristup'] == "Administrator" || $_SESSION['pristup'] == "Vlasnik" || $_SESSION['pristup'] == "Radnik")){
    $konekcija = mysqli_connect("localhost", "root", "", "SI2");
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

        <link rel="stylesheet" href="admin.css">
        <link rel="stylesheet" href="zamena.css">
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
                        <li class="nav-item dropdown active">
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

            if($_SESSION['sesija'] == 'radnik')
            { ?>
                <nav class="navbar fixed-top navbar-expand-lg">
                    <a class="navbar-brand" href="#">Radnik</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="radnik.php">Pocetna </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="prikaz.php?Tip=proizvodi">Prikaz</a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Racuni
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="prikaz_racuni.php">Prikaz</a>
                                <a class="dropdown-item" href="zamena.php">Zamena</a> 
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Roba
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="nema_na_stanju.php">Nema na stanju</a>
                            </div>
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

            <div class="container">
                <form action="" method="POST">
                    <div class="input-group">
                        <input name="br_racuna" type="number" class="form-control" placeholder="Broj racuna...">
                        <span class="input-group-btn">
                            <button name="pretrazi" class="btn btn-default" type="submit">Pretrazi!</button>
                        </span>
                    </div>
                </form>
            

            <?php
                if(isset($_POST["zameni"]))
                {
                    $_SESSION["zamena"] = $_POST["broj_racuna"];

                    echo"<script>window.location.href='prikaz.php?Tip=proizvodi'</script>";
                }
                if(isset($_POST["pretrazi"]))
                {
                    $br_racuna = $_POST["br_racuna"];
                    
                    $niz = $konekcija->query("SELECT Broj_racuna, Broj_povratnice FROM racuni")->fetch_all(MYSQLI_ASSOC);
                    $racuni = array();

                    foreach($niz as $line)
                    {
                        array_push($racuni, $line["Broj_racuna"]);
                    }

                    if(in_array($br_racuna, $racuni))
                    {
                        echo'<div class="form-group">
                        <a href="racuni/'.$br_racuna.'.pdf">'.$br_racuna.'</a>
                        </div>';


                        echo '<form action="" method="POST">
                            <input type="hidden" name="broj_racuna" value="'.$br_racuna.'">                        
                            <div class="form-group">
                                <button type="submit" name="zameni" class="btn btn-primary btn-block">Zameni!</button>
                            </div>                          
                        </form>';

                    }
                    else
                    {
                        echo'<script> alert("Uneti broj racuna se ne nalazi u bazi podataka!") </script>';
                    }  
                    
                }

                

            
            ?>
            </div>
    </body>
</html>
<?php
}
else{
    header('Location: login.php');
    exit();
}