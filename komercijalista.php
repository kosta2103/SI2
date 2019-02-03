<?php 
    session_start();
    if(isset($_SESSION['pristup']) && ($_SESSION['pristup'] == "Komercijalista")){
    $_SESSION['sesija'] = 'komercijalista';
    $_SESSION['korpa'] = array(); 
    $konekcija = mysqli_connect("localhost", "root", "", "SI2");
?>


<html>

    <header>
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
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="form.css">
    </header>

    <body>
        <?php 
            if($_SESSION['sesija'] == 'komercijalista')
            { ?>
                <nav class="navbar fixed-top navbar-expand-lg">
                    <a class="navbar-brand" href="#">Komercijalista</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Roba
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="listanarucenih.php">Narucivanje</a>
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
            ?>
        
        <?php
            $datum = '2018-01-01';
            $niz1 = $konekcija->query("SELECT Naziv, Barcode, Kolicina, Broj_prodatih_primeraka, Datum_poslednje_prodaje FROM proizvodi WHERE 100*Broj_prodatih_primeraka/(Broj_prodatih_primeraka + Kolicina) < 20")->fetch_all(MYSQLI_ASSOC);
            $niz2 = $konekcija->query("SELECT Naziv, Barcode, Kolicina, Broj_prodatih_primeraka, Datum_poslednje_prodaje FROM proizvodi WHERE 100*Broj_prodatih_primeraka/(Broj_prodatih_primeraka + Kolicina) > 90")->fetch_all(MYSQLI_ASSOC);
            $niz3 = $konekcija->query("SELECT Naziv, Barcode, Kolicina, Broj_prodatih_primeraka, Datum_poslednje_prodaje FROM proizvodi WHERE Datum_poslednje_prodaje < '$datum'")->fetch_all(MYSQLI_ASSOC);
        ?>

    <script src="//www.google-analytics.com/analytics.js"></script>
    <script src="https://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
    <script src="https://www.chartjs.org/samples/latest/utils.js"></script>

    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <canvas id="chart-area1" class="chartjs-render-monitor">

                </canvas>
                <h2>Proizvodi kod kojih je procenat prodatih te vrste manji od 20 % (slaba prodaja)</h2>
            </div>

            <div class="col-sm-6">
                <canvas id="chart-area2" class="chartjs-render-monitor">

                </canvas>
                <h2>Proizvodi kod kojih je procenat prodatih te vrste veci od 90 % (jaka prodaja)</h2>
            </div>
        </div>
        <div class="row donji">
            <div class="col">
            
            </div>
            <div class="col-sm-7">
                <canvas id="canvas">

                </canvas>
                <h2>Proizvodi cije stanje nije promenjeno nakon <?php echo $datum ?></h2>
            </div>

            <div class="col">
               
            </div>
        </div>
        
    </div>
   
    
    <script>
        var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
         };

        var config1 = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        <?php
                           foreach($niz1 as $line)
                           {
                                echo (100*$line['Broj_prodatih_primeraka'])/($line['Broj_prodatih_primeraka']+$line['Kolicina']);?>,<?php
                           } 
                        ?>
                    ],
                    backgroundColor: [
                        <?php
                           foreach($niz1 as $line)
                           {?>
                                dynamicColors(),
                           <?php
                           } 
                        ?>
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    <?php
                        foreach($niz1 as $line)
                        {
                            echo "[";
                            echo "'%',";
                            echo "'Barcode: ".$line['Barcode']."',";
                            echo "],";
                        } 
                    ?>
                ]
            },
            options: {
                responsive: true
            }
        };

        var config2 = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        <?php
                           foreach($niz2 as $line)
                           {
                                echo (100*$line['Broj_prodatih_primeraka'])/($line['Broj_prodatih_primeraka']+$line['Kolicina']);?>,<?php
                           } 
                        ?>
                    ],
                    backgroundColor: [
                        <?php
                           foreach($niz2 as $line)
                           {?>
                                dynamicColors(),
                           <?php
                           } 
                        ?>
                    ],
                    label: 'Dataset 1'
                }],
                labels: [
                    <?php
                        foreach($niz2 as $line)
                        {
                            echo "[";
                            echo "'%',";
                            echo "'Barcode: ".$line['Barcode']."',";
                            echo "],";
                        } 
                    ?>
                ]
            },
            options: {
                responsive: true
            }
        };

        var barChartData = {
            labels: [
                <?php
                    foreach($niz3 as $line)
                    {
                        echo "[";
                        echo "'Barcode: ".$line['Barcode']."',";
                        echo "'Datum: ".$line['Datum_poslednje_prodaje']."',";
                        echo "],";
                    } 
                ?>
            ],
            datasets: [{
                label: 'Kolicina',
                backgroundColor: dynamicColors(),
                yAxisID: 'y-axis-1',
                data: [
                    <?php
                        foreach($niz3 as $line)
                        {
                            echo "'".$line['Kolicina']."'";
                            
                            ?>,<?php
                        } 
                    ?>
                ]
            }]

        };

        window.onload = function() {
            var ctx1 = document.getElementById('chart-area1').getContext('2d');
            window.myPie = new Chart(ctx1, config1);
            var ctx2 = document.getElementById('chart-area2').getContext('2d');
            window.myPie = new Chart(ctx2, config2);
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: true
                    },
                    scales: {
                        yAxes: [{
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'left',
                            id: 'y-axis-1',
                        },],
                    }
                }
            });
        };
    </script>

    <?php
$datum = date('Y-m-d');

function month($date1, $date2) {
    $d1 = DateTime::createFromFormat("Y-m-d", $date1);
    $d2 = DateTime::createFromFormat("Y-m-d", $date2);
    $difference = $d1->diff($d2);
    return $difference->m;
}

function year($date1, $date2) {
    $d1 = DateTime::createFromFormat("Y-m-d", $date1);
    $d2 = DateTime::createFromFormat("Y-m-d", $date2);
    $difference = $d1->diff($d2);
    return $difference->y;
}


$sql = "SELECT * FROM proizvodi";
$result = mysqli_query($konekcija, $sql);

$barcode = array();
$cene = array();
$poslednja_prodaja = array();
$id = array();
$barkod = array();
$procenatA = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($barcode, $row["Barcode"]);
    array_push($cene, $row["Cena"]);
    array_push($poslednja_prodaja, $row["Datum_poslednje_prodaje"]);
}
$vrsta = "Slaba_prodaja";
$sql = "SELECT * FROM snizenje WHERE Vrsta = '".$vrsta."'";
$result = mysqli_query($konekcija, $sql);

if($result != null){
    while($row = mysqli_fetch_assoc($result)){
        array_push($barkod, $row["Naziv"]);
        array_push($procenatA, $row["Procenat"]);
    }
}

$barkod11 = array();
$cena11 = array();
$procenat11 = array();
$radnja11 = array();

for($i=0; $i<sizeof($barcode); $i++){
    if((month($poslednja_prodaja[$i], $datum) == 1) && (year($poslednja_prodaja[$i], $datum) == 0)){
        if(!(in_array($barcode[$i], $barkod))){
            $procenat = -0.05;
            $cena = $cene[$i] + ($cene[$i]) * $procenat;

            array_push($barkod11, $barcode[$i]);
            array_push($cena11, $cena);
            array_push($procenat11, "-5");
            array_push($radnja11, "upis");
        }
    }
    elseif((month($poslednja_prodaja[$i], $datum) == 2) && (year($poslednja_prodaja[$i], $datum) == 0)){
        if(!(in_array($barcode[$i], $barkod))){
            $procenat = -0.1;
            $cena = $cene[$i] + ($cene[$i]) * $procenat;

            array_push($barkod11, $barcode[$i]);
            array_push($cena11, $cena);
            array_push($procenat11, "-10");
            array_push($radnja11, "upis");
        }
        else{
            $key = array_search($barcode[$i], $barkod);
            if($procenatA[$key] != "-10"){
                $procenat = -0.05;
                $cena = $cene[$i] + ($cene[$i]) * $procenat;

                array_push($barkod11, $barcode[$i]);
                array_push($cena11, $cena);
                array_push($procenat11, "-10");
                array_push($radnja11, "update");
            }
        }
    }
    elseif((month($poslednja_prodaja[$i], $datum) >= 3) || (year($poslednja_prodaja[$i], $datum) > 0)){
        if(!(in_array($barcode[$i], $barkod))){
            $procenat = -0.15;
            $cena = $cene[$i] + ($cene[$i]) * $procenat;

            array_push($barkod11, $barcode[$i]);
            array_push($cena11, $cena);
            array_push($procenat11, "-15");
            array_push($radnja11, "upis");

        }
        else{
            $key = array_search($barcode[$i], $barkod);
            if($procenatA[$key] != "-15"){
                $procenat = -0.05;
                $cena = $cene[$i] + ($cene[$i]) * $procenat;

                array_push($barkod11, $barcode[$i]);
                array_push($cena11, $cena);
                array_push($procenat11, "-15");
                array_push($radnja11, "update");
            }
        }
    }
}
?>

<button class="open-button" onclick="openForm()">Obavestenja</button>
<div class="form-popup" id="myForm">
<div class="form-container">
<form action="automatizovana_akcija.php">

    <?php 
if(sizeof($barkod11) > 0){ 
    for($i=0; $i<sizeof($barkod11); $i++){
?>

<form action="automatizovana_akcija.php" method="POST" >

    
    Barcode: <?php echo $barkod11[$i] ?>
    Procenat: <?php echo $procenat11[$i] ?>

    <input type="hidden" name="barkod" value="<?php echo $barkod11[$i] ?>">
    <input type="hidden" name="cena" value="<?php echo $cena11[$i] ?>">
    <input type="hidden" name="procenat" value="<?php echo $procenat11[$i] ?>">
    <input type="hidden" name="radnja" value="<?php echo $radnja11[$i] ?>"> 
    <button type="submit" class="btn" name="potvrda">Potvrdi</button>

     </form>
    <?php }} 
    else{
        echo "Nema obavestenja!";
 } ?> 
    
    <button type="button" class="btn cancel" onclick="closeForm()">Zatvori</button>
  </form></div></div>


<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>    
<?php
}
else{
    header('Location: login.php');
    exit();
}