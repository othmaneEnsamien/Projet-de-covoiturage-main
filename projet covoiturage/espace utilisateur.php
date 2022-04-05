<?php
session_start();
extract($_REQUEST);
include('connection.php');
$user_email = $_SESSION['create_account_logged_in'];
$user_name = $_SESSION['user_name_logged_in'];
$user_id = $_SESSION['userIdLoggedIn'];
if ($user_email == "") {
  header('location:identifier.php');
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.png" />

  <title>Accueil</title>

  <!-- Bootstrap core CSS -->
  <link href="nouveau/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap theme -->
  <link href="nouveau/bootstrap-theme.min.css" rel="stylesheet">
  <link rel="stylesheet" href="nouveau/style.css" rel="stylesheet">
  <link rel="stylesheet" href="nouveau/Normalize.css" rel="stylesheet">
  <link rel="stylesheet" href="nouveau/font-awesome/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>


</head>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Bienvenue <?php echo $user_name; ?></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profil.php">Profil</a></li>
        <li><a href="se deconnecter.php">Se déconnecter</a></li>
      </ul>
    </div>
  </div>
</nav>


<body style="background-image: url(images/route1.jpeg);background-repeat: no-repeat;background-size: cover;">

  <div class="container main" style="margin-top: 100px;">
    <div class="row">

      <div class="col-md-12" id="status">
        <div class="info-box" style="background-color: black;">
          <i class="fab fa-contao"></i>
          <div class="count"><?php echo $user_name ?></div>
          <div class="title">Liste des fonctionnalités </div>
          <style>
            .count {
              text-align: center;
              color: white;
              text-transform: uppercase;
              text-shadow: 3px 3px black;

            }

            .title {
              color: red;
              font-family: "Times New Roman", Times, serif;
            }
          </style>

        </div>
      </div>

      <div class="clear"></div><br>


      <div class="col-md-4">
        <a href="ajouter trajet.php">
          <div class="link">
            <i style="color: black;" class="fa fa-plus" style="color: black;"></i>
            <div class="clear"></div><span>Ajoutez un Trajet</span>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="consulter trajets.php">
          <div class="link">
            <i style="color: black;" class="fas fa-eye"></i>
            <div class="clear"></div><span>Consulter les Trajets</span>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="consulter mes reservations.php">
          <div class="link">
            <i style="color: black;" class="fas fa-registered"></i>
            <div class="clear"></div><span>Consulter mes résérvations</span>
          </div>
        </a>
      </div>
      <div class="col-md-4">
        <a href="consulter mes trajets.php">
          <div class="link">
            <i style="color: black;" class="fa fa-road"></i>
            <div class="clear"></div><span>Consulter mes trajets</span>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="signaler un probleme.php">
          <div class="link">
            <i style="color: black;" class="fas fa-angry"></i>
            <div class="clear"></div><span>Signaler un probléme</span>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="profil.php">
          <div class="link">
            <i style="color: black;" class="fa fa-cog"></i>
            <div class="clear"></div><span>Modifier profil</span>
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/docs.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>