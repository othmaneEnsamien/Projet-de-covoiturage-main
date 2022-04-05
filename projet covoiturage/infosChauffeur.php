<html>
<title>Infos Utilisateur</title>
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
<?php 
$id_chauffeur=$_GET['id_utilisateur'];


$sql=mysqli_query($con,"select * from utilisateur where id_utilisateur='$id_chauffeur'");
$rest=mysqli_fetch_assoc($sql);
$utilisateur_signaler=$rest["id_utilisateur"];
?>

<head>
<div class="navbar">
  <a href="consulter mes reservations.php">Consulter mes résérvations</a>
  <a href="consulter mes trajets.php">Consulter mes trajets</a>
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
  padding: 16px 64.3px;
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

<link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<style>
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
#nav {
	padding: 0; margin: 0;
	text-align: center; 
	align: center;
}
#nav li {
	display: inline;
	list-style: none;
	align: center;
}
#nav a {
	display:inline-block;
	margin: 10 90px;
	align: center;
}

</style>

</head>
<br>
<br>
	
	<table class="greenTable">
<thead>
<tr>
<th>Nom</th>
<th>Prenom</th>
<th>Email</th>
<th>Telephone</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo strtoupper($rest["nom_utilisateur"]); ?></td>
<td><?php echo strtoupper($rest["prenom_utilisateur"]); ?></td>
<td><?php echo $rest["email_utilisateur"]; ?></td>
<td><?php echo strtoupper($rest["telephone_utilisateur"]); ?></td>
</tr>
</tbody>
</table>

<style>
table.greenTable {
  border: 3px solid #24943A;
  background-color: #D4EED1;
  width: 80%;
  text-align: center;
    margin-left:10%; 
}
table.greenTable td, table.greenTable th {
  border: 1px solid #24943A;
  padding: 3px 3px;
}
table.greenTable tbody td {
  font-size: 16px;
}
table.greenTable thead {
  background: #24943A;
  background: -moz-linear-gradient(top, #5baf6b 0%, #3a9e4d 66%, #24943A 100%);
  background: -webkit-linear-gradient(top, #5baf6b 0%, #3a9e4d 66%, #24943A 100%);
  background: linear-gradient(to bottom, #5baf6b 0%, #3a9e4d 66%, #24943A 100%);
  border-bottom: 0px solid #444444;
}
table.greenTable thead th {
  font-size: 14px;
  font-weight: bold;
  color: #F0F0F0;
  text-align: center;
}

h1{
	align:center;
	color:red;
}
</style>
</body>
</html>