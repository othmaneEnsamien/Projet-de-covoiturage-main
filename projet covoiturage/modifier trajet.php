<?php
session_start();
error_reporting(1);
extract($_REQUEST);
include('connection.php');
$user_email = $_SESSION['create_account_logged_in'];
$id = $_GET['id_trajet'];
$user_name = $_SESSION['user_name_logged_in'];
$user_id = $_SESSION['userIdLoggedIn'];
if ($user_email == "") {
  header('location:identifier.php');
}
?>

<?php
if (isset($update)) {
  $sql = $con->query("select * from carcteristiquestrajet where id_trajet='$id'");
  if ($row = mysqli_fetch_array($sql)) {
    if (
      $departure == $row['departure'] && $destination == $row['destination'] && $prix == $row['prix'] && $places_disponibles == $row['places_disponibles'] && $date == $row['date']
      && $temps == $row['temps'] && $commentaires == $row['commentaires']
    ) {
      $msg = "<h3 style='color:red'>Aucun changement n'a été apporté</h3>";
    } else {
      $sql = $con->query("UPDATE carcteristiquestrajet SET departure = '$departure', destination = '$destination', prix = '$prix', places_disponibles = '$places_disponibles',
 date = '$date', temps = '$temps', commentaires = '$commentaires' WHERE id_trajet='$id';");
      $msg = "<h3 style='color:green'>Mise à jour effectuée</h3>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Modifier trajet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>

<body style="margin-top:50px;">
  <?php
  include('barre de menu.php');
  ?>
  <?php
  $sql = mysqli_query($con, "select * from carcteristiquestrajet where id_trajet='$id' ");
  $result = mysqli_fetch_assoc($sql);
  ?>
  <div class="container-fluid" id="primary" style="background-color:#848484;">
    <center>
      <h1 style="margin: 40px; color:black">Modifier trajet</h1>
    </center><br>
    <div class="container">
      <div class="row">
        <center><?php echo $msg; ?></center>
        <form class="form-horizontal" method="post">
          <div class="col-sm-6">

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Departure :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="departure" value="<?php echo $result['departure']; ?>" class="form-control" required/">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4> Destination :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="destination" value="<?php echo $result['destination']; ?>" class="form-control" required />
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4> Prix :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="prix" value="<?php echo $result['prix']; ?>" class="form-control" required />
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Places disponibles :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="places_disponibles" value="<?php echo $result['places_disponibles']; ?>" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Date :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="date" value="<?php echo $result['date']; ?>" class="form-control" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Temps :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="temps" value="<?php echo $result['temps']; ?>" class="form-control" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Commentaire :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" name="commentaires" value="<?php echo $result['commentaires']; ?>" class="form-control" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5"></div>
                <div class="col-sm-7	">
                  <input type="submit" value="Modifier Trajet" name="update" class="btn btn-primary" />
                </div>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  include('bas de page.php')
  ?>
</body>

</html>