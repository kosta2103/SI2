<?php
session_start();
if(isset($_SESSION['pristup']) && ($_SESSION['pristup'] == "Administrator" || $_SESSION['pristup'] == "Vlasnik")){
$veza = mysqli_connect("localhost", "root", "", "SI2");
$barcode = $_GET["barkod"];
$sql = "SELECT Tip FROM proizvodi WHERE Barcode = '".$barcode."'";
$result = mysqli_query($veza, $sql);
$tip1 = mysqli_fetch_row($result);
$tabela_tip = $tip1[0];
$sql = "DELETE FROM $tabela_tip WHERE Barcode = '".$barcode."'";
mysqli_query($veza, $sql);
$sql = "DELETE FROM proizvodi WHERE Barcode = '".$barcode."'";
mysqli_query($veza, $sql);
?>

<script>
           window.location.href = 'prikaz.php?Tip=proizvodi';
</script>
<?php
}
else{
    header('Location: login.php');
    exit();
}