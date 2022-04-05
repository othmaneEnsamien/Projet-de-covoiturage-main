<?php
include('connection.php');
extract($_REQUEST);
if(isset($save))
{
		$img=$_FILES['img']['name'];
 //$file = addslashes(file_get_contents($_FILES["image"]["name"]));
 if($row=mysqli_fetch_array($con -> query("select * from utilisateur where email_utilisateur='$email'")))
 {
 $msg= "<h3 style='color:red'>E-mail déjà existant</h3>";
 }
 else if($row=mysqli_fetch_array($con -> query("select * from utilisateur where telephone_utilisateur='$mobi'")))
 {
 $msg= "<h3 style='color:red'>Numéro de téléphone déjà existant</h3>";
 }
 else
 {
 if ($con->query("INSERT INTO utilisateur (email_utilisateur, nom_utilisateur, prenom_utilisateur, telephone_utilisateur, genre_utilisateur, passsword_utilisateur, photo_utilisateur,activation_compte)
 VALUES ('$email' ,'$lname', '$fname', '$mobi', '$gend', '$Passw', '$img','0')") === TRUE) {
	 	move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);	
	header('location:identifier.php');
} 
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Formulaire d'inscription</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body style="margin-top:50px;">
  <?php 
include('barre de menu 2.php');
  ?>
<div class="container-fluid"style="background-color:#4286f4;color:#000;">
  <div class="container">
    <div class="row">
      <center><h1 style="background-color:#ed2553; border-radius:50px;display:inline-block;"><b><font color="#080808">Créer un nouveau compte</font></b></h1></center>
       <center><?php echo @$msg;?></center><br>
      <div class="col-sm-2"></div>
      <div class="col-sm-6 ">
        <form class="form-horizontal"method="post" enctype="multipart/form-data">
          <div class="form-group">

            <div class="control-label col-sm-5"><h4>Nom :</h4></div>
          <div class="col-sm-7">
              <input type="text" name="lname" class="form-control"placeholder="Entrer votre nom"required>
          </div>
        </div>
		
        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Prenom :</h4></div>
          <div class="col-sm-7">
              <input type="text" name="fname" class="form-control"placeholder="Entrer votre prenom" autocomplete="off"required>
          </div>
        </div>
		
        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Email :</h4></div>
          <div class="col-sm-7">
              <input type="text" name="email" class="form-control"placeholder="Entrer votre Email" autocomplete="off"required>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Mot de passe :</h4></div>
          <div class="col-sm-7">
              <input type="password" name="Passw" class="form-control"placeholder="Entrer votre mot de passe"autocomplete="off"required>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4>Numéro de téléphone:</h4></div>
          <div class="col-sm-7">
              <input type="text" name="mobi" class="form-control"placeholder="Entrer votre numéro de téléphone"required>
          </div>
        </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4 id="top">genre :</h4></div>
          <div class="col-sm-7">
              <input type="radio" name="gend" value="Homme"required><b>Homme</b>&emsp;
              <input type="radio" name="gend" value="Femme"required><b>Femme</b>&emsp;
          </div>
          </div>

        <div class="form-group">
            <div class="control-label col-sm-5"><h4 id="top">Photo de profil :</h4></div>
          <div class="col-sm-7">
              <input type="file" name="img" id="image">
          </div>
          <div class="row">
            <div class="col-sm-6"style="text-align:right;"><br>
            <input type="submit" value="Submit" name="save"class="btn btn-success btn-group-justified" style="color:#000;font-family: 'Baloo Bhai', cursive;height:40px;"/>
          </div>
          </div>
          </div>
        </form>
        </div>
      </div>
        <div class="col-sm-4">
        </div>
    </div>
  </div>
</div>
<?php
    include('bas de page.php')
?>
</body>
</html>
