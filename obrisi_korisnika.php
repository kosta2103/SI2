<?php
$veza = mysqli_connect("localhost", "root", "", "SI2");
$id = $_GET["id"];
$sql = "DELETE FROM autorizovani_korisnici WHERE ID = '".$id."'";
mysqli_query($veza, $sql);
?>

<script>
           window.location.href = 'prikaz_korisnika.php';
</script>