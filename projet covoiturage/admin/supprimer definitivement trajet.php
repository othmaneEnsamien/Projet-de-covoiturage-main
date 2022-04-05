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
            <li><a href="tableau de bord.php?option=trajets_deleted">Liste des trajets supprimer</a></li>
            <li><a href="se déconnecter.php">Se déconnecter</a></li>
          </ul>
        </div>
      </div>
    </nav>
	<br><br>
<?php 
$con=mysqli_connect("localhost","root","","covoiturage") or die('La connexion à la base de données a échoué');

$id=$_GET['id_trajet_deleted'];

$sql=mysqli_query($con,"select * from trajet_deleted where id_trajet_deleted='".$id."'");
$res=mysqli_fetch_assoc($sql);
if(mysqli_query($con,"delete from trajet_deleted where id_trajet_deleted='".$id."'"))
{
//header('location:tableau de bord.php?option=trajets_details');	
		echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>Le trajet est supprimé avec succée</p></div><br><br>"; 
}else {
	//header('location:tableau de bord.php?option=trajets_details');	
		echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Il y a des problemes pour supprimer ce trajet</p></div><br><br>"; 

}
?>