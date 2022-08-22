<?php
include_once "conn.inc.php";
$sql = "SELECT * FROM prispevky JOIN uzivatele ON prispevky.id_uzi = uzivatele.id_uzi;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  	$id_pri=$row['id_pri'];
  	?><div style=" width:40%; margin-top:6%;" class="container">
  		<div  class="row">
  			<div class="nadpis col-md-12"><a style="font-size: 35px;"  href="podrobnyPrispevek.php?idp=<?php echo $id_pri;?>" ><?php echo $row['nadpis']?></a></div>
  			<div class="telo col-md-12"><?php echo $row['telo']?></div>
  			<div  class="datum col-md-12"><?php echo $row['datum_pri']?></div>
  			<?php if (isset($_SESSION['id'])) {
  				if ($_SESSION['id']==1||$_SESSION['id']==$row['id_uzi']) {
  					?><div  class="datum col-md-12"><a href="index.php?odstran=<?php echo $row['id_pri']; ?>">odstranit</a></div> <?php
  				}
  			} ?>
  		</div>
  	</div><?php
  }
}
else{
	echo "nejsou žádne prispevky";
}
if (isset($_SESSION['id'])) {
echo "id je nastaveno";
if (isset($_GET['odstran'])) {
	$id_prispevku = $_GET['odstran'];
	$sql =" DELETE   FROM prispevky WHERE id_pri = '$id_prispevku';";
	if ($conn->query($sql) === TRUE) {
		header("Location: ./index.php?prispevekSmazany");
	}
	else{
		echo "něco se nepovedlo";
		header("Location: ./index.php?prispevekError");
	}
}
}

  ?>