<!DOCTYPE html>
<html>

<?php

if(isset($_POST["izmeni"])){

	$barcode = $_POST["barcode"];
	$tip = $_POST["tip"];

	$veza = mysqli_connect("localhost", "root", "", "SI2");
	$sql = "SELECT * FROM proizvodi WHERE Barcode = '".$barcode."'";
	$result = mysqli_query($veza, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		$naziv = $row['Naziv'];
		$model = $row['Model'];
		$dimenzije = $row['Dimenzije'];
		$proizvodjac = $row['Proizvodjac'];
		$nabavna_cena = $row['Nabavna_cena'];
		$cena = $row['Cena'];
		$kolicina = $row['Kolicina'];
		$broj_prodatih_primeraka = $row['Broj_prodatih_primeraka'];
		$datum_poslednje_prodaje = $row['Datum_poslednje_prodaje'];
		$duzina_gar_lista = $row['Duzina_garantnog_lista'];
		$link = $row['Link'];
		$slika = $row['Slika'];
	}

	if(($_POST['naziv']) != ""){
		$naziv = $_POST["naziv"];
	}
	if(($_POST['model']) != ""){
		$model = $_POST["model"];
	}
	if(($_POST['dimenzije']) != ""){
		$dimenzije = $_POST["dimenzije"];
	}
	if(($_POST['proizvodjac']) != ""){
		$proizvodjac = $_POST["proizvodjac"];
	}
	if(($_POST['nabavna_cena']) != ""){
		$nabavna_cena = $_POST["nabavna_cena"];
		$cena = $nabavna_cena + $nabavna_cena*0.2;
	}
	if(($_POST['cena']) != ""){
		$cena = $_POST["cena"];
	}
	if(($_POST['kolicina']) != ""){
		$kolicina = $_POST["kolicina"];
	}
	if(($_POST['broj_prodatih_primeraka']) != ""){
		$broj_prodatih_primeraka = $_POST["broj_prodatih_primeraka"];
	}
	if(($_POST['datum_poslednje_prodaje']) != ""){
		$datum_poslednje_prodaje = $_POST["datum_poslednje_prodaje"];
	}
	if(($_POST['duzina_gar_lista']) != ""){
		$duzina_gar_lista = $_POST["duzina_gar_lista"];
	}
	if(($_POST['link']) != ""){
		$link = $_POST["link"];
	}
	if(($_POST['slika']) != ""){
		$slika = $_POST["slika"];
	}


	$sql = "UPDATE proizvodi SET Naziv ='" .$naziv. "', Model = '" .$model. "', Dimenzije = '" .$dimenzije. "', Proizvodjac = '" .$proizvodjac. "', Nabavna_cena = '" .$nabavna_cena. "', Cena = '" .$cena. "', Kolicina = '" .$kolicina. "', Broj_prodatih_primeraka = '" .$broj_prodatih_primeraka. "', Datum_poslednje_prodaje = '" .$datum_poslednje_prodaje. "', Duzina_garantnog_lista = '" .$duzina_gar_lista. "', Link = '" .$link. "', Slika = '" .$slika. "' WHERE Barcode = '" .$barcode. "'";
	$veza->query($sql) or die($veza->error);


	if($tip == "eksterni_disk"){
		$sql = "SELECT * FROM eksterni_disk WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$format = $row['Format'];
			$povezivanje = $row['Povezivanje'];
			$kapacitet = $row['Kapacitet'];
		}

		if(($_POST['format_eksterni_disk']) != ""){
			$format = $_POST["format_eksterni_disk"];
		}
		if(($_POST['povezivanje']) != ""){
			$povezivanje = $_POST["povezivanje"];
		}
		if(($_POST['kapacitet']) != ""){
			$kapacitet = $_POST["kapacitet"];
		}

		$sql = "UPDATE eksterni_disk SET Format ='" .$format. "', Povezivanje = '" .$povezivanje. "', Kapacitet = '" .$kapacitet. "' WHERE Barcode = '" .$barcode. "'";
		$veza->query($sql) or die($veza->error);
	}

	if($tip == "fles_memorija"){
		$sql = "SELECT * FROM fles_memorija WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$usb_type_c = $row['USB_type_C'];
			$brzina_citanja_pisanja = $row['Brzina_citanja_pisanja'];
			$kapacitet = $row['Kapacitet'];
			$povezivanje = $row['Povezivanje'];
		}

		if(($_POST['usb_type_c']) != ""){
			$usb_type_c = $_POST["usb_type_c"];
		}
		if(($_POST['brzina_citanja_pisanja']) != ""){
			$brzina_citanja_pisanja = $_POST["brzina_citanja_pisanja"];
		}
		if(($_POST['kapacitet']) != ""){
			$kapacitet = $_POST["kapacitet"];
		}
		if(($_POST['povezivanje']) != ""){
			$povezivanje = $_POST["povezivanje"];
		}

		$sql = "UPDATE fles_memorija SET USB_Type_C ='" .$usb_type_c. "', Brzina_citanja_pisanja = '" .$brzina_citanja_pisanja. "', Kapacitet = '" .$kapacitet. "', Povezivanje = '" .$povezivanje. "' WHERE Barcode = '" .$barcode. "'";
		$veza->query($sql) or die($veza->error);
	}

	if($tip == "mikrofon"){
		$sql = "SELECT * FROM mikrofon WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$povezivanje = $row['Povezivanje'];
			$duzina_kabla = $row['Duzina_kabla'];
			$frekvencijski_raspon = $row['Frekvencijski_raspon'];
		}

		if(($_POST['povezivanje']) != ""){
			$povezivanje = $_POST["povezivanje"];
		}
		if(($_POST['duzina_kabla']) != ""){
			$duzina_kabla = $_POST["duzina_kabla"];
		}
		if(($_POST['frekvencijski_raspon']) != ""){
			$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
		}

		$sql = "UPDATE mikrofon SET Povezivanje ='" .$povezivanje. "', Duzina_kabla = '" .$duzina_kabla. "', Frekvencijski_raspon = '" .$frekvencijski_raspon. "' WHERE Barcode = '" .$barcode. "'";
		$veza->query($sql) or die($veza->error);
	}

	if($tip == "mis"){
		$sql = "SELECT * FROM mis WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$za_obe_ruke = $row['Za_obe_ruke'];
			$rezolucija = $row['Rezolucija'];
			$povezivanje = $row['Povezivanje'];
			$gaming = $row['Gaming'];
			$senzor = $row['Senzor'];
		}

		if(($_POST['za_obe_ruke']) != ""){
			$za_obe_ruke = $_POST["za_obe_ruke"];
		}
		if(($_POST['rezolucija_mis']) != ""){
			$rezolucija = $_POST["rezolucija_mis"];
		}
		if(($_POST['povezivanje_mis']) != ""){
			$povezivanje = $_POST["povezivanje_mis"];
		}
		if(($_POST['gaming']) != ""){
			$gaming = $_POST["gaming"];
		}
		if(($_POST['senzor_mis']) != ""){
			$senzor = $_POST["senzor_mis"];
		}

		$sql = "UPDATE mis SET Za_obe_ruke ='" .$za_obe_ruke. "', Rezolucija = '" .$rezolucija. "', Povezivanje = '" .$povezivanje. "', Gaming = '" .$gaming. "', Senzor = '" .$senzor. "' WHERE Barcode = '" .$barcode. "'";
		$veza->query($sql) or die($veza->error);
	}

	if($tip == "monitor"){
		$sql = "SELECT * FROM monitor WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$povezivanje = $row['Povezivanje'];
			$maksimalna_rezolucija = $row['Maksimalna_rezolucija'];
			$usb = $row['USB'];
			$ugradjeni_zvucnici = $row['Ugradjeni_zvucnici'];
			$dijagonala_ekrana = $row['Dijagonala_ekrana'];
			$brzina_osvezavanja = $row['Brzina_osvezavanja'];
			$hdmi = $row['HDMI'];
			$dvi = $row['DVI'];
			$vga = $row['VGA'];
			$display_port = $row['Display_port'];
			$podesavanje_po_visini = $row['Podesavanje_po_visini'];
			$touchscreen = $row['TouchScreen'];
			$rotacija = $row['Rotacija'];
		}

		if(($_POST['povezivanje']) != ""){
			$povezivanje = $_POST["povezivanje"];
		}
		if(($_POST['maksimalna_rezolucija']) != ""){
			$maksimalna_rezolucija = $_POST["maksimalna_rezolucija"];
		}
		if(($_POST['usb_monitor']) != ""){
			$usb = $_POST["usb_monitor"];
		}
		if(($_POST['ugradjeni_zvucnici']) != ""){
			$ugradjeni_zvucnici = $_POST["ugradjeni_zvucnici"];
		}
		if(($_POST['dijagonala_ekrana']) != ""){
			$dijagonala_ekrana = $_POST["dijagonala_ekrana"];
		}
		if(($_POST['brzina_osvezavanja']) != ""){
			$brzina_osvezavanja = $_POST["brzina_osvezavanja"];
		}
		if(($_POST['hdmi_monitor']) != ""){
			$hdmi = $_POST["hdmi_monitor"];
		}
		if(($_POST['dvi']) != ""){
			$dvi = $_POST["dvi"];
		}
		if(($_POST['vga']) != ""){
			$vga = $_POST["vga"];
		}
		if(($_POST['display_port']) != ""){
			$display_port = $_POST["display_port"];
		}
		if(($_POST['podesavanje_po_visini']) != ""){
			$podesavanje_po_visini = $_POST["podesavanje_po_visini"];
		}
		if(($_POST['touchscreen']) != ""){
			$touchscreen = $_POST["touchscreen"];
		}
		if(($_POST['rotacija']) != ""){
			$rotacija = $_POST["rotacija"];
		}

		$sql = "UPDATE monitor SET Povezivanje ='" .$povezivanje. "', Maksimalna_rezolucija = '" .$maksimalna_rezolucija. "', USB = '" .$usb. "', Ugradjeni_zvucnici = '" .$ugradjeni_zvucnici. "', Dijagonala_ekrana = '" .$dijagonala_ekrana. "', Brzina_osvezavanja = '" .$brzina_osvezavanja. "', HDMI = '" .$hdmi. "', DVI = '" .$dvi. "', VGA = '" .$vga. "', Display_port = '" .$display_port. "', Podesavanje_po_visini = '" .$podesavanje_po_visini. "', TouchScreen = '" .$touchscreen. "', Rotacija = '" .$rotacija. "' WHERE Barcode = '" .$barcode. "'";
		$veza->query($sql) or die($veza->error);
	}

	if($tip == "podloga"){
		$sql = "SELECT * FROM podloga WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$tip = $row['Tip_podloga'];
			$materijal = $row['Materijal'];
		}

		if(($_POST['tip_podloga']) != ""){
			$tip = $_POST["tip_podloga"];
		}
		if(($_POST['materijal_podloga']) != ""){
			$materijal = $_POST["materijal_podloga"];
		}

		$sql = "UPDATE podloga SET Tip_podloga ='" .$tip. "', Materijal = '" .$materijal. "' WHERE Barcode = '" .$barcode. "'";
		mysqli_query($veza, $sql);
	}

	if($tip == "projektor"){
		$sql = "SELECT * FROM projektor WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$povezivanje = $row['Povezivanje'];
			$tip = $row['Tip_projektor'];
			$rezolucija = $row['Rezolucija'];
			$osvetljenje = $row['Osvetljenje'];
			$wireless = $row['Wireless'];
			$usb = $row['USB'];
			$mreza = $row['Mreza'];
			$hdmi = $row['HDMI'];
			$dvi = $row['DVI'];
			$rs232 = $row['RS232'];
			$vga = $row['VGA'];
		}

		if(($_POST['povezivanje']) != ""){
			$povezivanje = $_POST["povezivanje"];
		}
		if(($_POST['tip_projektor']) != ""){
			$tip = $_POST["tip_projektor"];
		}
		if(($_POST['rezolucija']) != ""){
			$rezolucija = $_POST["rezolucija"];
		}
		if(($_POST['osvetljenje']) != ""){
			$osvetljenje = $_POST["osvetljenje"];
		}
		if(($_POST['wireless']) != ""){
			$wireless = $_POST["wireless"];
		}
		if(($_POST['usb']) != ""){
			$usb = $_POST["usb"];
		}
		if(($_POST['mreza']) != ""){
			$mreza = $_POST["mreza"];
		}
		if(($_POST['hdmi']) != ""){
			$hdmi = $_POST["hdmi"];
		}
		if(($_POST['dvi']) != ""){
			$dvi = $_POST["dvi"];
		}
		if(($_POST['rs232']) != ""){
			$rs232 = $_POST["rs232"];
		}
		if(($_POST['vga']) != ""){
			$vga = $_POST["vga"];
		}

		$sql = "UPDATE projektor SET Povezivanje ='" .$povezivanje. "', Tip_projektor = '" .$tip. "', Rezolucija = '" .$rezolucija. "', Osvetljenje = '" .$osvetljenje. "', Wireless = '" .$wireless. "', USB = '" .$usb. "', Mreza = '" .$mreza. "', HDMI = '" .$hdmi. "', DVI = '" .$dvi. "', RS232 = '" .$rs232. "', VGA = '" .$vga. "' WHERE Barcode = '" .$barcode. "'";
		$veza->query($sql) or die($veza->error);
	}

	if($tip == "skener"){
		$sql = "SELECT * FROM skener WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$format = $row['Format'];
			$flatbed = $row['Flatbed'];
			$povezivanje = $row['Povezivanje'];
			$rezolucija = $row['Rezolucija'];
			$adf = $row['ADF'];
		}

		if(($_POST['format_skener']) != ""){
			$format = $_POST["format_skener"];
		}
		if(($_POST['flatbed']) != ""){
			$flatbed = $_POST["flatbed"];
		}
		if(($_POST['povezivanje']) != ""){
			$povezivanje = $_POST["povezivanje"];
		}
		if(($_POST['rezolucija']) != ""){
			$rezolucija = $_POST["rezolucija"];
		}
		if(($_POST['adf']) != ""){
			$adf = $_POST["adf"];
		}

		$sql = "UPDATE skener SET Format ='" .$format. "', Flatbed = '" .$flatbed. "', Povezivanje = '" .$povezivanje. "', Rezolucija = '" .$rezolucija. "', ADF = '" .$adf. "' WHERE Barcode = '" .$barcode. "'";
		$veza->query($sql) or die($veza->error);
	}

	if($tip == "slusalice"){
		$sql = "SELECT * FROM slusalice WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$tip = $row['Tip_slusalice'];
			$mikrofon = $row['Mikrofon'];
			$zvucni_sistem = $row['Zvucni_sistem'];
			$povezivanje = $row['Povezivanje'];
			$gaming = $row['Gaming'];
			$frekvencijski_raspon = $row['Frekvencijski_raspon'];
		}

		if(($_POST['tip_slusalice']) != ""){
			$tip = $_POST["tip_slusalice"];
		}
		if(($_POST['mikrofon_slusalice']) != ""){
			$mikrofon = $_POST["mikrofon_slusalice"];
		}
		if(($_POST['zvucni_sistem_slusalice']) != ""){
			$zvucni_sistem = $_POST["zvucni_sistem_slusalice"];
		}
		if(($_POST['povezivanje']) != ""){
			$povezivanje = $_POST["povezivanje"];
		}
		if(($_POST['gaming']) != ""){
			$gaming = $_POST["gaming"];
		}
		if(($_POST['frekvencijski_raspon']) != ""){
			$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
		}

		$sql = "UPDATE slusalice SET Tip_slusalice ='" .$tip. "', Mikrofon = '" .$mikrofon. "', Zvucni_sistem = '" .$zvucni_sistem. "', Povezivanje = '" .$povezivanje. "', Gaming = '" .$gaming. "', Frekvencijski_raspon = '" .$frekvencijski_raspon. "' WHERE Barcode = '" .$barcode. "'";
		$veza->query($sql) or die($veza->error);
	}

	if($tip == "stampac"){
		$sql = "SELECT * FROM stampac WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$tip = $row['Tip_stampac'];
			$povezivanje = $row['Povezivanje'];
			$rezolucija = $row['Rezolucija'];
			$brzina_stampe = $row['Brzina_stampe'];
			$bar_kod = $row['Bar_kod'];
			$mreza = $row['Mreza'];
			$wireless = $row['Wireless'];
		}

		if(($_POST['tip_stampac']) != ""){
			$tip = $_POST["tip_stampac"];
		}
		if(($_POST['povezivanje']) != ""){
			$povezivanje = $_POST["povezivanje"];
		}
		if(($_POST['rezolucija']) != ""){
			$rezolucija = $_POST["rezolucija"];
		}
		if(($_POST['brzina_stampe']) != ""){
			$brzina_stampe = $_POST["brzina_stampe"];
		}
		if(($_POST['bar_kod']) != ""){
			$bar_kod = $_POST["bar_kod"];
		}
		if(($_POST['mreza']) != ""){
			$mreza = $_POST["mreza"];
		}
		if(($_POST['wireless']) != ""){
			$wireless = $_POST["wireless"];
		}

		$sql = "UPDATE stampac SET Tip_stampac ='" .$tip. "', Povezivanje = '" .$povezivanje. "', Rezolucija = '" .$rezolucija. "', Brzina_stampe = '" .$brzina_stampe. "', Bar_kod = '" .$bar_kod. "', Mreza = '" .$mreza. "', Wireless = '" .$wireless. "' WHERE Barcode = '" .$barcode. "'";
		$veza->query($sql) or die($veza->error);
	}

	if($tip == "tastatura"){
		$sql = "SELECT * FROM tastatura WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$povezivanje = $row['Povezivanje'];
			$usb_port = $row['USB_port'];
			$numericki_deo = $row['Numericki_deo'];
			$tip = $row['Tip_tastatura'];
			$tip_tastera = $row['Tip_tastera'];
			$programabilni_tasteri = $row['Programabilni_tasteri'];
			$rgb_osvetljenje = $row['RGB_osvetljenje'];
		}

		if(($_POST['povezivanje']) != ""){
			$povezivanje = $_POST["povezivanje"];
		}
		if(($_POST['usb_port']) != ""){
			$usb_port = $_POST["usb_port"];
		}
		if(($_POST['numericki_deo']) != ""){
			$numericki_deo = $_POST["numericki_deo"];
		}
		if(($_POST['tip_tastatura']) != ""){
			$tip = $_POST["tip_tastatura"];
		}
		if(($_POST['tip_tastera_tastatura']) != ""){
			$tip_tastera = $_POST["tip_tastera_tastatura"];
		}
		if(($_POST['programabilni_tasteri']) != ""){
			$programabilni_tasteri = $_POST["programabilni_tasteri"];
		}
		if(($_POST['rgb_osvetljenje']) != ""){
			$rgb_osvetljenje = $_POST["rgb_osvetljenje"];
		}

		$sql = "UPDATE tastatura SET Povezivanje ='" .$povezivanje. "', USB_port = '" .$usb_port. "', Numericki_deo = '" .$numericki_deo. "', Tip_tastatura = '" .$tip. "', Tip_tastera = '" .$tip_tastera. "', Programabilni_tasteri = '" .$programabilni_tasteri. "', RGB_osvetljenje = '" .$rgb_osvetljenje. "' WHERE Barcode = '" .$barcode. "'";
		$veza->query($sql) or die($veza->error);
	}
			
	if($tip == "zvucnici"){
		$sql = "SELECT * FROM zvucnici WHERE Barcode = '".$barcode."'";
		$result = mysqli_query($veza, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$zvucni_sistem = $row['Zvucni_sistem'];
			$snaga = $row['Snaga'];
			$konektori = $row['Konektori'];
			$povezivanje = $row['Povezivanje'];
			$frekvencijski_raspon = $row['Frekvencijski_raspon'];
		}

		if(($_POST['zvucni_sistem_zvucnici']) != ""){
			$zvucni_sistem = $_POST["zvucni_sistem_zvucnici"];
		}
		if(($_POST['snaga']) != ""){
			$snaga = $_POST["snaga"];
		}
		if(($_POST['konektori']) != ""){
			$konektori = $_POST["konektori"];
		}
		if(($_POST['povezivanje']) != ""){
			$povezivanje = $_POST["povezivanje"];
		}
		if(($_POST['frekvencijski_raspon']) != ""){
			$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
		}

		$sql = "UPDATE zvucnici SET Zvucni_sistem ='" .$zvucni_sistem. "', Snaga = '" .$snaga. "', Konektori = '" .$konektori. "', Povezivanje = '" .$povezivanje. "', Frekvencijski_raspon = '" .$frekvencijski_raspon. "' WHERE Barcode = '" .$barcode. "'";
		$veza->query($sql) or die($veza->error);
	}
?>
<script>
	window.location.href = 'prikaz.php';
</script>
<?php
}


else{

	$barkod = $_GET["barkod"];
	$veza = mysqli_connect("localhost", "root", "", "SI2");
	$sql = "SELECT Tip FROM proizvodi WHERE Barcode = '".$barkod."'";
	$result = mysqli_query($veza, $sql);
	$tip1 = mysqli_fetch_row($result);
	$tip_proizvoda = $tip1[0];
?>
	<form action="izmeni.php" method="POST">
	
		Naziv:
		<input type = "text" name = "naziv"><br>
		Model:
		<input type = "text" name = "model"><br>
		Dimenzije:
		<input type = "text" name = "dimenzije"><br>
		Proizvodjac:
		<input type = "text" name = "proizvodjac"><br>
		Nabavna cena:
		<input type = "text" name = "nabavna_cena"><br>
		Cena:
		<input type = "number" name = "cena"><br>
		Kolicina:
		<input type = "number" name = "kolicina"><br>
		Broj prodatih primeraka:
		<input type = "text" name = "broj_prodatih_primeraka"><br>
		Datum poslednje prodaje:
		<input type = "text" name = "datum_poslednje_prodaje"><br>
		Duzina garantnog lista:
		<input type = "text" name = "duzina_gar_lista"><br>
		Link:
		<input type = "text" name = "link"><br>
		Slika:
		<input type = "text" name = "slika"><br>

		<?php

		if($tip_proizvoda == "eksterni_disk"){ ?>
			Format:
			<select name="format_eksterni_disk" id="tekst2">
				<option value="">Izaberi format</option>
				<option value="<2.5">2.5</option>
 				<option value="3.5">3.5</option>
			</select><br>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Kapacitet:
			<input type = "text" name = "kapacitet" id="tekst2"><br>
		<?php }

		if($tip_proizvoda == "fles_memorija"){ ?>
			USB Type C:
			<input type = "text" name = "usb_type_c" id="tekst2"><br>
			Brzina citanja pisanja:
			<input type = "text" name = "brzina_citanja_pisanja" id="tekst2"><br>
			Kapacitet:
			<input type = "text" name = "kapacitet" id="tekst2"><br>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
		<?php }

		if($tip_proizvoda == "kablovi"){ ?>
			Strana 1:
			<input type = "text" name = "strana_1" id="tekst2"><br>
			Strana 2:
			<input type = "text" name = "strana_2" id="tekst2"><br>
			Broj uticnica:
			<input type = "text" name = "broj_uticnica" id="tekst2"><br>
			Tip kabla:
			<input type = "text" name = "tip" id="tekst2"><br>
			Prekidac:
			<input type = "text" name = "prekidac" id="tekst2"><br>
			Vrsta:
			<select name="vrsta_kablovi" id="tekst2">
				<option value="">Izaberi vrstu</option>
				<option value="<Kabl">Kabl</option>
 				<option value="Adapter">Adapter</option>
			</select><br>
		<?php }

		if($tip_proizvoda == "mikrofon"){ ?>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Duzina kabla:
			<input type = "text" name = "duzina_kabla" id="tekst2"><br>
			Frekvencijski raspon:
			<input type = "text" name = "frekvencijski_raspon" id="tekst2"><br>
		<?php }

		if($tip_proizvoda == "mis"){ ?>
			Za obe ruke:
			<input type = "text" name = "za_obe_ruke" id="tekst2"><br>
			Rezolucija:
			<select name="rezolucija_mis" id="tekst2">
				<option value="">Izaberi rezoluciju</option>
				<option value="<1000 dpi"><?php echo "<1000 dpi"?></option>
 				<option value="000-2000 dpi">000-2000 dpi</option>
  				<option value="2000-3000 dpi">2000-3000 dpi</option>
  				<option value="3000-4000 dpi">3000-4000 dpi</option>
  				<option value=">4000 dpi"><?php echo ">4000 dpi" ?></option>
			</select><br>
			Povezivanje:
			<select name="povezivanje_mis" id="tekst2">
				<option value="">Izaberi povezivanje</option>
				<option value="USB">USB</option>
				<option value="PS/2">PS/2</option>
 				<option value="Wireless">Wireless</option>
  				<option value="Bluetooth">Bluetooth</option>
			</select><br>
			Gaming:
			<input type = "text" name = "gaming" id="tekst2"><br>
			Senzor:
			<select name="senzor_mis" id="tekst2">
				<option value="">Izaberi senzor</option>
				<option value="Opticki">Opticki</option>
 				<option value="Laserski">Laserski</option>
  				<option value="Hero">Hero</option>
			</select><br>
		<?php }

		if($tip_proizvoda == "monitor"){ ?>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Maksimalna rezolucija:
			<input type = "text" name = "maksimalna_rezolucija" id="tekst2"><br>
			USB:
			<select name="usb_monitor" id="tekst2">
				<option value="">Izaberi USB</option>
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
				<option value="">Izaberi HDMI</option>
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

		if($tip_proizvoda == "podloga"){ ?>
			Tip podloge:
			<select name="tip_podloga" id="tekst2">
				<option value="">Izaberi tip</option>
				<option value="Obicna">Obicna</option>
 				<option value="Sa gelom">Sa gelom</option>
  				<option value="Gamerska">Gamerska</option>
			</select><br>
			Materijal:
			<select name="materijal_podloga" id="tekst2">
				<option value="">Izaberi materijal</option>
				<option value="PVC">PVC</option>
 				<option value="Guma">Guma</option>
  				<option value="Platno">Platno</option>
			</select><br>
		<?php }

		if($tip_proizvoda == "projektor"){ ?>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			Tip projektora:
			<select name="tip_projektor" id="tekst2">
				<option value="">Izaberi tip</option>
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

		if($tip_proizvoda == "skener"){ ?>
			Format:
			<select name="format_skener" id="tekst2">
				<option value="">Izaberi format</option>
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

		if($tip_proizvoda == "slusalice"){ ?>
			Tip slusalica:
			<select name="tip_slusalice" id="tekst2">
				<option value="">Izaberi tip</option>
				<option value="Bubice">Bubice</option>
  				<option value="Slusalice">Slusalice</option>
			</select><br>
			Mikrofon:
			<select name="mikrofon_slusalice" id="tekst2">
				<option value="">Izaberi mikrofon</option>
				<option value="Ne">Ne</option>
  				<option value="Na rucici">Na rucici</option>
  				<option value="Na slusalici">Na slusalici</option>
  				<option value="Na kablu">Na kablu</option>
			</select><br>
			Zvucni sistem:
			<select name="zvucni_sistem_slusalice" id="tekst2">
				<option value="">Izaberi zvucni sistem</option>
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

		if($tip_proizvoda == "stampac"){ ?>
			Tip stampaca:
			<select name="tip_stampac" id="tekst2">
				<option value="">Izaberi tip</option>
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

		if($tip_proizvoda == "tastatura"){ ?>
			Povezivanje:
			<input type = "text" name = "povezivanje" id="tekst2"><br>
			USB port:
			<input type = "text" name = "usb_port" id="tekst2"><br>
			Numericki deo:
			<input type = "text" name = "numericki_deo" id="tekst2"><br>
			Tip tastature:
			<select name="tip_tastatura" id="tekst2">
				<option value="">Izaberi tip</option>
				<option value="Wired">Wired</option>
 				<option value="Wireless">Wireless</option>
  				<option value="Bluetooth">Bluetooth</option>
			</select><br>
			Tip tastera:
			<option value="">Izaberi tip tastera</option>
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

		if($tip_proizvoda == "zvucnici"){ ?>
			Zvucni sistem:
			<select name="zvucni_sistem_zvucnici" id="tekst2">
				<option value="">Izaberi zvucni sistem</option>
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
		<input type="hidden" name="tip" value="<?php echo $tip_proizvoda ?>">
		<input type="hidden" name="barcode" value="<?php echo $barkod ?>">
		<input type = "submit" name = "izmeni">
	</form>
	<?php
}