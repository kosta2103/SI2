<?php 
	session_start();

	if(isset($_SESSION['pristup']) && ($_SESSION['pristup'] == "Administrator" || $_SESSION['pristup'] == "Vlasnik" || $_SESSION['pristup'] == "Komercijalista")){

$targetfolder = "pdffajlovi/";

$targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

 $ok=1;

$file_type=$_FILES['file']['type'];

if ($file_type=="application/pdf") {

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

 {

 echo  basename( $_FILES['file']['name']);

 }

 else {

 echo "Problem uploading file";

 }

}

else {

 echo "You may only upload PDFs files.<br>";

}

	header("Location:cuvanje_faktura.php");

}
else{
    header('Location: login.php');
    exit();
}