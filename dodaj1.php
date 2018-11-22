<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>

        <link rel="stylesheet" href="dodaj1.css">
    </head>
    <body>
        <div class="container">
            <div class="form-horizontal" role="form">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <h1 class="">Forma za unos proizvoda</h1>
                            </div>
                            <div class="form-group">
                                <label for="firstName" class="col-sm-3 control-label">Tip</label>
                                <div class="col-sm-9">
                                    <form id="form1" action="dodaj1.php" method="POST">
                                        <select name="Tip" onchange = "submitForm()" class="form-control">
                                            <option value="" selected disabled hidden>Tip</option>
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
                                    </form>
                                </div>
                            </div>

                            <script type="text/javascript">
                                function submitForm()
                                {
                                     document.getElementById('form1').submit();
                                }
                            </script>

                        <?php
                            if (isset($_POST["Tip"])) {
                                $select = $_POST["Tip"];
                        ?>

                            <form action="dodaj2.php" method="POST" id="tekst">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Barcode</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tekst2" name="proizvod_barcode" placeholder="Barcode" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Naziv</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tekst2" name="naziv" placeholder="Naziv" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Model</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tekst2" name="model" placeholder="Model" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Dimenzije</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tekst2" name="dimenzije" placeholder="Dimenzije" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Proizvodjac</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tekst2" name="proizvodjac" placeholder="Proizvodjac" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Cena</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tekst2" name="cena" placeholder="Cena" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kolicina</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tekst2" name="kolicina" placeholder="Kolicina" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Duzina garantnog lista</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="tekst2" name="duzina_gar_lista" placeholder="Duzina garantnog lista" class="form-control" autofocus>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-sm-3 control-label">Link</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="tekst2" name="link" placeholder="Link" class="form-control" autofocus>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Slika</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="tekst2" name="slika" placeholder="Slika" class="form-control" autofocus>
                                    </div>
                                </div>                               
                        </div>    
                        <div class="col">
                                <?php
                                if ($select == "eksterni_disk") {
                                    ?> 
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Format</label>
                                        <div class="col-sm-9">
                                            <select name="format_eksterni_disk" id="tekst2" class="form-control">
                                                <option value="" selected disabled hidden>Format</option>
                                                <option value="<2.5">2.5</option>
                                                <option value="3.5">3.5</option>
                                            </select>                                       
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Povezivanje</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="tekst2" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Kapacitet</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="tekst2" name="kapacitet" placeholder="Kapacitet" class="form-control" autofocus>
                                        </div>
                                    </div>

                                <?php 
                                    }
                                    if ($select == "fles_memorija") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">USB Type C</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="usb_type_c" placeholder="USB type C" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Brzina citanja i pisanja</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="brzina_citanja_pisanja" placeholder="Brzina citanja i pisanja" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Kapacitet</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="kapacitet" placeholder="Kapacitet" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Povezivanje</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        
                                    <?php 
                                    } 
                                    if ($select == "kablovi") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Strana 1</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="strana_1" placeholder="Strana 1" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Strana 2</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="strana_2" placeholder="Strana 2" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Broj uticnica</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="broj_uticnica" placeholder="Broj uticnica" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tip</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="tip" placeholder="Tip" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Prekidac</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="prekidac" placeholder="Prekidac" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Vrsta</label>
                                            <div class="col-sm-9">
                                                <select name="vrsta_kablovi" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Vrsta</option>
                                                    <option value="<Kabl">Kabl</option>
                                                    <option value="Adapter">Adapter</option>
                                                </select>
                                            </div>
                                        </div>
                                      
                                    <?php 
                                    }
                                    if ($select == "mikrofon") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Povezivanje</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Duzina kabla</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="duzina_kabla" placeholder="Duzina kabla" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Frekvencijski raspon</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="frekvencijski_raspon" placeholder="Frekvencijski raspon" class="form-control" autofocus>
                                            </div>
                                        </div>
                                       
                                    <?php 
                                    }
                                    if ($select == "mis") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Za obe ruke</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="za_obe_ruke" placeholder="Za obe ruke" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Rezolucija</label>
                                            <div class="col-sm-9">
                                                <select name="rezolucija_mis" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Rezolucija</option>
                                                    <option value="<1000 dpi"><?php echo "<1000 dpi" ?></option>
                                                    <option value="000-2000 dpi">000-2000 dpi</option>
                                                    <option value="2000-3000 dpi">2000-3000 dpi</option>
                                                    <option value="3000-4000 dpi">3000-4000 dpi</option>
                                                    <option value=">4000 dpi"><?php echo ">4000 dpi" ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Povezivanje</label>
                                            <div class="col-sm-9">
                                                <select name="povezivanje_mis" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Povezivanje</option>
                                                    <option value="USB">USB</option>
                                                    <option value="PS/2">PS/2</option>
                                                    <option value="Wireless">Wireless</option>
                                                    <option value="Bluetooth">Bluetooth</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Gaming</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="gaming" placeholder="Gaming" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Senzor</label>
                                            <div class="col-sm-9">
                                                <select name="senzor_mis" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Senzor</option>
                                                    <option value="Opticki">Opticki</option>
                                                    <option value="Laserski">Laserski</option>
                                                    <option value="Hero">Hero</option>
                                                </select>
                                            </div>
                                        </div>

                                    <?php 
                                    }
                                    if ($select == "monitor") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Povezivanje</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Maksimalna rezolucija</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="maksimalna_rezolucija" placeholder="Maksimalna rezolucija" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">USB</label>
                                            <div class="col-sm-9">
                                                <select name="usb_monitor" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>USB</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value=">4"><?php echo ">4" ?></option>
                                                    <option value="Ne">Ne</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Ugradjeni zvucnici</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="ugradjeni_zvucnici" placeholder="Ugradjeni zvucnici" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Dijagonala ekrana</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="dijagonala_ekrana" placeholder="Dijagonala ekrana" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Brzina osvezavanja</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="brzina_osvezavanja" placeholder="Brzina osvezavanja" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">HDMI</label>
                                            <div class="col-sm-9">
                                                <select name="hdmi_monitor" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>HDMI</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value=">3"><?php echo ">3" ?></option>
                                                    <option value="Ne">Ne</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">DVI</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="dvi" placeholder="DVI" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">VGA</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="vga" placeholder="VGA" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Display port</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="display_port" placeholder="Display port" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Podesavanje po visini</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="podesavanje_po_visini" placeholder="Podesavanje po visini" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">TouchScreen</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="touchscreen" placeholder="TouchScreen" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Rotacija</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="rotacija" placeholder="Rotacija" class="form-control" autofocus>
                                            </div>
                                        </div>
                                                                           
                                    <?php 
                                    }
                                    if ($select == "podloga") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tip</label>
                                            <div class="col-sm-9">
                                                <select name="tip_podloga" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Tip</option>
                                                    <option value="Obicna">Obicna</option>
                                                    <option value="Sa gelom">Sa gelom</option>
                                                    <option value="Gamerska">Gamerska</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Materijal</label>
                                            <div class="col-sm-9">
                                                <select name="materijal_podloga" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Materijal</option>
                                                    <option value="PVC">PVC</option>
                                                    <option value="Guma">Guma</option>
                                                    <option value="Platno">Platno</option>
                                                </select>
                                            </div>
                                        </div>
                                                                              
                                    <?php 
                                    }
                                    if ($select == "projektor") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Povezivanje</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tip</label>
                                            <div class="col-sm-9">
                                                <select name="tip_projektor" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Tip</option>
                                                    <option value="DLP">DLP</option>
                                                    <option value="DLP LCD">DLP LCD</option>
                                                    <option value="3LCD">3LCD</option>
                                                    <option value="LCOS">LCOS</option>
                                                    <option value="LCD">LCD</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Rezolucija</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="rezolucija" placeholder="Rezolucija" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Osvetljenje</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="osvetljenje" placeholder="Osvetljenje" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Wireless</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="wireless" placeholder="Wireless" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">USB</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="usb" placeholder="USB" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Mreza</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="mreza" placeholder="Mreza" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">HDMI</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="hdmi" placeholder="HDMI" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">DVI</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="dvi" placeholder="DVI" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">RS232</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="rs232" placeholder="RS232" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">VGA</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="vga" placeholder="VGA" class="form-control" autofocus>
                                            </div>
                                        </div>
                                                                               
                                    <?php 
                                    }
                                    if ($select == "skener") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Format</label>
                                            <div class="col-sm-9">
                                                <select name="format_skener" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Format</option>
                                                    <option value="A6">A6</option>
                                                    <option value="A5">A5</option>
                                                    <option value="A4">A4</option>
                                                    <option value="A3">A3</option>
                                                    <option value="A2">A2</option>
                                                    <option value="A1">A1</option>
                                                    <option value="A0">A0</option>
                                                    <option value=">A0"><?php echo ">A0" ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Flatbed</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="flatbed" placeholder="Flatbed" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Povezivanje</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Rezolucija</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="rezolucija" placeholder="Rezolucija" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">ADF</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="adf" placeholder="ADF" class="form-control" autofocus>
                                            </div>
                                        </div>
                                                                               
                                    <?php 
                                    }
                                    if ($select == "slusalice") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tip</label>
                                            <div class="col-sm-9">
                                                <select name="tip_slusalice" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Tip</option>
                                                    <option value="Bubice">Bubice</option>
                                                    <option value="Slusalice">Slusalice</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Mikrofon</label>
                                            <div class="col-sm-9">
                                                <select name="mikrofon_slusalice" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Mikrofon</option>
                                                    <option value="Ne">Ne</option>
                                                    <option value="Na rucici">Na rucici</option>
                                                    <option value="Na slusalici">Na slusalici</option>
                                                    <option value="Na kablu">Na kablu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Zvucni sistem</label>
                                            <div class="col-sm-9">
                                                <select name="zvucni_sistem_slusalice" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Zvucni sistem</option>
                                                    <option value="5.1">5.1</option>
                                                    <option value="7.1">7.1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Povezivanje</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Gaming</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="gaming" placeholder="Gaming" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Frekvencijski raspon</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="frekvencijski_raspon" placeholder="Frekvencijski raspon" class="form-control" autofocus>
                                            </div>
                                        </div>
                                                                                                                                                     
                                    <?php 
                                    }
                                    if ($select == "stampac") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tip</label>
                                            <div class="col-sm-9">
                                                <select name="tip_stampac" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Tip</option>
                                                    <option value="Matricni">Matricni</option>
                                                    <option value="Laserski">Laserski</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Povezivanje</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Rezolucija</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="rezolucija" placeholder="Rezolucija" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Brzina stampe</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="brzina_stampe" placeholder="Brzina stampe" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Bar kod</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="bar_kod" placeholder="Bar kod" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Mreza</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="mreza" placeholder="Mreza" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Wireless</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="wireless" placeholder="Wireless" class="form-control" autofocus>
                                            </div>
                                        </div>

                                    <?php 
                                    }
                                    if ($select == "tastatura") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Povezivanje</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">USB</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="usb_port" placeholder="USB" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Numericki deo</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="numericki_deo" placeholder="Numericki deo" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tip</label>
                                            <div class="col-sm-9">
                                                <select name="tip_tastatura" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Tip</option>
                                                    <option value="Wired">Wired</option>
                                                    <option value="Wireless">Wireless</option>
                                                    <option value="Bluetooth">Bluetooth</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Tip tastera</label>
                                            <div class="col-sm-9">
                                                <select name="tip_tastera_tastatura" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Tip tastera</option>
                                                    <option value="Mehanicki">Mehanicki</option>
                                                    <option value="X_Scissor">X_Scissor</option>
                                                    <option value="Gumena_membrana">Gumena_membrana</option>
                                                    <option value="Hibridni">Hibridni</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Programabilni tasteri</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="programabilni_tasteri" placeholder="Programabilni tasteri" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">RGB osvetljenje</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="rgb_osvetljenje" placeholder="RGB osvetljenje" class="form-control" autofocus>
                                            </div>
                                        </div>
                                                                            
                                    <?php 
                                    }
                                    if ($select == "zvucnici") { ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Zvucni sistem</label>
                                            <div class="col-sm-9">
                                                <select name="zvucni_sistem_zvucnici" id="tekst2" class="form-control">
                                                    <option value="" selected disabled hidden>Zvucni sistem</option>
                                                    <option value="4.1">4.1</option>
                                                    <option value="5.1">5.1</option>
                                                    <option value="7.1">7.1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Snaga</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="snaga" placeholder="Snaga" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Konektori</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="konektori" placeholder="Konektori" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Povezivanje</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="povezivanje" placeholder="Povezivanje" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Frekvencijski raspon</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="tekst2" name="frekvencijski_raspon" placeholder="Frekvencijski raspon" class="form-control" autofocus>
                                            </div>
                                        </div>
                                                                                
                                    <?php 
                                    }
                                    ?>

                                    <input type="hidden" name="selektovani_tip" value="<?php echo $select ?>">
                                    <button type="submit" name="dodaj" id="tekst2" class="btn btn-primary btn-block">Add</button>
                                <?php
                            }
                            ?>
                            </form>   
                        </div>                                                                 
                    </div>   
                </div>                                
            </div>          
        </div>
    </body>
</html>