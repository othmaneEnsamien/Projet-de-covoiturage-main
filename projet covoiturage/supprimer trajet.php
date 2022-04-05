<?php 
session_start();
extract($_REQUEST);
include('connection.php');
$user_email=$_SESSION['create_account_logged_in'];
$user_name=$_SESSION['user_name_logged_in'];
$user_id=$_SESSION['userIdLoggedIn'];
if($user_email=="")
{
	header('location:identifier.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <title>Espace Utilisateur</title>
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
          <a class="navbar-brand" href="#">Bienvenue <?php echo $user_name; ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="espace utilisateur.php">Espace utilisateur</a></li>
            <li><a href="se deconnecter.php">Se déconnecter</a></li>
          </ul>
        </div>
      </div>
    </nav>
	<br><br><br><br>
<?php 
include('connection.php');

$id=$_GET['id_trajet'];

$sql=mysqli_query($con,"select * from carcteristiquestrajet where id_trajet='$id'");
$res=mysqli_fetch_assoc($sql);
$A=$res["id_utilisateur"];
$B=$res["departure"];
$C=$res["destination"];
$D=$res["prix"];
$E=$res["date"];
$F=$res["temps"];
$G=$res["places_disponibles"];
$H=$res["commentaires"];
 
if(mysqli_query($con,"delete from carcteristiquestrajet where id_trajet='".$id."'")===TRUE && mysqli_query($con,"INSERT INTO trajet_deleted (id_utilisateur, departure, destination,prix,date,temps,places_disponibles,commentaires, deleted_by)
 VALUES ('$A','$B','$C','$D','$E','$F','$G','$H','$user_email')")=== TRUE)
{
		echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>Le trajet est supprimé avec succée</p></div><br><br>"; 
		
}else {
		echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Cette action est impossible car ce trajet est déjà réservé</p></div><br><br>"; 

}
?>