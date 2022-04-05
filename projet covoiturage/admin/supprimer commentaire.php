<?php 
include('../connection.php');

$id=$_GET['id_commentaire'];

$sql=mysqli_query($con,"select * from feedback where id_commentaire='$id'");
$res=mysqli_fetch_assoc($sql);
if(mysqli_query($con,"delete from feedback where id_commentaire='$id'"))
{
header('location:tableau de bord.php?option=feedback');	
}
?>