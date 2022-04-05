<?php 
include('../connection.php');

$id=$_GET['id_report'];

$sql=mysqli_query($con,"select * from report where id_report='$id'");
$res=mysqli_fetch_assoc($sql);
if(mysqli_query($con,"delete from report where id_report='$id'"))
{
header('location:tableau de bord.php?option=signal');	
}
?>