 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style>
 		body{

 			text-align: center;
			background-color: #FFEBCD;
			align-content: center;
 		}
.table-responsive{

	text-align: center;
}

 
 	</style>
 </head>
 <body>
 	<div class="table-responsive">
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Filename</th>
    </tr>
  </thead>
  <tbody>

  <?php
    $files = scandir('pdffajlovi/');
    rsort($files); // this does the sorting
    foreach($files as $file)
    {
      echo'<tr><td><a href="pdffajlovi/'.$file.'">'.$file.'</a></td></tr>';
    }
  ?>
  </tbody>
</table>

 </form>
 </body>
 </html>




