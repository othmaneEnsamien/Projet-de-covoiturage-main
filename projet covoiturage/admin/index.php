<?php
session_start();
error_reporting(1);
require('../connection.php');
extract($_REQUEST);
if (isset($login)) {
  $sql = $con->query("select * from administrateur where email_administrateur='$eid'");
  if ($row = mysqli_fetch_array($sql)) {
    if ($pass == $row['password_administrateur']) {
      $_SESSION['admin_logged_in'] = $eid;
      $_SESSION['admin_name_logged_in'] = $row['prenom_administrateur'] . ' ' . $row['nom_administrateur'];
      header('location:tableau de bord.php');
    } else {
      $error = "<h3 style='color:red'>Mot de passe incorrect</h3>";
    }
  } else {
    $error = "<h3 style='color:red'>Compte introuvable</h3>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Connexion administrateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="../css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Akronim|Libre+Baskerville" rel="stylesheet">
</head>

<body id="primary" style="margin-top:50px; background:#c8c8c8;">
  <?php
  include('barre de menu.php');
  ?>
  <div class="container-fluid">
    <div class="container">
      <div class="row"><br>
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center" style="box-shadow:2px 2px 2px;background-color:#ececec;">

          <h1 align="center"><b>
              <font style="font-family: 'Libre Baskerville', serif;text-shadow:5px 5px #000;">Connexion administrateur</font>
            </b></h1>

          <img src="image/user.png" alt="Bird" width="200" height="170" style="padding-top:30px;">

          <?php echo @$error; ?>
          <form action="" method="post"><br>
            <div class="form-group">
              <input type="Email" class="form-control" name="eid" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="Password" class="form-control" name="pass" placeholder="Mot de passe" required>
            </div>
            <input type="submit" value="Login" name="login" class="btn btn-primary btn-group btn-group-justified" required>
          </form><br>
        </div>
      </div><br>
    </div>
  </div>
  <?php
  include('bas de page.php');
  ?>
</body>

</html>