<script>
	function delSlider(id)
	{
		if(confirm("Vous voulez vraiment supprimer le curseur ?"))
		{
		window.location.href='supprimer curseur.php?id='+id;	
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<tr>
	<td colspan="5"><a href="tableau de bord.php?option=add_slider" class="btn btn-primary">Ajouter Nouveau</a></td>
	</tr>
	<tr style="height:40">
		<th>Id curseur</th>
		<th>Image</th>
		<th>Caption</th>
		<th>Modifier</th>
		<th>Supprimer</th>
	</tr>
<?php 
$i=1;
$con=mysqli_connect("localhost","root","","covoiturage") or die('La connexion à la base de données a échoué');
$sql=mysqli_query($con,"select * from slider");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['id'];	
$img=$res['image'];
$path="../image/$img";
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><img src="<?php echo $path;?>" width="50" height="50"/></td>
		<td><?php echo $res['caption']; ?></td>
		<td><a href="tableau de bord.php?option=update_slider&id=<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td><a href="#" onclick="delSlider('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
	</tr>	
<?php 	
}
?>	
</table>