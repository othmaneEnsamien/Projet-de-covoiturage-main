<?php
session_start();
error_reporting(1);
require('connection.php');
extract($_REQUEST);
if (isset($login)) {
  $sql = $con->query("select * from utilisateur where email_utilisateur='$eid'");
  if ($row = mysqli_fetch_array($sql)) {
    if ($pass == $row['passsword_utilisateur']) {
      if ($row['activation_compte'] == '1') {
        $_SESSION['create_account_logged_in'] = $eid;
        $_SESSION['user_name_logged_in'] = strtoupper($row['nom_utilisateur'] . ' ' . $row['prenom_utilisateur']);
        $_SESSION['userIdLoggedIn'] = $row['id_utilisateur'];
        $_SESSION['user_name'] = strtoupper($row['nom_utilisateur'] . ' ' . $row['prenom_utilisateur']);
        header('location:espace utilisateur.php');
      } else {
        $error = "<h2 style='color:red'>Ce compte n'est pas activer</h2>";
      }
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
  <title>Connexion utilisateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Akronim|Libre+Baskerville" rel="stylesheet">
</head>

<body style="margin-top:50px;">
  <?php
  include('barre de menu.php')
  ?>
  <div class="container-fluid">
    <div class="container">
      <div class="row"><br>
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center" style="box-shadow:2px 2px 2px;background-color:#cfcfcf;"><br>

          <h1 align="center"><b>
              <font style="font-family: 'Libre Baskerville', serif;text-shadow:3px 3px #000;">Connexion</font>
            </b></h1>
          <img src="image/login-utilisateur.png" class="img-circle" alt="Bird" width="130" height="120">
          <?php echo @$error; ?>
          <form method="post"><br>
            <div class="form-group">
              <input type="Email" class="form-control" name="eid" placeholder="Entrer votre email" autocomplete="off" required>
            </div>
            <div class="form-group">
              <input type="Password" class="form-control" name="pass" placeholder="Entrer votre mot de passe" autocomplete="off" required>
            </div>
            <input type="submit" value="Login" name="login" class="btn btn-primary btn-group btn-group-justified" required>
            <div class="form-group forget">
              <a href="compte oublie.php">Compte oublié</a>&nbsp; <b>|</b>&nbsp;
              <a href="formulaire d_inscription.php">Créer un compte</a>
            </div>
          </form><br>
        </div>
      </div><br>
    </div>
  </div>
  <?php
  include('bas de page.php')
  ?>
</body>

</html>