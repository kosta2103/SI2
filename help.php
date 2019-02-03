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
		<link rel="stylesheet" href="navbar.css">
        <style>
            <style>
    h3{
        text-align: center;
    }
    p{
        text-align: center;

    }
</style>
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
  <p>Ime prodavnice je prodavnica koja nudi sirok asortiman racunarske opreme. <br>
    Kako bi autorizovani korisnici na sto laksi nacin mogli da vrse razne izmene i dopune, kako bi sajt bio sto laksi za koriscenje, <br>
    ovaj sajt nudi svakom posebno autorizovanom korisniku sirok spektar mogucnosti. <br>
  Da biste imali uvida sta je kom korisniku dozvoljeno u padajucem meniju, iznad, data Vam je mogucnost uvida u sve opcije svakog pojedinacno korisnika. </p>
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
                            <a class="nav-link" href="help1.php">O nama </a>
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
  <p>Ime prodavnice je prodavnica koja nudi sirok asortiman racunarske opreme. <br>
    Kako bi autorizovani korisnici na sto laksi nacin mogli da vrse razne izmene i dopune, kako bi sajt bio sto laksi za koriscenje, <br>
    ovaj sajt nudi svakom posebno autorizovanom korisniku sirok spektar mogucnosti. <br>
  Da biste imali uvida sta je kom korisniku dozvoljeno u padajucem meniju, iznad, data Vam je mogucnost uvida u sve opcije svakog pojedinacno korisnika. </p>
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
                            <a class="nav-link" href="help1.php">O nama </a>
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
  <p>Ime prodavnice je prodavnica koja nudi sirok asortiman racunarske opreme. <br>
    Kako bi autorizovani korisnici na sto laksi nacin mogli da vrse razne izmene i dopune, kako bi sajt bio sto laksi za koriscenje, <br>
    ovaj sajt nudi svakom posebno autorizovanom korisniku sirok spektar mogucnosti. <br>
  Da biste imali uvida sta je kom korisniku dozvoljeno u padajucem meniju, iznad, data Vam je mogucnost uvida u sve opcije svakog pojedinacno korisnika. </p>
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
