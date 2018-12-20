<?php

	    $localhost = "localhost";
	    $username = "root";
	    $password = "";
	    $db_name = "SI2";

	    //echo "Uspostavljanje konekcije...<br>";
	    $konekcija = new mysqli($localhost, $username, $password);
	     mysqli_select_db($konekcija, $db_name);
	    //echo "Baza izabrana! <br>";

	    $sql = "SELECT * FROM NARUCENI";
        $result = $konekcija->query($sql);

	    
/*if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>". "<br>". "id: " . $row["ID"]. " - Barkod: " . $row["Barcode"]. " " . $row["Naziv"]. "<br>"?>    
        */

        ?>    <!DOCTYPE html>
<html>
<head>
	<title>Lista narucenih proizvoda</title>
	<h1>Lista narucenih proizvoda</h1>

	<br>
	<br>
	<br>
	<style>
body{

	background-color: #FFEBCD;
	text-align: center;
}



</style>
</head>
<body>

   <table style="width: 100%">
   	
   	<tr>
   		<th>ID</th>
   		<th>Barkod</th>
   		<th>Naziv</th>
   		<th>Proizvodjac</th>
   		<th>Cena</th>
   		<th>Kolicina</th>
   		<th>Dobavljac</th>
   		<th>Link</th>
   		<th>Email</th>
   		<th>Tip</th>
   		<th>Naruci</th>
   		</tr>	

   		<?php
        $sql = "SELECT * FROM NARUCENI";
        $result = $konekcija->query($sql);
        while ($red = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>{$red["ID"]}</td>";
		echo "<td>{$red["Barcode"]}</td>";
		echo "<td>{$red["Naziv"]}</td>";
		echo "<td>{$red["Proizvodjac"]}</td>";
		echo "<td>{$red["Cena"]}</td>";
		echo "<td>{$red["Kolicina"]}</td>";
		echo "<td>{$red["Dobavljac"]}</td>";
		echo "<td>{$red["Link"]}</td>";
		echo "<td>{$red["Email"]}</td>";
		echo "<td>{$red["Tip"]}</td>";
		$email = $red["Email"];
		$barkod = $red["Barcode"];
		$naziv = $red["Naziv"];
		$kolicina = $red ["Kolicina"];
		?>
        <!DOCTYPE html>
        <html>
        <head>
        	<title></title>
        </head>
        <body>
        	<td>
        <form action="narucivanje.php" method="POST">
        	<button>Naruci</button>
        	<input type="hidden" name="email" value="<?php  echo $email;       ?>">
        	<input type="hidden" name="sifra" value="<?php  echo $barkod;       ?>">
        	<input type="hidden" name="naziv" value="<?php  echo $naziv;       ?>">
        	<input type="hidden" name="kolicina" value="<?php  echo $kolicina;       ?>">


        </form>
    </td>
        </body>
        </html>

		<?php
		echo "</tr>";
	}

   		?>


   </table>
</body>
</html>
   <?php 
      

  
//} else {
  //  echo "0 results";
//}
$konekcija->close();
?>


