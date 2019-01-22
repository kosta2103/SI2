<?php
session_start();
if(isset($_SESSION['pristup']) && ($_SESSION['pristup'] == "Administrator" || $_SESSION['pristup'] == "Vlasnik")){
$veza = mysqli_connect("localhost", "root", "", "SI2");
$id = $_GET["id"];
$sql = "DELETE FROM autorizovani_korisnici WHERE ID = '".$id."'";
mysqli_query($veza, $sql);
?>

<script>
           window.location.href = 'prikaz_korisnika.php';
</script>
<?php
}
else{
    header('Location: login.php');
    exit();
}