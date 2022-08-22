<?php
include_once 'conn.inc.php';
//pripojit k
//vzít data z registeru 
// zapsat do DB 
// 

if (isset($_POST['vyhodnot'])) {
$jmeno = $_POST['jmeno'];
$prijmeni = $_POST['prijmeni'];
$username = $_POST['username'];
$email = $_POST['email'];
$heslo = $_POST['heslo'];
$otazka = $_POST['otazka'];
$poznamka = $_POST['poznamka'];
$odpoved = $_POST['odpoved'];
$hash=password_hash($_POST['heslo'], PASSWORD_DEFAULT);
//echo $jmeno;
//echo $username;
//echo $poznamka;
//		echo $hash;	
$sql = "INSERT INTO uzivatele (jmeno, prijmeni,username,email,heslo,otazka,odpoved,poznamka)VALUES ('$jmeno','$prijmeni','$username','$email','$hash','$otazka','$odpoved','$poznamka');";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  $_SESSION['username'] = $_POST['username'];
  $sess = $_SESSION['username'];
  header("Location: ./index.php?succes=succ");

} else {
  header("Location: ./register.php?error=1");
  echo "Error: " . $sql . "Heslo Musí být unikátní " . $conn->error;
}

}


  ?>