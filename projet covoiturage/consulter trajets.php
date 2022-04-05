<script>
	function AddTrajet(id)
	{
		if(confirm("Vous souhaitez vraiment résérver ce trajet?"))
		{
		window.location.href='reserver trajet.php?id_trajet='+id;
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

    <title>Consulter trajets</title>

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
            <li><a href="espace utilisateur.php">Retour</a></li>
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
		<th>Reservation </th>
	</tr>
<?php 
	$datetime = date("Y-m-d");
	$temps = date("H:i:s");
$i=1;
$sql=mysqli_query($con,"select * from carcteristiquestrajet where places_disponibles > 0 order by date DESC ");
while($res=mysqli_fetch_assoc($sql))
{
	if($res["date"]>=$datetime){
		
		if($res["id_utilisateur"]!=$user_id)
		{
			$id=$res['id_trajet'];	
			$us=$res["id_utilisateur"];
			$sql2=mysqli_query($con,"SELECT * FROM trajetsreserver WHERE id_utilisateur = '".$user_id."' and id_trajet = '".$id."'");
			$rest=mysqli_fetch_assoc($sql2);
?>
				<tr>
					<td><?php echo $res["id_trajet"]; ?></td>
					<td><?php echo $res["departure"]; ?></td>
					<td><?php echo $res["destination"]; ?></td>
					<td><?php echo $res["prix"].' '.'DH'; ?></td>
					<td><?php echo $res["places_disponibles"].' '.'place(s)'; ?></td>
					<td><?php echo $res["date"];?> à <?php echo $res["temps"];?></td>
					<td><?php echo $res["prix"].' '.'DH'; ?></td>
<?php			
if($rest===NULL){	?>
<?php //if($rest['id_trajet']!=$id)?>
					<td><a href="#"onclick="AddTrajet('<?php echo $id; ?>')"><span class="glyphicon glyphicon-ok"style='color:green'>&nbsp;Réserver ce trajet</span></a></td>
				</tr>	
<?php
			}else{
?>
					<td><span class="glyphicon glyphicon-ok"style='color:red'>&nbsp;Déjà réservé</span></td>
				</tr>	
<?php
			}
		}
	}
}
?>	
</table>
</html>