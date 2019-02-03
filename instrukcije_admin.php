<?php 
    session_start();
    if(isset($_SESSION['pristup']) && ($_SESSION['pristup'] == "Administrator" || $_SESSION['pristup'] == "Vlasnik" || $_SESSION['pristup'] == "Komercijalista" || $_SESSION['pristup'] == "Radnik")){
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
        <link rel="stylesheet" href="instrukcije.css">
        <link rel="stylesheet" href="navbar.css">
        
            <style>
                .dropbtn {
  background-color: #CD5C5C;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
 
  display: inline-block;
  position: relative;

}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #CD5C5C;}
    h3{
        text-align: center;
    }
    
</style>
        
            
    </head>

    <body>
        <?php 
            if($_SESSION['sesija'] == 'admin')
            { ?>
                <nav class="navbar fixed-top navbar-expand-lg">
                    <a class="navbar-brand" href="admin.php">Admin</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="help.php">O nama </a>
                        </li>
                        
                         <li class="nav-item active">
                            <a class="nav-link" href="instrukcije_admin.php">Uputstvo za admina</a>
                        </li>           
                        <li class="nav-item">
                            <a class="nav-link" href="instrukcije_komercijalista.php">Uputstvo za komercijalistu</a>
                        </li>           
                        <li class="nav-item">
                            <a class="nav-link" href="instrukcije_radnik.php">Uputstvo za radnika</a>
                        </li>   
                        <li>
                             <div class="dropdown">
  <button class="dropbtn">INSTRUKCIJE</button>
  <div class="dropdown-content">
    <a href="dodavanje_korisnika.php">Dodavanje novih korisnika</a>
    <a href="prikaz_korisnika.php">Prikaz postojecih korisnika</a>
    <a href="dodaj1.php">Dodavanje novih proizvoda</a>
    <a href="prikaz.php">Prikaz postojecih proizvoda</a>
    <a href="prikaz_racuni.php">Prikaz svih racuna</a>
    <a href="zamena.php">Zamena racuna</a>

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
           <div class="container">
    <br><br>
  <br><br><br><br><br><br><br><br><br>
  <div class="container">
  <p>Ukoliko se na sajt prodavnice ulogujete kao jedan od autorizovanih korisnika 'admin' ili 'vlasnik', na pocetnoj strani naici cete na graficki prikaz o slaboj, jakoj i nepromenjenoj prodaji proizvoda. U donjem desnom uglu pocetne strane, postoji prozor koji se otvara klikom na dugme 'Obavestenja' i u kome dobijate informacije o tome koji proizvod treba biti snizen i koliko. Klikom na dugme Potvrdi, odobravate preporuceni popust. Autorizovani korisnici, admin i vlasnik, imaju pravo dodavanja novih proizvoda, korisnika i faktura kao i prikaz postojecih proizvoda, korisnika i faktura. U okviru uvida u postojece proizvode, korisnike ili fakture, adminu ili vlasniku je dozvoljena funkcija izmene informacija ili brisanje odredjenih korisnika, izmene, brisanja i dodavanja u korpu za narucivanje potrebnih proizvoda ili faktura. U okviru admin stranice, omoguceno vam je jos i menjanje postojece cene, koje se vrsi procentualno.
    U padajucem meniju 'Instrukcije', iznad, imate vezu na svaku pojedinacnu instrukciju iz ovog teksta, koja je omogucena adminu ili vlasniku.   </p>
    </div>

</div>

            <?php
            }
            

            if($_SESSION['sesija'] == 'radnik')
            { ?>
                <nav class="navbar fixed-top navbar-expand-lg">
                    <a class="navbar-brand" href="radnik.php">Radnik</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item active">
                            <a class="nav-link" href="help.php">O nama </a>
                        </li>
                        
                         <li class="nav-item">
                            <a class="nav-link" href="instrukcije_admin.php">Uputstvo za admina</a>
                        </li>           
                        <li class="nav-item">
                            <a class="nav-link" href="instrukcije_komercijalista.php">Uputstvo za komercijalistu</a>
                        </li>           
                        <li class="nav-item">
                            <a class="nav-link" href="instrukcije_radnik.php">Uputstvo za radnika</a>
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
                <div class="container">
    <br><br>
  <br><br><br><br><br><br><br><br><br>
  <p>Ukoliko se na sajt prodavnice ulogujete kao jedan od autorizovanih korisnika 'admin' ili 'vlasnik', na pocetnoj strani naici cete na graficki prikaz o slaboj, jakoj i nepromenjenoj prodaji proizvoda. <br> U donjem desnom uglu pocetne strane, postoji prozor koji se otvara klikom na dugme 'Obavestenja' i u kome dobijate informacije o tome koji proizvod treba biti snizen i koliko. Klikom na dugme Potvrdi, odobravate preporuceni popust. <br> Autorizovani korisnici, admin i vlasnik, imaju pravo dodavanja novih proizvoda, korisnika i faktura kao i prikaz postojecih proizvoda, korisnika i faktura. U okviru uvida u postojece proizvode, korisnike ili fakture, adminu ili vlasniku je dozvoljena funkcija izmene informacija ili brisanje odredjenih korisnika, izmene, brisanja i dodavanja u korpu za narucivanje potrebnih proizvoda ili faktura. <br> U okviru admin stranice, omoguceno vam je jos i menjanje postojece cene, koje se vrsi procentualno.  </p>
</div>
            <?php
            }
            

            if($_SESSION['sesija'] == 'komercijalista')
            { ?>
                <nav class="navbar fixed-top navbar-expand-lg">
                    <a class="navbar-brand" href="komercijalista.php">Komercijalista</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                         <li class="nav-item active">
                            <a class="nav-link" href="help.php">O nama </a>
                        </li>
                        
                         <li class="nav-item">
                            <a class="nav-link" href="instrukcije_admin.php">Uputstvo za admina</a>
                        </li>           
                        <li class="nav-item">
                            <a class="nav-link" href="instrukcije_komercijalista.php">Uputstvo za komercijalistu</a>
                        </li>           
                        <li class="nav-item">
                            <a class="nav-link" href="instrukcije_radnik.php">Uputstvo za radnika</a>
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
                <div class="container">
    <br><br>
  <br><br><br><br><br><br><br><br><br>
  <p>Ukoliko se na sajt prodavnice ulogujete kao jedan od autorizovanih korisnika 'admin' ili 'vlasnik', na pocetnoj strani naici cete na graficki prikaz o slaboj, jakoj i nepromenjenoj prodaji proizvoda. <br> U donjem desnom uglu pocetne strane, postoji prozor koji se otvara klikom na dugme 'Obavestenja' i u kome dobijate informacije o tome koji proizvod treba biti snizen i koliko. Klikom na dugme Potvrdi, odobravate preporuceni popust. <br> Autorizovani korisnici, admin i vlasnik, imaju pravo dodavanja novih proizvoda, korisnika i faktura kao i prikaz postojecih proizvoda, korisnika i faktura. U okviru uvida u postojece proizvode, korisnike ili fakture, adminu ili vlasniku je dozvoljena funkcija izmene informacija ili brisanje odredjenih korisnika, izmene, brisanja i dodavanja u korpu za narucivanje potrebnih proizvoda ili faktura. <br> U okviru admin stranice, omoguceno vam je jos i menjanje postojece cene, koje se vrsi procentualno. </p>
</div>
            <?php
            }
        ?>

    </body>
    </html>
    <?php
}
else{
    header('Location: login.php');
    exit();
}
