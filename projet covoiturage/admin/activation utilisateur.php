<?php 
session_start();
extract($_REQUEST);
include('../connection.php');
$admin_email=$_SESSION['admin_logged_in'];
$admin_name=$_SESSION['admin_name_logged_in'];
if($admin_email=="")
{
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <title>Espace Administrateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="tableau de bord.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
  </style>
  </head>
  <body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bienvenue <?php echo $admin_name; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="tableau de bord.php?option=user_registration">Liste des utilisateurs</a></li>
            <li><a href="se deconnecter.php">Se déconnecter</a></li>
          </ul>
        </div>
      </div>
    </nav>
	<br><br>
<?php 
$id=$_GET['id_utilisateur'];

$sql=mysqli_query($con,"select * from utilisateur where id_utilisateur='$id'");
$res=mysqli_fetch_assoc($sql);
	if($res["activation_compte"]=='0'){
		if(mysqli_query($con,"update utilisateur set activation_compte='1' where id_utilisateur='$id'"))
		{
			echo "<div class='alert alert-succes center' style='background-color: yellow; opacity: 0.8;'><p>Compte est activé avec sucée</p></div><br><br>"; 
		}else{
			echo "<div class='alert alert-danger center' style='background-color: orange; opacity: 0.9;'><p>Erreur de d'activation du compte</p></div><br><br>"; 
		}
	}else if($res["activation_compte"]=='1'){
		if(mysqli_query($con,"update utilisateur set activation_compte='0'where id_utilisateur='$id'"))
		{
			echo "<div class='alert alert-succes center' style='background-color: yellow; opacity: 0.8;'><p>Compte est désactivé avec sucée</p></div><br><br>"; 
		}else{
			echo "<div class='alert alert-danger center' style='background-color: orange; opacity: 0.9;'><p>Erreur de désactivation du compte</p></div><br><br>"; 
		}
	}
?>