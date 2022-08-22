// vzit data z loginu
// porovnat s daty v databazy hash na normalni heslo
// kdyz se oboje shoduji prihlasit uzivatele 
//
<?php
session_start();

include_once 'conn.inc.php';
if (isset($_POST['odeslat'])) {
$email = $_POST['email'];
$heslo = $_POST['heslo'];
$sql = "SELECT * FROM uzivatele WHERE email = '$email';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if (password_verify($heslo, $row['heslo'])) {
      $sess = $row['username'];
      $_SESSION['username'] = $sess;
      $_SESSION['id'] = $row['id_uzi']; 
    header("Location: ./index.php");
      echo $_SESSION['username'];
   
    }
    else{
      header("Location: ./login.php?error=2");
    }

      
}
}
else{
   header("Location: ./login.php?error=1");
}
}

  ?>
      