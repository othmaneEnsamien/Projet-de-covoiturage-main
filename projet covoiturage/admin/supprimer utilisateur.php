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
		
			if(mysqli_query($con,"delete from utilisateur where id_utilisateur='$id'"))	{
				echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>Utilisateur supprimé avec succés</p></div><br><br>"; 
			}else{
				echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Vous ne pouvez pas supprimer un utilisateur sans supprimer tout ces trajets et ces reservations !!!!</p></div><br><br>"; 
			}
?>