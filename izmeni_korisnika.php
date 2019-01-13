<?php
if(isset($_POST["izmeni"])){
	$id = $_POST["id"];
	$veza = mysqli_connect("localhost", "root", "", "SI2");
	$sql = "SELECT * FROM autorizovani_korisnici WHERE ID = '".$id."'";
	$result = mysqli_query($veza, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$ime = $row['Ime'];
		$prezime = $row['Prezime'];
		$email = $row['E_mail_adresa'];
		$password = $row['Password'];
		$pristup = $row['Nivo_pristupa'];
	}
	if(($_POST['ime']) != ""){
		$ime = $_POST["ime"];
	}
	if(($_POST['prezime']) != ""){
		$prezime = $_POST["prezime"];
	}
	if(($_POST['email']) != ""){
		$email = $_POST["email"];
	}
	if(($_POST['password']) != ""){
		$password = $_POST["password"];
	}
	if(($_POST['pristup']) != ""){
		$pristup = $_POST["pristup"];
	}
	$sql = "UPDATE autorizovani_korisnici SET Ime ='" .$ime. "', Prezime = '" .$prezime. "', E_mail_adresa = '" .$email. "', Password = '" .$password. "', Nivo_pristupa = '" .$pristup. "' WHERE ID = '" .$id. "'";
	$veza->query($sql) or die($veza->error);

	?>

<script>
           window.location.href = 'prikaz_korisnika.php';
</script> <?php
}
else{ 
	$id = $_GET["id"];
	?>

	<form action="izmeni_korisnika.php" method="POST">
		<div class="row">
			<div class="col-sm-6">
					<div class="form-group">									
						<input type="text" name="ime" placeholder="Ime" class="form-control selectTip" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="prezime" placeholder="Prezime" class="form-control selectTip" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="email" placeholder="E-mail" class="form-control selectTip" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="password" placeholder="Password" class="form-control selectTip" autofocus>
					</div>
					<select name="pristup" class="form-control">
						<option value="">Odaberi nivo pristupa</option>
						<option value="Administrator">Administrator</option>
						<option value="Vlasnik">Vlasnik</option>
						<option value="Komercijalista">Komercijalista</option>
						<option value="Radnik">Radnik</option>
					</select>
					<br>     
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<button type="submit" name="izmeni" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-plus"></i> Dodaj</button>  
				</div>
			</div>
		</form>
<?php }