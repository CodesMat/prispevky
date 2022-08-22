<?php 
include_once 'conn.inc.php';
include_once 'header.php';
 ?> 
<div  style="width: 46%; border:3px solid black;" class="container">

<?php
$idp = $_GET['idp'];
$sql = "SELECT * FROM prispevky JOIN uzivatele ON prispevky.id_uzi = uzivatele.id_uzi WHERE prispevky.id_pri = '$idp'; ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

  	?>
  	<div class="row">
  	<div class="col-md-12"><h2 href=""><?php echo $row['nadpis'] ?></h2></div>
  	<div class="col-md-12"><p style="font-size: 20px;" href=""><?php echo $row['telo'] ?></p></div>
  	<div class="col-md-6"><p href=""><?php echo $row['username'] ?></p></div>

  	<div class="col-md-6"><p ><?php echo $row['datum_pri'] ?></p></div>
  	<button>komentáře</button>
  	<button>přidat komentáře</button>
  	</div>


   
    
  </div>
<div style="width:40%;margin-top: 10%;" class="container">
      <div class="row">
        <div>
          <form method="GET" action="podrobnyPrispevek.php?idp=21">
            <label>Komentář:<input type="text" name="texst"></label>
            <label><input type="submit"  name="odeslat"></label>
          </form>
        </div>
      </div>
    </div>
<?php
$idp = $_GET['idp'];
if (isset($_GET['odeslat'])) {
  echo "chlape notak";
  if (!isset($_SESSION['id'])) {
    $_SESSION['id'] == 46;

  }
 $idu= $_SESSION['id']; 
$text = $_GET['text'];
$sql = "INSERT INTO komentare(text, id_pri,id_uzi) VALUES ('$text','$idp','$idu');";
if ($conn->query($sql) === TRUE) {
  echo "komentar pridan";
}

}

      ?>
    <?php
    }

  }
  else{
    echo "neco se nepovedlo";
  }

  ?>


  <?php 
  $idp = $_GET['idp'];
$sql = "SELECT * FROM komentare JOIN uzivatele ON komentare.id_uzi= uzivatele.id_uzi WHERE id_pri = '$idp'  ;";
$result = $conn->query($sql);
if ($result->num_rows>0) {
  while($row = $result->fetch_assoc()){
     ?>
     <div class="container">
  <div style="width: 40%;border:3px solid purple;margin-top:6px;" class="row">
    <div class="col-md-6">
      <a style="text-decoration: none;color:black;"><?php echo $row['text']; ?></a>
       <h5><?php echo $row['username']; ?></h5>
       <?php if (isset($_SESSION['id'])) {
          if ($_SESSION['id']==1||$_SESSION['id']==$row['id_uzi']) {
            ?><div  class="datum col-md-12"><a href="index.php?odstran=<?php echo $row['id_kom']; ?>">odstranit</a></div> <?php
          }
        } ?>
    </div>
</div>
</div>
     <?php
  }
}

     ?>

     <?php
if (isset($_SESSION['id'])) {
echo "id je nastaveno";
if (isset($_GET['odstran'])) {
  $id_prispevku = $_GET['odstran'];
  $sql =" DELETE   FROM prispevky WHERE id_pri = '$id_prispevku';";
  if ($conn->query($sql) === TRUE) {
    header("Location: ./podrobnyPrispevek.php?");
  }
  else{
    echo "něco se nepovedlo";
    header("Location: ./index.php?prispevekError");
  }
}
}

       ?>
