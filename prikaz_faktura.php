
<?php 

$dir = "D:\wamp64\www\Projekat";
if(is_dir($dir)){
	if($dh = opendir($dir)){

		while(($file=readdir($dh)) !== false){
	
		echo "Ime fajla:". $file. "<br>";
		
		}
		closedir($dh);
	}
}

echo "Koji zelite da otvorite?";

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style>
 		body{

 			text-align: center;
			background-color: #FFEBCD;
 		}

 
 	</style>
 </head>
 <body>
 <form action="otvaranje.php" method="POST">
 	<input type="text" name="fajl">
 	<input type="submit" name=dugme value="Otvori">

 </form>
 </body>
 </html>




