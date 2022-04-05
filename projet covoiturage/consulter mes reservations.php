<script>
	function delreservation(id)
	{
		if(confirm("Vous souhaitez vraiment supprimer cette reservation?"))
		{
		window.location.href='annuler reservation.php?id_trajet='+id;	
		}
	}
		function infosDriver(id_chauffeur)
	{
		if(confirm("Vous souhaitez vraiment voir plus d'information?"))
		{
		window.location.href='infosChauffeur.php?id_utilisateur='+id_chauffeur;	
		}
	}
</script>
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
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mes résérvations</title>

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
	 <link href = "http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet">
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
            <li><a href="espace utilisateur.php">Espace utilisateur</a></li>
            <li><a href="se deconnecter.php">Se déconnecter</a></li>
          </ul>
        </div>
      </div>
    </nav>
<table class="table table-striped table-hover">

</br></br></br></br>

	<tr>
		<th>Numéro trajet</th>
		<th>Departure</th>
		<th>Destination</th>
		<th>Prix</th>
		<th>Places disponibles</th>
		<th>Date</th>
		<th>Plus d'infos </th>
		<th>Annuler la résérvation </th>
		<th>Informations chauffeur</th>
	</tr>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from trajetsreserver where id_utilisateur='$user_id'");
while($res=mysqli_fetch_assoc($sql))
{
	$ide=$res['id_trajet'];	
$sql1=mysqli_query($con,"select * from carcteristiquestrajet where id_trajet='$ide'");
while($rest=mysqli_fetch_assoc($sql1)){
	$id=$rest['id_trajet'];
	$id_chauffeur=$rest['id_utilisateur'];
	$sql2=mysqli_query($con,"select * from utilisateur where id_utilisateur='$id_chauffeur'");
	$rest2=mysqli_fetch_assoc($sql2);
	$chauffeur=$rest2["nom_utilisateur"].' '.$rest2["prenom_utilisateur"];
	
?>
<tr>
		<td><?php echo $rest["id_trajet"]; ?></td>
		<td><?php echo $rest["departure"]; ?></td>
		<td><?php echo $rest["destination"]; ?></td> 
		<td><?php echo $rest["prix"].' '.'DH'; ?></td> 
<?php
if($rest["places_disponibles"]>1){
?>		
		<td><?php echo $rest["places_disponibles"].' '.'places'; ?></td>
<?php
}else if($rest["places_disponibles"]==1 || $rest["places_disponibles"]==0){
?>
	<td><?php echo $rest["places_disponibles"].' '.'place'; ?></td>
<?php
}
?>
		<td><?php echo $rest["date"];?> à <?php echo $rest["temps"];?></td> 
		<td><?php echo $rest["commentaires"]; ?></td> 
		<td><a href="#"onclick="delreservation('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
		<td><a href="#"onclick="infosDriver('<?php echo $id_chauffeur; ?>')"><span class="glyphicon glyphicon-zoom-in"style='color:green'></span><?php echo $chauffeur; ?></a></td>
		
	</tr>	
<?php 	
}
}
?>	
</html>