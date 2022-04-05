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
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />

    <title>Ajouter trajet</title>
   <!-- Bootstrap core CSS -->
    <link href="nouveau/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="nouveau/bootstrap-theme.min.css" rel="stylesheet">
     <link rel="stylesheet" href="nouveau/style.css" rel="stylesheet">
     <link rel="stylesheet" href="nouveau/Normalize.css" rel="stylesheet">
     <link rel="stylesheet" href="nouveau/font-awesome/css/font-awesome.min.css">
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
            <li><a href="espace utilisateur.php">Retour </a></li>
            <li><a href="se deconnecter.php">Se déconnecter</a></li>
          </ul>
        </div>
      </div>
    </nav>

  
  
<body>
<div class="container mainbg"/>
    <h1 class="h1_title" align="center">Ajouter trajet</h1>
    <hr> <br>
<?php
if (isset($_POST['submit'])) {
	$datetime = date("Y-m-d");
  $departure=htmlspecialchars($_POST['departure']);
  $destination=htmlspecialchars($_POST['destination']);
  $prix_passager=htmlspecialchars($_POST['prix_passager']);
  $nombre_places=htmlspecialchars($_POST['nombre_places']);
  $date_departure=htmlspecialchars($_POST['date_departure']);
  $heure_departure=htmlspecialchars($_POST['heure_departure']);
  $plus_infos=htmlspecialchars($_POST['plus_infos']);
	if($date_departure > $datetime && $nombre_places>0 && $prix_passager>=0){
		if ($con->query("INSERT INTO carcteristiquestrajet (id_utilisateur, departure, destination, prix,places_disponibles,date,temps,commentaires) VALUES ('$user_id' 
		,'$departure' ,'$destination', '$prix_passager', '$nombre_places', '$date_departure', '$heure_departure', '$plus_infos')") === TRUE ) {
			echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>Ajout avec sucees</p></div><br><br>"; 
		}else{
			echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Erreur de connexion</p></div><br><br>"; 
		}
	}else if($date_departure <= $datetime || $nombre_places <= 0 || $prix_passager<0){
			//date departure
			if($date_departure <= $datetime && $nombre_places > 0 && $prix_passager>=0){
				echo "<div class='alert alert-warning center' style='width: 90%; margin: auto;'><p>Erreur date departure (Doit etre au moins demain)</p></div><br><br>"; 
			//nombre de places
			}else if($date_departure > $datetime && $nombre_places <= 0 && $prix_passager>=0){
				echo "<div class='alert alert-warning center' style='width: 90%; margin: auto;'><p>Erreur nombre de places (Doit etre superiseure a 0)</p></div><br><br>"; 
			//Prix passager
			}else if($date_departure > $datetime && $nombre_places > 0 && $prix_passager<0){
				echo "<div class='alert alert-warning center' style='width: 90%; margin: auto;'><p>Erreur prix passager (Doit etre superiseure ou egal a 0)</p></div><br><br>"; 
			//date departure et nombre de places
			}else if($date_departure <= $datetime && $nombre_places <= 0 && $prix_passager>=0){
				echo "<div class='alert alert-warning center' style='width: 90%; margin: auto;'><p>Erreur nombre de places (Doit etre superiseure a 0) et date departure (Doit etre au moins demain)</p></div><br><br>"; 
			//date departure et prix passager
			}else if($date_departure <= $datetime && $nombre_places > 0 && $prix_passager <0){
				echo "<div class='alert alert-warning center' style='width: 90%; margin: auto;'><p>Erreur prix passager (Doit etre superiseure ou egal a 0) et date departure (Doit etre au moins demain)</p></div><br><br>"; 
			//nombre de places et prix passager
			}else if($date_departure > $datetime && $nombre_places <= 0 && $prix_passager <0){
				echo "<div class='alert alert-warning center' style='width: 90%; margin: auto;'><p>Erreur nombre de places (Doit etre superieure a 0) et Erreur prix passager (Doit etre superiseure ou egale a 0)</p></div><br><br>"; 
			//nombre de places et prix passager et nombre de places
			}else if($date_departure <= $datetime && $nombre_places <= 0 && $prix_passager <0){
				echo "<div class='alert alert-danger center' style='width: 90%; margin: auto;'><p>Erreur nombre de places (Doit etre superiseure a 0) et date departure (Doit etre au moins demain) et Erreur prix passager (Doit etre superiseure ou egale a 0)</p></div><br><br>"; 
			}
	}  
}
?>
    <div class="clear"></div>
    <div class="row col-md-10 col-md-offset-1">

      <form id="formID" action="" method="post">
          
              <label class="">Départ: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                 <span class="input-group-addon">
				 <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
</span>
				  <input name="departure" type="text" placeholder="Entrez le point de départ" class="form-control validate[required]" required />
              </div><br>
     <label class="">Destination: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
					<span class="input-group-addon">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-signpost-split-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M7 16h2V6h5a1 1 0 0 0 .8-.4l.975-1.3a.5.5 0 0 0 0-.6L14.8 2.4A1 1 0 0 0 14 2H9v-.586a1 1 0 0 0-2 0V7H2a1 1 0 0 0-.8.4L.225 8.7a.5.5 0 0 0 0 .6l.975 1.3a1 1 0 0 0 .8.4h5v5z"/>
						</svg>
					</span>
						<input name="destination" type="text" placeholder="Entrez le point d'arrivée" class="form-control validate[required]" required />
              </div><br>
    <label class="">Prix par passager: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>
                  <input name="prix_passager" type="text" placeholder="Entrez le prix par passager" class="form-control validate[required]" required />
              </div><br>
       <label class="">Nombre de place: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="nombre_places" type="number_format" placeholder="Entrez le nombre des places disponibles" class="form-control validate[required]" required />
              </div><br>
              <label class="">Date de départ: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
			       <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input name="date_departure" type="date" placeholder="Entrez la date de départ" class="form-control validate[required]" required />
              </div><br>
              <label class="">Heure de départ: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                  <input name="heure_departure" type="time" placeholder="Entrez l'heure de départ" class="form-control validate[required]" required />
              </div><br>
           <label class="">Plus d'infos: <span style="color:red; font-weight: bold; font-family: Arial, sans-serif ;">(*)</span></label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-plus-sign"></i></span>
                  <textarea  class="form-control" name="plus_infos">
                  </textarea>
              </div><br>
              <br> 
          <button type="submit" name="submit" class="mybtn mybtn-success">Ajouter</button>     
          <hr id='success'>
      </form>
  </div>
<div class="clear"></div>  
        </tr>        
      </table>
      <br>
</div>  
  </body>
</html>