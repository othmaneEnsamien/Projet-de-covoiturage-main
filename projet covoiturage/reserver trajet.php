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
<title>Résérver trajet</title>
<?php 
include('connection.php');

$id=$_GET['id_trajet'];
//$user_id=$_SESSION['userIdLoggedIn'];
$sql=mysqli_query($con,"select * from carcteristiquestrajet where id_trajet='$id'");
$res=mysqli_fetch_assoc($sql);
if(mysqli_query($con,"INSERT INTO trajetsreserver (id_trajet, id_utilisateur) VALUES ('$id' ,'$user_id')"))
{
	$sql=mysqli_query($con,"Update carcteristiquestrajet Set places_disponibles=places_disponibles-1 where id_trajet='$id'");
	
}
header('location:consulter trajets.php');
?>
</html>