<?php
session_start();
if(isset($_SESSION['pristup']) && ($_SESSION['pristup'] == "Administrator" || $_SESSION['pristup'] == "Vlasnik" || $_SESSION['pristup'] == "Komercijalista")){
$konekcija = mysqli_connect("localhost", "root", "", "SI2");

if(isset($_GET["potvrda"])){
    $barkod = $_GET["barkod"];
    $cena = $_GET["cena"]; 
    $procenat = $_GET["procenat"];
    $radnja = $_GET["radnja"];

    $sql = "UPDATE proizvodi SET Cena = '".$cena."' WHERE Barcode = '".$barkod."'";
    $konekcija->query($sql) or die($konekcija->error);

    if($radnja == "upis"){
        $sql = "INSERT INTO snizenje (Vrsta, Naziv, Procenat, Vazi) VALUES ('Slaba_prodaja', '".$barkod."', '".$procenat."', TRUE)";
        $konekcija->query($sql) or die($konekcija->error);
    }
    else{
        $sql = "UPDATE snizenje SET Procenat = '".$procenat."' WHERE Naziv = '".$barkod."'";   
        $konekcija->query($sql) or die($konekcija->error);
    }
?>
    <script>
        window.location.href = 'admin.php';
    </script> <?php
}

elseif(isset($_POST["potvrda"])){
    $barkod = $_POST["barkod"];
    $cena = $_POST["cena"]; 
    $procenat = $_POST["procenat"];
    $radnja = $_POST["radnja"];

    $sql = "UPDATE proizvodi SET Cena = '".$cena."' WHERE Barcode = '".$barkod."'";
    $konekcija->query($sql) or die($konekcija->error);

    if($radnja == "upis"){
        $sql = "INSERT INTO snizenje (Vrsta, Naziv, Procenat, Vazi) VALUES ('Slaba_prodaja', '".$barkod."', '".$procenat."', TRUE)";
        $konekcija->query($sql) or die($konekcija->error);
    }
    else{
        $sql = "UPDATE snizenje SET Procenat = '".$procenat."' WHERE Naziv = '".$barkod."'";   
        $konekcija->query($sql) or die($konekcija->error);
    }
?>
    <script>
        window.location.href = 'komercijalista.php';
    </script> <?php
}
}
else{
    header('Location: login.php');
    exit();
}