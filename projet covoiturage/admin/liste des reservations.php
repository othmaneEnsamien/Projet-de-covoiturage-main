<script>
	function delreservation(id)
	{
		if(confirm("Vous souhaitez vraiment supprimer cette résérvation?"))
		{
		window.location.href='supprimer reservation.php?id_trajetsreserver='+id;	
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<h1>Liste des résérvations</h1><hr>
	<tr>
		<th>Id résérvation</th>
		<th>Id trajet</th>
		<th>Id reservateur</th>
		<th>Email reservateur</th>
		<th>Supprimer résérvation</th>
	</tr>
	<?php  
$i=1;
$con=mysqli_connect("localhost","root","","covoiturage") or die('La connexion à la base de données a échoué');
$sql=mysqli_query($con,"select * from trajetsreserver");
while($res=mysqli_fetch_assoc($sql))
{
	$id=$res['id_trajetsreserver'];	
	$id0=$res['id_utilisateur'];
?>
<tr>
		<td><?php echo $id;$i++; ?></td>
		<td><?php echo $res['id_trajet']; ?></td>
		<td><?php echo $res['id_utilisateur']; ?></td>
		
<?php $sql0=mysqli_query($con,"select * from utilisateur where id_utilisateur='$id0'");
$res0=mysqli_fetch_assoc($sql0);
?>
		<td><?php echo $res0['email_utilisateur']; ?></td>
		<td><a href="#"onclick="delreservation('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
	</td>
	</tr>	
<?php 	
}
?>	