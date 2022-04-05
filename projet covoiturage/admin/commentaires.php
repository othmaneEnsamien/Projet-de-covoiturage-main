<script>
	function delFeedback(id)
	{
		if(confirm("Vous souhaitez vraiment supprimer ce commentaire?"))
		{
		window.location.href='supprimer commentaire.php?id_commentaire='+id;	
		}
	}
</script>
<table class="table table-striped table-hover">
	<h1>Commentaires</h1><hr>
	<tr>
		<th>Numéro</th>
		<th>Nom</th>
		<th>Email</th>
		<th>Téléphone</th>
		<th>Message</th>
		<th>Supprimer</th>
	</tr>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from feedback");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['id_commentaire'];	
$name=$res['nom_utilisateur'];
$email=$res['email_utilisateur'];
$mobile	=$res['telephone_utilisateur'];
$message=$res['message'];
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['nom_utilisateur']; ?></td>
		<td><?php echo $res['email_utilisateur']; ?></td>
		<td><?php echo $res['telephone_utilisateur']; ?></td>
		<td><?php echo $res['message']; ?></td>
		<td><a href="#"onclick="delFeedback('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
	</tr>	
<?php 	
}
?>	
</table>