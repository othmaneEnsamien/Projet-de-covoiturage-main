<?php
include('connection.php');
extract($_REQUEST);
if (isset($send)) {
  mysqli_query($con, "insert into feedback (nom_utilisateur , email_utilisateur , telephone_utilisateur , message) values('$nom','$email','$mobile','$msge')");
  $msg = "<h4 style='color:green;'>commentaires envoyés avec succès</h4>";
}
?>
<footer style="background-color: #9c9c9c">
  <div class="container-fluid">
    <div class="col-sm-4 hov">
      <img src="image/ylh.png" width="200px" height="100px" /><br><br>
      <p class="text-justify">Informations générales à propos de l'application et ses avantages</p><br>
      <center><a href="a propos.php" class="btn btn-danger"><b>Voir plus..</b></a></center><br><br><br>
      <?php
      include('réseaux sociaux.php')
      ?>
    </div>&nbsp;&nbsp;
    <div class="col-sm-4 text-justify">
      <h3 style="    color: #000000">Nous Contacter</h3>
      <p style="color:white;"><strong>Addresse:&nbsp;</strong>CASABLANCA ...</p>
      <p style="color:white;"><strong>Email :&nbsp;</strong>....@gmail.com</p>
      <p style="color:white;"><strong>Contact :&nbsp;</strong>(+212) 0000000000</p><br><br><br>
      <img src="image/enam.png" class="img-responsive" style="width:200px;height:150px;border-radius:100%;">
    </div>&nbsp;

    <div class="col-sm-4 text-center">
      <div class="panel panel-primary">
        <div class="panel-heading" style="    background-color: #000000">Commentaires</div>
        <div class="panel-body">
          <div class="feedback">
            <form method="post"><br>
              <div class="form-group">
                <input type="text" name="nom" class="form-control" id="#" placeholder="Entrer votre nom" required>
              </div>
              <div class="form-group">
                <input type="Email" name="email" class="form-control" id="#" placeholder="Entrer votre email" required>
              </div>
              <div class="form-group">
                <input type="Number" name="mobile" class="form-control" id="#" placeholder="Numéro de téléphone" required>
              </div>
              <div class="form-group">
                <textarea type="Text" name="msge" class="form-control" id="#" placeholder="Tapez votre massage" required></textarea>
              </div>
              <input type="submit" value="Envoyer" name="send" class="btn btn-primary btn-group-justified" style="    background-color: #000000" required>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>