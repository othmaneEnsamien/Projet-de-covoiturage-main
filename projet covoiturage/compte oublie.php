<?php 
include('connection.php');
error_reporting(1);
extract($_REQUEST);
if(isset($submit))
{
     $email=$_POST['email'];
     $subject= "Mot de passe";
     $name= "Récupération mot de passe";
  $sql=$con -> query("select * from utilisateur where email_utilisateur='$email'");
    if($row=mysqli_fetch_array($sql))
    {
    $row=mysqli_fetch_array($con -> query("select passsword_utilisateur from utilisateur where email='$email'"));
$password=$row['password'];     
     require_once "PHPMailer/PHPMailer.php";
     require_once "PHPMailer/SMTP.php";
     require_once "PHPMailer/Exception.php";
 
 $mail = new PHPMailer\PHPMailer\PHPMailer();
 
 //SMTP Settings
 $mail->isSMTP();
 $mail->Host = "smtp.gmail.com";
 $mail->SMTPAuth = true;
 $mail->Username = "agencetf2020@gmail.com";
 $mail->Password = 'trachlifadili';
 $mail->Port = 465; //587
 $mail->SMTPSecure = "ssl"; //tls
 
 //Email Settings
 $mail->isHTML(true);
 $mail->setFrom($email, $name);
 $mail->addAddress($email);
 $mail->Subject = $subject;
 $mail->Body = "Votre mot de passe est $password";
 if ($mail->send()) 
 {
 $error= "<h3 style='color:red'>Regardez votre boite e-mail</h3>";
 }
}
    else
    {
    $error= "<h3 style='color:red'>Compte introuvable</h3>"; 
    }  
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Compte oublié</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin-top:50px;">
<?php
include('barre de menu.php')
?>
<div class="container-fluid"id="primary">
  <div class="container">
    <div class="row">
      <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <h1 style="margin-top:50px;padding-top:50px;">Compte oublié</h1><hr>
          <p class="text-center">Veuillez saisir votre email.</p><br><br>
          <form method="post">
        <div class="form-group">
          <input type="Email" id="email" name="email" class="form-control" id="#"placeholder="Entrez votre email "required>
        </div><hr>
          <input type="submit" value="submit" name="submit" class="btn btn-primary btn-group-justified"required>
          <?php echo  @$error; ?>
        </form><br><br><br><br>  
        </div>
    </div>
  </div>
</div>

<?php
include('bas de page.php')
?>
</body>
</html>