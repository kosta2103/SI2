<?php
session_start();
if(isset($_SESSION['pristup']) && ($_SESSION['pristup'] == "Administrator" || $_SESSION['pristup'] == "Vlasnik" || $_SESSION['pristup'] == "Komercijalista" || $_SESSION['pristup'] == "Radnik")){
$imefajla = $_POST['fajl'];
 
      header('Content-Disposition: inline; filename="'.$imefajla.'"');
      header('Content-Type: application/pdf');
      header('Content-Length: '.filesize($imefajla));
      readfile($imefajla);

}
else{
    header('Location: login.php');
    exit();
}