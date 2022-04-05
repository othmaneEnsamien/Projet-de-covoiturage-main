<?php session_start();
error_reporting(1);
?>
<!--Menu Bar Close Here-->


<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="../image/ylh.png" width="70px" height="40px" style="margin-top:5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../index.php" title="Home">Accueil</a></li>
        <li><a href="../a propos.php" title="About">à propos </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../identifier.php" title="login"><span class="glyphicon glyphicon-log-in"></span>Connexion Utilisateur</a>
        </li>
        <li><a href="index.php" title="Admin Login"><span class="glyphicon glyphicon-user"></span>Connexion Administrateur</a></li>

        <?php
        if ($_SESSION['create_account_logged_in'] != "") {
        ?>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Afficher le statut <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="profil administrateur.php">Profil</a></li>
              <li><a href="se déconnecter.php">Se déconnecter</a></li>
            </ul>
          </li>
        <?PHP } ?>
      </ul>
    </div>
  </div>
</nav>