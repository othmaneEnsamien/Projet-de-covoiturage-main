<?php
session_start();
error_reporting(1);
include('connection.php');
$eid = $_SESSION['create_account_logged_in'];
extract($_REQUEST);
if (isset($update)) {
  $sql = $con->query("select * from utilisateur where email_utilisateur='$eid'");
  if ($row = mysqli_fetch_array($sql)) {
    if ($lname == $row['nom_utilisateur'] && $fname == $row['prenom_utilisateur'] && $pass == $row['passsword_utilisateur'] && $mob == $row['telephone_utilisateur']) {
      $msg = "<h3 style='color:red'>Aucun changement n'a été apporté</h3>";
    } else {
      $sql = $con->query("UPDATE utilisateur
SET nom_utilisateur = '$lname', prenom_utilisateur = '$fname', passsword_utilisateur = '$pass', telephone_utilisateur = '$mob'
WHERE email_utilisateur = '$eid';");
      $msg = "<h3 style='color:green'>Mise à jour effectuée</h3>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Profil utilisateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>

<body style="margin-top:50px;">
  <?php
  include('barre de menu.php');
  ?>
  <?php
  $sql = mysqli_query($con, "select * from utilisateur where email_utilisateur='$eid' ");
  $result = mysqli_fetch_assoc($sql);
  ?>
  <div class="container-fluid" id="primary" style="background-color:#848484;">
    <!--Primary Id-->
    <center>
      <h1 style="margin: 40px; color:black">Profil utilisateur</h1>
    </center><br>
    <div class="container">
      <div class="row">
        <center><?php echo $msg; ?></center>
        <form class="form-horizontal" method="post">
          <div class="col-sm-6">

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Email :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="eid" value="<?php echo $result['email_utilisateur']; ?>" class="form-control" /readonly="readonly">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4> Nom :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="lname" value="<?php echo $result['nom_utilisateur']; ?>" class="form-control" required />
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4> Prénom :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="fname" value="<?php echo $result['prenom_utilisateur']; ?>" class="form-control" required />
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Mot de passe :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="pass" value="<?php echo $result['password_utilisateur']; ?>" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Téléphone :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="mob" value="<?php echo $result['telephone_utilisateur']; ?>" class="form-control" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Genre :</h4>
                </div>
                <div class="col-sm-8">
                  <strong><?php echo $result['genre_utilisateur']; ?></strong>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"></div>
                <div class="col-sm-7	">
                  <input type="submit" value="Modifier Profil" name="update" class="btn btn-primary" />
                </div>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  include('bas de page.php')
  ?>
</body>

</html>