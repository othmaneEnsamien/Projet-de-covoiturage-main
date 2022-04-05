<script>
	function deltrajet(id)
	{
		if(confirm("Vous souhaitez vraiment supprimer ce trajet?"))
		{
		window.location.href='supprimer trajet.php?id_trajet='+id;	
		}
	}
		function edittrajet(id)
	{
		if(confirm("Vous souhaitez vraiment modifier ce trajet?"))
		{
		window.location.href='modifier trajet.php?id_trajet='+id;	
		}
	}
		function infosReservation(id_utilisateur)
	{
		if(confirm("Vous souhaitez vraiment voir plus d'information?"))
		{
		window.location.href='infosChauffeur.php?id_utilisateur='+id_utilisateur;	
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

    <title>Mes trajets</title>

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
	</br></br></br>
	<h1 style="color:green">Mes trajets actuels</h1>
<table class="table table-striped table-hover">
	<tr>
		<th>Numéro trajet</th>
		<th>Departure</th>
		<th>Destination</th>
		<th>Prix</th>
		<th>Places disponibles</th>
		<th>Date</th>
		<th>Plus d'infos </th>
		<th>Modifier Trajet </th>
		<th>Supprimer Trajet </th>
		<th>Réservation </th>
	</tr>
<?php 
$sql=mysqli_query($con,"select * from carcteristiquestrajet where id_utilisateur='".$user_id."'");

while($res=mysqli_fetch_assoc($sql))
{
	$datetime = date("Y-m-d");
	$id=$res['id_trajet'];
$QQQ=mysqli_query($con,"select id_utilisateur from trajetsreserver where id_trajet='".$id."'");
if($res["date"]>$datetime){
?>
<tr>
		<td><?php echo $res["id_trajet"]; ?></td>
		<td><?php echo $res["departure"]; ?></td>
		<td><?php echo $res["destination"]; ?></td> 
		<td><?php echo $res["prix"].' '.'DH'; ?></td> 
		<td><?php echo $res["places_disponibles"].' '.'place(s)'; ?></td> 
		<td><?php echo $res["date"];?> à <?php echo $res["temps"];?></td> 
		<td><?php echo $res["prix"].' '.'DH'; ?></td> 
		<td><a href="#"onclick="edittrajet('<?php echo $id; ?>')"><span class="glyphicon glyphicon-edit"style='color:blue'></span></a></td>
		<td><a href="#"onclick="deltrajet('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
		<td>
	<?php while($AAA=mysqli_fetch_assoc($QQQ)){ ?>
		
		 <?php
		 $BBB=mysqli_query($con,"select * from utilisateur where id_utilisateur='".$AAA["id_utilisateur"]."'");
		
			while($CCC=mysqli_fetch_assoc($BBB)){
				$Informations=  $CCC["nom_utilisateur"].' '.$CCC["prenom_utilisateur"];
		?>
		<a href="#"onclick="infosReservation('<?php echo $AAA["id_utilisateur"]; ?>')"><span class="glyphicon glyphicon-zoom-in"style='color:green'></span><?php echo $Informations; ?></a>
<?php		
		}
						 ?>
		 <br>
		 <?php
	}
			?>

		 </td> 

</tr>	
<?php 	
}
}
?>	
</table>
<h1 style="color:blue">Mes anciens trajets</h1><span style="color:red"> (Peuvent etre supprimer par les administrateurs)</span>
<table class="table table-striped table-hover">
	<tr>
		<th>Numéro trajet</th>
		<th>Departure</th>
		<th>Destination</th>
		<th>Prix</th>
		<th>Places disponibles</th>
		<th>Date</th>
		<th>Plus d'infos </th>
		<th>Supprimer Trajet </th>
	</tr>
<?php
$sql=mysqli_query($con,"select * from carcteristiquestrajet where id_utilisateur='".$user_id."'");

while($res=mysqli_fetch_assoc($sql))
{
	$datetime = date("Y-m-d");
	$id=$res['id_trajet'];
$QQQ=mysqli_query($con,"select id_utilisateur from trajetsreserver where id_trajet='".$id."'");
if($res["date"]<=$datetime){
?>
<tr>
		<td><?php echo $res["id_trajet"]; ?></td>
		<td><?php echo $res["departure"]; ?></td>
		<td><?php echo $res["destination"]; ?></td> 
		<td><?php echo $res["prix"].' '.'DH'; ?></td> 
<?php
if($rest["places_disponibles"]>1){
?>	
		<td><?php echo $res["places_disponibles"].' '.'places'; ?></td> 
<?php
}else if($rest["places_disponibles"]==1){
?>
	<td><?php echo $rest["places_disponibles"].' '.'place'; ?></td>
<?php
}
?>
		<td><?php echo $res["date"];?> à <?php echo $res["temps"];?></td> 
		<td><?php echo $res["prix"].' '.'DH'; ?></td> 
		<td><a href="#"onclick="deltrajet('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
</tr>	
<?php 	
}
}
?>	


</table>
</html>