<?php 
$i=1;
$con=mysqli_connect("localhost","root","","covoiturage") or die('La connexion à la base de données a échoué');
$sql=$con -> query("select * from administrateur where email_administrateur='".$_SESSION['admin_logged_in']."'");
//$sql=mysqli_query($con,"select password_administrateur from administrateur where email_administrateur=".$_SESSION['admin_logged_in']."");
//$a="select password_administrateur from administrateur where email_administrateur=".$_SESSION['admin_logged_in']."";
$row=mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil administrateur</title>
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body>
<h1 style="background-color:#ed2553;border-radius:50px;text-align:center;font-family: 'Baloo Bhai', cursive;box-shadow:5px 5px 9px black;text-shadow:2px 2px #fff;">Profil administrateur</h1><br>
<?php if($_SESSION['admin_logged_in']=="anasssaghir@gmail.com"){?>
<center><img src="image/SAGHIRAnass.png"style="width:180px;height:180px;background-color:blue;"class="img-circle"></center>
<?php }else if($_SESSION['admin_logged_in']=="oussamatrachli@gmail.com"){?>
<center><img src="image/TRACHLIOussama.jpg"style="width:180px;height:180px;background-color:blue;"class="img-circle"></center>
<?php } ?>
<div class="container"style="width:100%;">
  <form action="/page action.php">
    <div class="form-group">
      <label for="email">Nom :</label>
       <input type="text" id="username" value="<?php echo $_SESSION['admin_logged_in']; ?>" class="form-control" name="name" readonly="readonly"/>
    </div>
    <div class="form-group">
      <label for="pwd">Mot de passe :</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd"value="<?php echo $row['password_administrateur']; ?>" readonly="readonly"/>
    </div>
  </form>
</div>
</body>
</html>