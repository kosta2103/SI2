<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="login.css">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body id="LoginForm">


<?php
if(isset($_GET['dodaj_tip'])){

	$select = $_GET["Tip"];

	?>

	<form action="dodaj2.php" method="POST" id="tekst">
	
		Bar kod:
		<input type = "number" name = "proizvod_barcode" id="tekst2"><br>
		Naziv:
		<input type = "text" name = "naziv" id="tekst2"><br>
		Model:
		<input type = "text" name = "model" id="tekst2"><br>
		Dimenzije:
		<input type = "text" name = "dimenzije" id="tekst2"><br>
		Proizvodjac:
		<input type = "text" name = "proizvodjac" id="tekst2"><br>
		Cena:
		<input type = "number" name = "cena" id="tekst2"><br>
		Kolicina:
		<input type = "number" name = "kolicina" id="tekst2"><br>
		Duzina garantnog lista:
		<input type = "text" name = "duzina_gar_lista" id="tekst2"><br>
		Link:
		<input type = "text" name = "link" id="tekst2"><br>
		Slika:
		<input type = "text" name = "slika" id="tekst2"><br>

		<?php

		if($select == "eksterni_disk"){ ?>
			Format:
			<select name="format_eksterni_disk" id="tekst2">
				<option value="<2.5">2.5</option>
 				<option value="3.5">3.5</option>
			</select><br>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Kapacitet:
			<input type = "text" name = "kapacitet" id="tekst2"><br>
		<?php }

		if($select == "fles_memorija"){ ?>
			USB Type C:
			<input type = "text" name = "usb_type_c" id="tekst2"><br>
			Brzina citanja pisanja:
			<input type = "text" name = "brzina_citanja_pisanja" id="tekst2"><br>
			Kapacitet:
			<input type = "text" name = "kapacitet" id="tekst2"><br>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
		<?php }

		if($select == "kablovi"){ ?>
			Strana 1:
			<input type = "text" name = "strana_1" id="tekst2"><br>
			Strana 2:
			<input type = "text" name = "strana_2" id="tekst2"><br>
			Broj uticnica:
			<input type = "text" name = "broj_uticnica" id="tekst2"><br>
			Tip:
			<input type = "text" name = "tip" id="tekst2"><br>
			Prekidac:
			<input type = "text" name = "prekidac" id="tekst2"><br>
			Vrsta:
			<select name="vrsta_kablovi" id="tekst2">
				<option value="<Kabl">Kabl</option>
 				<option value="Adapter">Adapter</option>
			</select><br>
		<?php }

		if($select == "mikrofon"){ ?>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Duzina kabla:
			<input type = "text" name = "duzina_kabla" id="tekst2"><br>
			Frekvencijski raspon:
			<input type = "text" name = "frekvencijski_raspon" id="tekst2"><br>
		<?php }

		if($select == "mis"){ ?>
			Za obe ruke:
			<input type = "text" name = "za_obe_ruke" id="tekst2"><br>
			Rezolucija:
			<select name="rezolucija_mis" id="tekst2">
				<option value="<1000 dpi"><?php echo "<1000 dpi"?></option>
 				<option value="000-2000 dpi">000-2000 dpi</option>
  				<option value="2000-3000 dpi">2000-3000 dpi</option>
  				<option value="3000-4000 dpi">3000-4000 dpi</option>
  				<option value=">4000 dpi"><?php echo ">4000 dpi" ?></option>
			</select><br>
			Povezivanje:
			<select name="povezivanje_mis" id="tekst2">
				<option value="USB">USB</option>
				<option value="PS/2">PS/2</option>
 				<option value="Wireless">Wireless</option>
  				<option value="Bluetooth">Bluetooth</option>
			</select><br>
			Gaming:
			<input type = "text" name = "gaming" id="tekst2"><br>
			Senzor:
			<select name="senzor_mis" id="tekst2">
				<option value="Opticki">Opticki</option>
 				<option value="Laserski">Laserski</option>
  				<option value="Hero">Hero</option>
			</select><br>
		<?php }

		if($select == "monitor"){ ?>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Maksimalna rezolucija:
			<input type = "text" name = "maksimalna_rezolucija" id="tekst2"><br>
			USB:
			<select name="usb_monitor" id="tekst2">
				<option value="1">1</option>
 				<option value="2">2</option>
  				<option value="3">3</option>
  				<option value="4">4</option>
  				<option value=">4"><?php echo ">4" ?></option>
  				<option value="Ne">Ne</option>
			</select><br>
			Ugradjeni zvucnici:
			<input type = "text" name = "ugradjeni_zvucnici" id="tekst2"><br>
			Dijagonala ekrana:
			<input type = "text" name = "dijagonala_ekrana" id="tekst2"><br>
			Brzina osvezavanja:
			<input type = "text" name = "brzina_osvezavanja" id="tekst2"><br>
			HDMI:
			<select name="hdmi_monitor" id="tekst2">
				<option value="1">1</option>
 				<option value="2">2</option>
  				<option value="3">3</option>
  				<option value=">3"><?php echo ">3" ?></option>
  				<option value="Ne">Ne</option>
			</select><br>
			DVI:
			<input type = "text" name = "dvi" id="tekst2"><br>
			VGA:
			<input type = "text" name = "vga" id="tekst2"><br>
			Display port:
			<input type = "text" name = "display_port" id="tekst2"><br>
			Podesavanje po visini:
			<input type = "text" name = "podesavanje_po_visini" id="tekst2"><br>
			TouchScreen:
			<input type = "text" name = "touchscreen" id="tekst2"><br>
			Rotacija:
			<input type = "text" name = "rotacija" id="tekst2"><br>
		<?php }

		if($select == "podloga"){ ?>
			Tip:
			<select name="tip_podloga" id="tekst2">
				<option value="Obicna">Obicna</option>
 				<option value="Sa gelom">Sa gelom</option>
  				<option value="Gamerska">Gamerska</option>
			</select><br>
			Materijal:
			<select name="materijal_podloga" id="tekst2">
				<option value="PVC">PVC</option>
 				<option value="Guma">Guma</option>
  				<option value="Platno">Platno</option>
			</select><br>
		<?php }

		if($select == "projektor"){ ?>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Tip:
			<select name="tip_projektor" id="tekst2">
				<option value="DLP">DLP</option>
 				<option value="DLP LCD">DLP LCD</option>
  				<option value="3LCD">3LCD</option>
  				<option value="LCOS">LCOS</option>
  				<option value="LCD">LCD</option>
			</select><br>
			Rezolucija:
			<input type = "text" name = "rezolucija" id="tekst2"><br>
			Osvetljenje:
			<input type = "text" name = "osvetljenje" id="tekst2"><br>
			Wireless:
			<input type = "text" name = "wireless" id="tekst2"><br>
			USB:
			<input type = "text" name = "usb" id="tekst2"><br>
			Mreza:
			<input type = "text" name = "mreza" id="tekst2"><br>
			HDMI:
			<input type = "text" name = "hdmi" id="tekst2"><br>
			DVI:
			<input type = "text" name = "dvi" id="tekst2"><br>
			RS232:
			<input type = "text" name = "rs232" id="tekst2"><br>
			VGA:
			<input type = "text" name = "vga" id="tekst2"><br>
		<?php }

		if($select == "skener"){ ?>
			Format:
			<select name="format_skener" id="tekst2">
				<option value="A6">A6</option>
				<option value="A5">A5</option>
				<option value="A4">A4</option>
				<option value="A3">A3</option>
				<option value="A2">A2</option>
				<option value="A1">A1</option>
  				<option value="A0">A0</option>
  				<option value=">A0"><?php echo ">A0" ?></option>
			</select><br>
			Flatbed:
			<input type = "text" name = "flatbed" id="tekst2"><br>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Rezolucija:
			<input type = "text" name = "rezolucija" id="tekst2"><br>
			ADF:
			<input type = "text" name = "adf" id="tekst2"><br>
		<?php }

		if($select == "slusalice"){ ?>
			Tip:
			<select name="tip_slusalice" id="tekst2">
				<option value="Bubice">Bubice</option>
  				<option value="Slusalice">Slusalice</option>
			</select><br>
			Mikrofon:
			<select name="mikrofon_slusalice" id="tekst2">
				<option value="Ne">Ne</option>
  				<option value="Na rucici">Na rucici</option>
  				<option value="Na slusalici">Na slusalici</option>
  				<option value="Na kablu">Na kablu</option>
			</select><br>
			Zvucni sistem:
			<select name="zvucni_sistem_slusalice" id="tekst2">
				<option value="5.1">5.1</option>
  				<option value="7.1">7.1</option>
			</select><br>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Gaming:
			<input type = "text" name = "gaming" id="tekst2"><br>
			Frekvencijski raspon:
			<input type = "text" name = "frekvencijski_raspon" id="tekst2"><br>
		<?php }

		if($select == "stampac"){ ?>
			Tip:
			<select name="tip_stampac" id="tekst2">
				<option value="Matricni">Matricni</option>
  				<option value="Laserski">Laserski</option>
			</select><br>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Rezolucija:
			<input type = "text" name = "rezolucija" id="tekst2"><br>
			Brzina stampe:
			<input type = "text" name = "brzina_stampe" id="tekst2"><br>
			Bar kod:
			<input type = "text" name = "bar_kod" id="tekst2"><br>
			Mreza:
			<input type = "text" name = "mreza" id="tekst2"><br>
			Wireless:
			<input type = "text" name = "wireless" id="tekst2"><br>
		<?php }

		if($select == "tastatura"){ ?>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			USB port:
			<input type = "text" name = "usb_port" id="tekst2"><br>
			Numericki deo:
			<input type = "text" name = "numericki_deo" id="tekst2"><br>
			Tip:
			<select name="tip_tastatura" id="tekst2">
				<option value="Wired">Wired</option>
 				<option value="Wireless">Wireless</option>
  				<option value="Bluetooth">Bluetooth</option>
			</select><br>
			Tip tastera:
			<select name="tip_tastera_tastatura" id="tekst2">
				<option value="Mehanicki">Mehanicki</option>
 				<option value="X_Scissor">X_Scissor</option>
  				<option value="Gumena_membrana">Gumena_membrana</option>
  				<option value="Hibridni">Hibridni</option>
			</select><br>
			Programabilni tasteri:
			<input type = "text" name = "programabilni_tasteri" id="tekst2"><br>
			RGB osvetljenje:
			<input type = "text" name = "rgb_osvetljenje" id="tekst2"><br>
		<?php }

		if($select == "zvucnici"){ ?>
			Zvucni sistem:
			<select name="zvucni_sistem_zvucnici" id="tekst2">
				<option value="4.1">4.1</option>
 				<option value="5.1">5.1</option>
  				<option value="7.1">7.1</option>
			</select><br>
			Snaga:
			<input type = "text" name = "snaga" id="tekst2"><br>
			Konektori:
			<input type = "text" name = "konektori" id="tekst2"><br>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Frekvencijski raspon:
			<input type = "text" name = "frekvencijski_raspon" id="tekst2"><br>
		<?php }
		?>
		<input type="hidden" name="selektovani_tip" value="<?php echo $select ?>">
		<input type = "submit" name = "dodaj" id="tekst2">
	</form>
	<?php
}
else{ ?>

<form action="dodaj1.php" method="GET">
	<select name="Tip">
		<option value="eksterni_disk">Eksterni disk</option>
 		<option value="fles_memorija">Fles memorija</option>
  		<option value="kablovi">Kablovi</option>
  		<option value="mikrofon">Mikrofon</option>
  		<option value="mis">Mis</option>
  		<option value="monitor">Monitor</option>
  		<option value="podloga">Podloga</option>
  		<option value="projektor">Projektor</option>
  		<option value="skener">Skener</option>
  		<option value="slusalice">Slusalice</option>
  		<option value="stampac">Stampac</option>
  		<option value="tastatura">Tastatura</option>
  		<option value="zvucnici">Zvucnici</option>
	</select>
    <input type = "submit" name = "dodaj_tip">
</form>

<?php }
