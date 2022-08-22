 <?php
include_once 'conn.inc.php';

   ?>
 <div class="container" >
  <a href="">Seřadit příspěvky</a>
  <form method="GET">
    <select>
    <option value="datum">datum</option>
    <option value="jmeno">jmeno autora</option>
    <option value="nadpis">jmeno prispevku</option>
    <option value="komentar">počet komentaru</option>
    <input type="submit" name="seradit">
  </select>
</form>
  <form  id="prispevky" class="row"  method="GET"  >
    <div style="width:120px; " class="col-md-6"><label>1.NADPIS:<input type="text" name="nadpis"></label></div>
    <div class="col-md-6" style="width:120px; "><label>1.TEXT:<textarea name="telo"></textarea></label></div>
    <div class="col-md-12"><input type="submit" name="vytvoritP"></div>
  </form>
</div>

<script type="text/javascript">
    $(document).ready(function(){
$("#prispevky").validate({
  rules:{
    nadpis: {
      required:true,
    },
    telo:{
      required: true,
    },
   
    
  }
});
    });
  </script>

<?php
if(isset($_GET['vytvoritP'])) {
  $nadpis = $_GET['nadpis'];
  $telo = $_GET['telo'];
  $id_uzi = $_SESSION['id'];
  if (!isset($_SESSION['username'])) {
$username="nepřihlášený uživatel";
$id_uzi = 46;
  }

  
  $sql = "INSERT INTO prispevky (nadpis,telo,id_uzi) VALUES ('$nadpis','$telo','$id_uzi'); ";
  if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: ./index.php?prispevek=succ");

}
 else {  header("Location: ./index.php?prispevek=error");
}

}
  ?>