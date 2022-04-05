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

	$sql= mysqli_query($con,"select * from utilisateur where email_utilisateur='$user_email' "); 
    $result=mysqli_fetch_assoc($sql);

?>
<head>
<div class="navbar">
  <a href="profil.php">Profil</a>
  <a href="espace utilisateur.php">Espace utilisateur</</a>
  <a href="se déconnecter.php">Se deconnecter</a>
</div>

<style>
/* Navbar container */
.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial;
}

/* Links inside the navbar */
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 16px 164.7px;
  text-decoration: none;
}

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}
</style>

</head>
</br>
<title align="center">Signaler un probléme</title>
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<header class="ccheader">
    <h1>Signaler un probléme</h1>	
</header>

<?php
if(isset($submit))
 if ($con->query("INSERT INTO report (name_user, mail_user, phone_user, subject, message)
 VALUES ('$name_user' ,'$mail_user', '$phone_user', '$subject', '$message')") === TRUE) {
		         echo "<div class='alert alert-success center' style='width: 90%; margin: auto;'><p>Votre demande sera traitée sous peu</p></div><br><br>"; 
} 

?>

<div class="wrapper">
    <form method="post" action="" class="ccform">
    <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-user fa-2x"></i></span>
		<input type="text" name="name_user" value="<?php echo $result['nom_utilisateur']; ?> <?php echo $result['prenom_utilisateur']; ?>"class="ccformfield"/readonly="readonly">
    </div>
    <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-envelope fa-2x"></i></span>
	 <input type="text" name="mail_user" value="<?php echo $result['email_utilisateur']; ?>"class="ccformfield"/readonly="readonly">
    </div>
    <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-mobile-phone fa-2x"></i></span>
	 <input type="text" name="phone_user" value="<?php echo $result['telephone_utilisateur']; ?>"class="ccformfield"/readonly="readonly">
    </div>
     <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-info fa-2x"></i><br>Sujet</span>
		
		          <div class="col-sm-7">
				  <br>
              <input type="radio" name="subject" value="Spam ou abus"required><b>Spam ou abus</b>
              <input type="radio" name="subject" value="Quelque chose ne fonctionnent pas"required><b>Quelque chose ne fonctionnent pas</b>
			  <input type="radio" name="subject" value="Avis global"required><b>Avis global</b>
			  <input type="radio" name="subject" value="Bloquer compte"required><b>Bloquer compte</b>
          </div>
		  <br>
		
    </div>
	<br>
    <div class="ccfield-prepend">
        <span class="ccform-addon"><i class="fa fa-comment fa-2x"></i></span>
        <textarea class="ccformfield" name="message" rows="8" placeholder="Message" required></textarea>
    </div>
    <div class="ccfield-prepend">
        <input class="ccbtn" type="submit" name="submit" value="Submit">
    </div>
    </form>
</div>

<style>

@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);
body {
	background: #f29107;
	color: #fff;
	font-weight: 400;
	font-size: 1em;
	font-family: 'Lato', Arial, sans-serif;
	margin:0;
	padding:0;
	padding-bottom:60px;
}
.ccheader {
	margin: 0 auto;
	padding: 2em;
	text-align: center;
}

.ccheader h1 {
	margin: 0;
	font-weight: 300;
	font-size: 2.5em;
	line-height: 1.3;
}
.ccheader {
	margin: 0 auto;
	padding: 2em;
	text-align: center;
}

.ccheader h1 {
	margin: 0;
	font-weight: 300;
	font-size: 2.5em;
	line-height: 1.3;
}

/* Form CSS*/
.ccform {
   margin: 0 auto;
    width: 800px;
}
.ccfield-prepend{
	margin-bottom:10px;
	width:100%;
}

.ccform-addon{
	color:#f8ae45; 
	float:left;
	padding:8px;
	width:8%;
	background:#FFFFFF;
	text-align:center;	
}

.ccformfield {
	color:#000000; 
	background:#FFFFFF;
	border:none;
	padding:15.5px;
	width:91.9%;
	display:block;
	font-family: 'Lato',Arial,sans-serif;
	font-size:14px;
}

.ccformfield {
	font-family: 'Lato',Arial,sans-serif;
}
.ccbtn{
	display:block;
	border:none;
	background:#f8ae45;
	color:#FFFFFF;
	padding:12px 25px;
	cursor:pointer;
	text-decoration:none;
	font-weight:bold;
}
.ccbtn:hover{
	background:#d8850e;

}
.credit {
  color:#fff;
  width: 800px;
  clear:both;
margin:0 auto;
  line-height:25px;
 padding: 25px 50px; 
}
.credit em{
margin-right:5px;
}
.credit a {
color: #0d2ed5;
font-weight: bold;
text-decoration: none;
}

ul {
 padding:0;
 margin:0;
 list-style-type:none;
 }
li {
 margin-left:2px;
 float:left; /*pour IE*/
 }
ul li a {
 display:block;
 float:left;   
 width:100px;
 background-color:#6495ED;
 color:black;
 text-decoration:none;
 text-align:center;
 padding:5px;
 border:2px solid;
 /*pour avoir un effet "outset" avec IE :*/
 border-color:#DCDCDC #696969 #696969 #DCDCDC;
 }
ul li a:hover {
 background-color:#D3D3D3;
 border-color:#696969 #DCDCDC #DCDCDC #696969;
 } 

</style>