<?php

	session_start();
	$connect = mysqli_connect("localhost", "root", "", "si2");
	
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
		
		<?php 
		
			foreach(array_keys($_SESSION["korpa"]) as $element)
			{
				echo $element. " : ". $_SESSION["korpa"][$element]."<br>";
			}

		?>

	</body>
</html>