<?php




	    $localhost = "localhost";
	    $username = "root";
	    $password = "";
	    $db_name = "SI2";

	   // echo "Uspostavljanje konekcije...<br>";
	    $konekcija = new mysqli($localhost, $username, $password);
	     mysqli_select_db($konekcija, $db_name);
	    //echo "Baza izabrana! <br>";


	      $tabela_pristigliproizvodi = "CREATE TABLE IF NOT EXISTS PRISTIGLIPROIZVODI(
	        ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			Barcode INT UNIQUE,
	        Naziv VARCHAR(100),
	        Model VARCHAR(50),
	        Dimenzije VARCHAR(50),
	        Proizvodjac VARCHAR(20),
	        Cena INT(20),
	        Kolicina INT(20),
	        Duzina_garantnog_lista VARCHAR(20),
	        Link VARCHAR(255),
	        Slika VARCHAR(255),
	        Tip ENUM ('tastatura', 'mis', 'podloga', 'stampac', 'skener', 'monitor', 
	        'projektor', 'kablovi', 'slusalice', 'zvucnici', 'mikrofon', 'eksterni_disk', 'fles_memorija')
	    )";

	    $konekcija->query($tabela_pristigliproizvodi) or die($konekcija->error);
	     //echo "Tabela je kreirana!";


	       $sql = "SELECT * FROM PRISTIGLIPROIZVODI";
        $result = $konekcija->query($sql);

	    ?>


      

    <!DOCTYPE html>
        <html>
        <head>
        	<title>Prijem robe</title>
        	<h1>Prijem robe</h1>
        	<br>
        	<br>
        	<br>
        	<br>
        </head>
        <body>
        	<style>
        		

body{

	background-color: #FFEBCD;
	text-align: center;
}

        	</style>

   <table style="width: 100%">
   	
   	<tr>
   		<th>ID</th>
   		<th>Barkod</th>
   		<th>Naziv</th>
   		<th>Model</th>
   		<th>Dimenzije</th>
   		<th>Proizvodjac</th>
   		<th>Cena</th>
   		<th>Kolicina</th>
   		<th>Duzina_garantnog_lista</th>
   		<th>Link</th>
   		<th>Slika</th>
   		<th>Tip</th>
   		<th>Dodaj</th>
   		</tr>	

   		<?php
        $sql = "SELECT * FROM PRISTIGLIPROIZVODI";
        $result = $konekcija->query($sql);
        while ($red = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		echo "<td>{$red["ID"]}</td>";
		echo "<td>{$red["Barcode"]}</td>";
		echo "<td>{$red["Naziv"]}</td>";
		echo "<td>{$red["Model"]}</td>";
		echo "<td>{$red["Dimenzije"]}</td>";
		echo "<td>{$red["Proizvodjac"]}</td>";
		echo "<td>{$red["Cena"]}</td>";
		echo "<td>{$red["Kolicina"]}</td>";
		echo "<td>{$red["Duzina_garantnog_lista"]}</td>";
		echo "<td>{$red["Link"]}</td>";
		echo "<td>{$red["Slika"]}</td>";
		echo "<td>{$red["Tip"]}</td>";		
		$barkod = $red["Barcode"];
		$naziv = $red["Naziv"];
		$model = $red ["Model"];
		$dimenzije = $red["Dimenzije"];
	    $proizvodjac = $red["Proizvodjac"];
	    $cena = $red["Cena"];
	    $kolicina = $red["Kolicina"];
	    $garancija = $red["Duzina_garantnog_lista"];
	    $link = $red["Link"];
	    $slika = $red["Slika"];
	    $tip = $red["Tip"];


		?>
        <td>
        <form action="dodajproizvod.php" method="POST">
        	<button>Dodaj</button>
        	<input type="hidden" name="barkod" value="<?php  echo $barkod;       ?>">
        	<input type="hidden" name="naziv" value="<?php  echo $naziv;       ?>">
        	<input type="hidden" name="model" value="<?php  echo $model;       ?>">
        	<input type="hidden" name="dimenzije" value="<?php  echo $dimenzije;       ?>">
        	<input type="hidden" name="proizvodjac" value="<?php  echo $proizvodjac;       ?>">
        	<input type="hidden" name="cena" value="<?php  echo $cena;       ?>">
        	<input type="hidden" name="kolicina" value="<?php  echo $kolicina;       ?>">
        	<input type="hidden" name="garancija" value="<?php  echo $garancija;       ?>">
        	<input type="hidden" name="link" value="<?php  echo $link;       ?>">
        	<input type="hidden" name="slika" value="<?php  echo $slika;       ?>">
        	<input type="hidden" name="tip" value="<?php  echo $tip;       ?>">


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



       

    