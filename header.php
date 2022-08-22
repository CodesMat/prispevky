
<?php
session_start();


  ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styl.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <title>Forum</title>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

/* Change the link color on hover */
li a:hover {
  background-color: #555;
  color: white;
}
</style>
</head>
<body>

<h2>Příspěvkové forum</h2>

<ul>

  <?php
if (isset($_SESSION['username'])) {
  ?>
      <li><a href="#profile"><?php echo $_SESSION['username']; ?></a></li>
  <li><a href="#profile">profil</a></li>
  <li><a href="logout.php">Odhlásit se</a></li>
  <?php
}  else{
    ?>
  <li><a href="register.php">Registrace</a></li>
  <li><a href="login.php">Login</a></li>
  <?php
  }



    ?>

  <li><a href="index.php">Příspěvky</a></li>
</ul>
