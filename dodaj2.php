<?php
session_start();
if(isset($_SESSION['pristup']) && ($_SESSION['pristup'] == "Administrator" || $_SESSION['pristup'] == "Vlasnik" || $_SESSION['pristup'] == "Komercijalista")){

$veza = mysqli_connect("localhost", "root", "", "SI2");
$barcode = $_POST["proizvod_barcode"];
$flag = $_POST["flag"];
$naziv = $_POST["naziv"];
$model = $_POST["model"];
$dimenzije = $_POST["dimenzije"];
$proizvodjac = $_POST["proizvodjac"];
$tip = $_POST["selektovani_tip"];
if(!empty($_POST["kolicina"])){
	$kolicina = $_POST["kolicina"];
}
else{
	$kolicina = 0;
}
$datum = date('Y-m-d');
$niz = $veza->query("SELECT Barcode FROM Proizvodi")->fetch_all(MYSQLI_ASSOC);
$barcodovi = array();

foreach($niz as $line)
{
	array_push($barcodovi, $line["Barcode"]);
}

if(in_array($barcode, $barcodovi) && $flag == 0)
{
	$veza->query("UPDATE Proizvodi SET Kolicina = Kolicina + $kolicina WHERE Barcode = $barcode");
}
else if(in_array($barcode, $barcodovi) && $flag == 1)
{
	echo '<script> alert("Proizvod sa unetim barcode-om vec postoji !") </script>';
}
else
{
	if(!empty($_POST["nabavna_cena"])){
		$nabavna_cena = $_POST["nabavna_cena"];
	}
	else{
		$nabavna_cena = 0;
	}
	if(!empty($_POST["cena"])){
		$cena = $_POST["cena"];
	}
	else{
		$cena = $nabavna_cena + $nabavna_cena*0.2;
	}

	$duzina_gar_lista = $_POST["duzina_gar_lista"];
	$link = $_POST["link"];
	$slika = $_POST["slika"];
	$sql= "INSERT INTO proizvodi (Barcode, Naziv, Model, Dimenzije, Proizvodjac, Nabavna_cena, Cena, Kolicina, Broj_prodatih_primeraka, Datum_poslednje_prodaje, Duzina_garantnog_lista, Link, Slika, Tip) VALUES ('$barcode', '$naziv', '$model', '$dimenzije', '$proizvodjac', '$nabavna_cena', '$cena', '$kolicina', 0, '$datum', '$duzina_gar_lista', '$link', '$slika', '$tip')";
	$veza->query($sql) or die($veza->error);
	if($tip == "eksterni_disk"){
		if(isset($_POST["format_eksterni_disk"]))
		{
			$format = $_POST["format_eksterni_disk"];
		}
		else
		{
			$format = "";
		}
		if(isset($_POST["povezivanje"]))
		{
			$povezivanje = $_POST["povezivanje"];
		}
		else
		{
			$povezivanje = "";
		}
		if(isset($_POST["kapacitet"]))
		{
			$kapacitet = $_POST["kapacitet"];
		}
		else
		{
			$kapacitet = "";
		}
		$sql= "INSERT INTO eksterni_disk (Barcode, Format, Povezivanje, Kapacitet) VALUES ('$barcode', '$format', '$povezivanje', '$kapacitet')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "fles_memorija"){
		if(isset($_POST["usb_type_c"]))
		{
			$usb_type_c = $_POST["usb_type_c"];
		}
		else
		{
			$usb_type_c = "";
		}
		if(isset($_POST["brzina_citanja_pisanja"]))
		{
			$brzina_citanja_pisanja = $_POST["brzina_citanja_pisanja"];
		}
		else
		{
			$brzina_citanja_pisanja = "";
		}
		if(isset($_POST["kapacitet"]))
		{
			$kapacitet = $_POST["kapacitet"];
		}
		else
		{
			$kapacitet = "";
		}
		if(isset($_POST["povezivanje"]))
		{
			$povezivanje = $_POST["povezivanje"];
		}
		else
		{
			$povezivanje = "";
		}
		$sql= "INSERT INTO fles_memorija (Barcode, USB_Type_C, Brzina_citanja_pisanja, Kapacitet, Povezivanje) VALUES ('$barcode', '$usb_type_c', '$kapacitet', '$povezivanje')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "kablovi"){
		if(isset($_POST["strana_1"]))
		{
			$strana_1 = $_POST["strana_1"];
		}
		else
		{
			$strana_1 = "";
		}
		if(isset($_POST["strana_2"]))
		{
			$strana_2 = $_POST["strana_2"];
		}
		else
		{
			$strana_2 = "";
		}
		if(isset($_POST["broj_uticnica"]))
		{
			$broj_uticnica = $_POST["broj_uticnica"];
		}
		else
		{
			$broj_uticnica = "";
		}
		if(isset($_POST["tip"]))
		{
			$tip_kablovi = $_POST["tip"];
		}
		else
		{
			$tip_kablovi = "";
		}
		if(isset($_POST["prekidac"]))
		{
			$prekidac = $_POST["prekidac"];
		}
		else
		{
			$prekidac = "";
		}
		if(isset($_POST["vrsta_kablovi"]))
		{
			$vrsta = $_POST["vrsta_kablovi"];
		}
		else
		{
			$vrsta = "";
		}
		$sql= "INSERT INTO kablovi (Barcode, Strana_1, Strana_2, Broj_uticnica, Tip_kablovi, Prekidac, Vrsta) VALUES ('$barcode', '$strana_1', '$strana_2', '$broj_uticnica', '$tip_kablovi', '$prekidac', '$vrsta')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "mikrofon"){
		if(isset($_POST["povezivanje"]))
		{
			$povezivanje = $_POST["povezivanje"];
		}
		else
		{
			$povezivanje = "";
		}
		if(isset($_POST["duzina_kabla"]))
		{
			$duzina_kabla = $_POST["duzina_kabla"];
		}
		else
		{
			$duzina_kabla = "";
		}
		if(isset($_POST["frekvencijski_raspon"]))
		{
			$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
		}
		else
		{
			$frekvencijski_raspon = "";
		}
		$sql= "INSERT INTO mikrofon (Barcode, Povezivanje, Duzina_kabla, Frekvencijski_raspon) VALUES ('$barcode', '$povezivanje', '$duzina_kabla', '$frekvencijski_raspon')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "mis"){
		if(isset($_POST["za_obe_ruke"]))
		{
			$za_obe_ruke = $_POST["za_obe_ruke"];
		}
		else
		{
			$za_obe_ruke = "";
		}
		if(isset($_POST["rezolucija_mis"]))
		{
			$rezolucija = $_POST["rezolucija_mis"];
		}
		else
		{
			$rezolucija = "";
		}
		if(isset($_POST["povezivanje_mis"]))
		{
			$povezivanje = $_POST["povezivanje_mis"];
		}
		else
		{
			$povezivanje = "";
		}
		if(isset($_POST["gaming"]))
		{
			$gaming = $_POST["gaming"];
		}
		else
		{
			$gaming = "";
		}
		if(isset($_POST["senzor_mis"]))
		{
			$senzor = $_POST["senzor_mis"];
		}
		else
		{
			$senzor = "";
		}
		$sql= "INSERT INTO mis (Barcode, Za_obe_ruke, Rezolucija, Povezivanje, Gaming, Senzor) VALUES ('$barcode', '$za_obe_ruke', '$rezolucija', '$povezivanje', '$gaming', '$senzor')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "monitor"){
		if(isset($_POST["povezivanje"]))
		{
			$povezivanje = $_POST["povezivanje"];
		}
		else
		{
			$povezivanje = "";
		}
		if(isset($_POST["maksimalna_rezolucija"]))
		{
			$maksimalna_rezolucija = $_POST["maksimalna_rezolucija"];
		}
		else
		{
			$maksimalna_rezolucija = "";
		}
		if(isset($_POST["usb_monitor"]))
		{
			$usb = $_POST["usb_monitor"];
		}
		else
		{
			$usb = "";
		}
		if(isset($_POST["ugradjeni_zvucnici"]))
		{
			$ugradjeni_zvucnici = $_POST["ugradjeni_zvucnici"];
		}
		else
		{
			$ugradjeni_zvucnici = "";
		}
		if(isset($_POST["dijagonala_ekrana"]))
		{
			$dijagonala_ekrana = $_POST["dijagonala_ekrana"];
		}
		else
		{
			$dijagonala_ekrana = "";
		}
		if(isset($_POST["brzina_osvezavanja"]))
		{
			$brzina_osvezavanja = $_POST["brzina_osvezavanja"];
		}
		else
		{
			$brzina_osvezavanja = "";
		}
		if(isset($_POST["hdmi_monitor"]))
		{
			$hdmi = $_POST["hdmi_monitor"];
		}
		else
		{
			$hdmi = "";
		}
		if(isset($_POST["dvi"]))
		{
			$dvi = $_POST["dvi"];
		}
		else
		{
			$dvi = "";
		}
		if(isset($_POST["vga"]))
		{
			$vga = $_POST["vga"];
		}
		else
		{
			$vga = "";
		}
		if(isset($_POST["display_port"]))
		{
			$display_port = $_POST["display_port"];
		}
		else
		{
			$display_port = "";
		}
		if(isset($_POST["podesavanje_po_visini"]))
		{
			$podesavanje_po_visini = $_POST["podesavanje_po_visini"];
		}
		else
		{
			$podesavanje_po_visini = "";
		}
		if(isset($_POST["touchscreen"]))
		{
			$touchscreen = $_POST["touchscreen"];
		}
		else
		{
			$touchscreen = "";
		}
		if(isset($_POST["rotacija"]))
		{
			$rotacija = $_POST["rotacija"];
		}
		else
		{
			$rotacija = "";
		}
		$sql= "INSERT INTO monitor (Barcode, Povezivanje, Maksimalna_rezolucija, USB, Ugradjeni_zvucnici, Dijagonala_ekrana, Brzina_osvezavanja, HDMI, DVI, VGA, Display_port, Podesavanje_po_visini, TouchScreen, Rotacija) VALUES ('$barcode', '$povezivanje', '$maksimalna_rezolucija', '$usb', '$ugradjeni_zvucnici', '$dijagonala_ekrana', '$brzina_osvezavanja', '$hdmi', '$dvi', '$vga', '$display_port', '$podesavanje_po_visini', '$touchscreen', '$rotacija')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "podloga"){
		if(isset($_POST["tip_podloga"]))
		{
			$tip_podloga = $_POST["tip_podloga"];
		}
		else
		{
			$tip_podloga = "";
		}
		if(isset($_POST["materijal_podloga"]))
		{
			$materijal = $_POST["materijal_podloga"];
		}
		else
		{
			$materijal = "";
		}
		$sql= "INSERT INTO podloga (Barcode, Tip_podloga, Materijal) VALUES ('$barcode', '$tip_podloga', '$materijal')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "projektor"){
		if(isset($_POST["povezivanje"]))
		{
			$povezivanje = $_POST["povezivanje"];
		}
		else
		{
			$povezivanje = "";
		}
		if(isset($_POST["tip_projektor"]))
		{
			$tip_projektor = $_POST["tip_projektor"];
		}
		else
		{
			$tip_projektor = "";
		}
		if(isset($_POST["rezolucija"]))
		{
			$rezolucija = $_POST["rezolucija"];
		}
		else
		{
			$rezolucija = "";
		}
		if(isset($_POST["osvetljenje"]))
		{
			$osvetljenje = $_POST["osvetljenje"];
		}
		else
		{
			$osvetljenje = "";
		}
		if(isset($_POST["wireless"]))
		{
			$wireless = $_POST["wireless"];
		}
		else
		{
			$wireless = "";
		}
		if(isset($_POST["usb"]))
		{
			$usb = $_POST["usb"];
		}
		else
		{
			$usb = "";
		}
		if(isset($_POST["mreza"]))
		{
			$mreza = $_POST["mreza"];
		}
		else
		{
			$mreza = "";
		}
		if(isset($_POST["hdmi"]))
		{
			$hdmi = $_POST["hdmi"];
		}
		else
		{
			$hdmi = "";
		}
		if(isset($_POST["dvi"]))
		{
			$dvi = $_POST["dvi"];
		}
		else
		{
			$dvi = "";
		}
		if(isset($_POST["rs232"]))
		{
			$rs232 = $_POST["rs232"];
		}
		else
		{
			$rs232 = "";
		}
		if(isset($_POST["vga"]))
		{
			$vga = $_POST["vga"];
		}
		else
		{
			$vga = "";
		}
		$sql= "INSERT INTO projektor (Barcode, Povezivanje, Tip_projektor, Rezolucija, Osvetljenje, Wireless, USB, Mreza, HDMI, DVI, RS232, VGA) VALUES ('$barcode', '$povezivanje', '$tip_projektor', '$rezolucija', '$osvetljenje', '$wireless', '$usb', '$mreza', '$hdmi', '$dvi', '$rs232', '$vga')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "skener"){
		if(isset($_POST["format_skener"]))
		{
			$format = $_POST["format_skener"];
		}
		else
		{
			$format = "";
		}
		if(isset($_POST["flatbed"]))
		{
			$flatbed = $_POST["flatbed"];
		}
		else
		{
			$flatbed = "";
		}
		if(isset($_POST["povezivanje"]))
		{
			$povezivanje = $_POST["povezivanje"];
		}
		else
		{
			$povezivanje = "";
		}
		if(isset($_POST["rezolucija"]))
		{
			$rezolucija = $_POST["rezolucija"];
		}
		else
		{
			$rezolucija = "";
		}
		if(isset($_POST["adf"]))
		{
			$adf = $_POST["adf"];
		}
		else
		{
			$adf = "";
		}
		$sql= "INSERT INTO skener (Barcode, Format, Flatbed, Povezivanje, Rezolucija, ADF) VALUES ('$barcode', '$format', '$flatbed', '$povezivanje', '$rezolucija', '$adf')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "slusalice"){
		if(isset($_POST["tip_slusalice"]))
		{
			$tip_slusalice = $_POST["tip_slusalice"];
		}
		else
		{
			$tip_slusalice = "";
		}
		if(isset($_POST["mikrofon_slusalice"]))
		{
			$mikrofon = $_POST["mikrofon_slusalice"];
		}
		else
		{
			$mikrofon = "";
		}
		if(isset($_POST["zvucni_sistem_slusalice"]))
		{
			$zvucni_sistem = $_POST["zvucni_sistem_slusalice"];
		}
		else
		{
			$zvucni_sistem = "";
		}
		if(isset($_POST["povezivanje"]))
		{
			$povezivanje = $_POST["povezivanje"];
		}
		else
		{
			$povezivanje = "";
		}
		if(isset($_POST["gaming"]))
		{
			$gaming = $_POST["gaming"];
		}
		else
		{
			$gaming = "";
		}
		if(isset($_POST["frekvencijski_raspon"]))
		{
			$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
		}
		else
		{
			$frekvencijski_raspon = "";
		}
		$sql= "INSERT INTO slusalice (Barcode, Tip_slusalice, Mikrofon, Zvucni_sistem, Povezivanje, Gaming, Frekvencijski_raspon) VALUES ('$barcode', '$tip', '$mikrofon', '$zvucni_sistem', '$povezivanje', '$gaming', '$frekvencijski_raspon')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "stampac"){
		if(isset($_POST["tip_stampac"]))
		{
			$tip_stampac = $_POST["tip_stampac"];
		}
		else
		{
			$tip_stampac = "";
		}
		if(isset($_POST["povezivanje"]))
		{
			$povezivanje = $_POST["povezivanje"];
		}
		else
		{
			$povezivanje = "";
		}
		if(isset($_POST["rezolucija"]))
		{
			$rezolucija = $_POST["rezolucija"];
		}
		else
		{
			$rezolucija = "";
		}
		if(isset($_POST["brzina_stampe"]))
		{
			$brzina_stampe = $_POST["brzina_stampe"];
		}
		else
		{
			$brzina_stampe = "";
		}
		if(isset($_POST["bar_kod"]))
		{
			$bar_kod = $_POST["bar_kod"];
		}
		else
		{
			$bar_kod = "";
		}
		if(isset($_POST["mreza"]))
		{
			$mreza = $_POST["mreza"];
		}
		else
		{
			$mreza = "";
		}
		if(isset($_POST["wireless"]))
		{
			$wireless = $_POST["wireless"];
		}
		else
		{
			$wireless = "";
		}
		$sql= "INSERT INTO stampac (Barcode, Tip_stampac, Povezivanje, Rezolucija, Brzina_stampe, Bar_kod, Mreza, Wireless) VALUES ('$barcode', '$tip_stampac', '$povezivanje', '$rezolucija', '$brzina_stampe', '$bar_kod', '$mreza', '$wireless')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "tastatura"){
		if(isset($_POST["povezivanje"]))
		{
			$povezivanje = $_POST["povezivanje"];
		}
		else
		{
			$povezivanje = "";
		}
		if(isset($_POST["usb_port"]))
		{
			$usb_port = $_POST["usb_port"];
		}
		else
		{
			$usb_port = "";
		}
		if(isset($_POST["numericki_deo"]))
		{
			$numericki_deo = $_POST["numericki_deo"];
		}
		else
		{
			$numericki_deo = "";
		}
		if(isset($_POST["tip_tastatura"]))
		{
			$tip_tastatura = $_POST["tip_tastatura"];
		}
		else
		{
			$tip_tastatura = "";
		}
		if(isset($_POST["tip_tastera_tastatura"]))
		{
			$tip_tastera = $_POST["tip_tastera_tastatura"];
		}
		else
		{
			$tip_tastera = "";
		}
		if(isset($_POST["programabilni_tasteri"]))
		{
			$programabilni_tasteri = $_POST["programabilni_tasteri"];
		}
		else
		{
			$programabilni_tasteri = "";
		}
		if(isset($_POST["rgb_osvetljenje"]))
		{
			$rgb_osvetljenje = $_POST["rgb_osvetljenje"];
		}
		else
		{
			$rgb_osvetljenje = "";
		}
		$sql= "INSERT INTO tastatura (Barcode, Povezivanje, USB_port, Numericki_deo, Tip_tastatura, Tip_tastera, Programabilni_tasteri, RGB_osvetljenje) VALUES ('$barcode', '$povezivanje', '$usb_port', '$numericki_deo', '$tip_tastatura', '$tip_tastera', '$programabilni_tasteri', '$rgb_osvetljenje')";
		$veza->query($sql) or die($veza->error);
	}
	if($tip == "zvucnici"){
		if(isset($_POST["zvucni_sistem_zvucnici"]))
		{
			$zvucni_sistem = $_POST["zvucni_sistem_zvucnici"];
		}
		else
		{
			$zvucni_sistem = "";
		}
		if(isset($_POST["snaga"]))
		{
			$snaga = $_POST["snaga"];
		}
		else
		{
			$snaga = "";
		}
		if(isset($_POST["konektori"]))
		{
			$konektori = $_POST["konektori"];
		}
		else
		{
			$konektori = "";
		}
		if(isset($_POST["povezivanje"]))
		{
			$povezivanje = $_POST["povezivanje"];
		}
		else
		{
			$povezivanje = "";
		}
		if(isset($_POST["frekvencijski_raspon"]))
		{
			$frekvencijski_raspon = $_POST["frekvencijski_raspon"];
		}
		else
		{
			$frekvencijski_raspon = "";
		}
		$sql= "INSERT INTO zvucnici (Barcode, Zvucni_sistem, Snaga, Konektori, Povezivanje, Frekvencijski_raspon) VALUES ('$barcode', '$zvucni_sistem', '$snaga, '$konektori', '$povezivanje', '$frekvencijski_raspon')";
		$veza->query($sql) or die($veza->error);
	}
}

if($flag == 0)
{
	if(isset($_POST["dodaj"]))
	{
		$veza->query("DELETE FROM pristigliproizvodi WHERE Barcode = '$barcode'");
	}
	echo '<script>
        window.location.href = "pristigla_roba.php";
	</script>';
}
elseif($flag == 1)
{
	echo '<script>
        window.location.href = "dodaj1.php?Tip='.$tip.'";
	</script>';
}

}
else{
    header('Location: login.php');
    exit();
}
