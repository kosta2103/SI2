<?php
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
}
?>
<script>
        window.location.href = 'admin.php';
</script>