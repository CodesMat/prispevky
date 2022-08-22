<?php
include_once "conn.inc.php";
include_once "header.php";

  ?>

  <div class="container">
	<form id="login" class="row"  method="POST" action="login.inc.php" >
		<div class="col-md-3"><label>1.EMAIL:<input type="text" name="email"></label></div>
		<div class="col-md-3"><label>1.HESLO:<input type="text" name="heslo"></label></div>
		<div class="col-md-12"><input type="submit" name="odeslat"></div>
	</form>
</div>
<script type="text/javascript">
		$(document).ready(function(){
$("#login").validate({
	rules:{
		email: {
			email:true,
			required:true,
		},
		heslo: {
			required:true,
		},
		
		
		
		
		
		
		
		
	}
});
		});
	</script>
	<?php
	if (isset($_GET['error'])) {
if ($_GET['error']==1) {
	echo "špatný email";
	}
	if ($_GET['error']==2||$_GET['error']==1) {
?><a href="">?Zapomenuté heslo?</a>
	Zadejte kontrolní odpověď na svou otázku-
<form method="GET">
	<input type="text" name="odpovedNa">
	<input type="submit" name="odpoved">
</form>
	<?php
	}
}
	  ?>
</div>
<?php
if (isset($_GET['odpoved'])) {
	$odpovedNa=$_GET['odpovedNa'];
	$sql = "SELECT * FROM uzivatele; ";
	$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  	echo $row['odpoved'];
 if ($odpovedNa==$row['odpoved']) {
 echo "spravne ";?>
<form method="GET">
	<input type="text" name="noveHeslo">
	<input type="submit" name="vyhodnot">
</form>
 <?php
 }
 else{
 	echo "spatne";
 header("Location: ./login.php?error=1");
 }

  }
}

	//porovnat se všemi odpovedmi na otazku v databázi 



}
?>