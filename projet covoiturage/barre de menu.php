<?php
session_start();
$eid = $_SESSION['create_account_logged_in'];
error_reporting(1);
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container" style="padding: 6px;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="image/ylh.png" width="70px" height="40px" style="margin-top:5px;" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php" title="Home">Accueil</a></li>
        <li><a href="a propos.php" title="About">à propos </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if ($_SESSION['create_account_logged_in'] == "") { ?>
          <li><a href="admin/index.php" title="Admin Login"><span class="glyphicon glyphicon-user"></span>Connexion administrateur</a></li>
        <?php
        }
        if ($_SESSION['create_account_logged_in'] != "") { ?>
          <li><a href="espace utilisateur.php" title="Admin Login"><span class="glyphicon glyphicon-user"></span>espace utilisateur</a></li>
        <?php
        }
        ?>
        <?php
        if ($_SESSION['create_account_logged_in'] != "") {
        ?>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Afficher détails<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="profil.php">Profil</a></li>
              <li><a href="se deconnecter.php">Se déconnecter</a></li>
            </ul>
          </li>
        <?php } else {
        ?>
          <li><a href="identifier.php" title="login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Connexion Utilisateur</a>
          </li>
        <?php
        } ?>
      </ul>
    </div>
  </div>
</nav>