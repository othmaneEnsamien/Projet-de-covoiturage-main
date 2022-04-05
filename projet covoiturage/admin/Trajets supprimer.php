	<script>
	function delTrajetDefinitivement(id)
	{
		if(confirm("Vous souhaitez vraiment supprimer difinitivement ce trajet?"))
		{
		window.location.href='supprimer definitivement trajet.php?id_trajet_deleted='+id;	
		}
	}	
</script>
<table class="table table-striped table-hover">
	<h1>Détails des trajets</h1><hr>
	
	<tr>
		<th>Id trajet</th>
		<th>Departure</th>
		<th>Destination</th>
		<th>Prix</th>
		<th>Places disponibles</th>
		<th>Date</th>
		<th>Temps</th>
		<th>Commentaires</th>
		<th style="color:red">Responsable de la suppression</th>
		<th>Suppression definitive</th>
	</tr>
<?php 
include('../connection.php');
$i=1;
$sql=mysqli_query($con,"select * from trajet_deleted");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['id_trajet_deleted'];
$departure=$res['departure'];
$destination=$res['destination'];
$prix=$res['prix'];
$places_disponibles=$res['places_disponibles'];	
$date=$res['date'];
$temps=$res['temps'];
$commentaires=$res['commentaires'];
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['departure']; ?></td>
		<td><?php echo $res['destination']; ?></td>
		<td><?php echo $res['prix']; ?></td>
		<td><?php echo $res['places_disponibles']; ?></td>
		<td><?php echo $res['date']; ?></td>
		<td><?php echo $res['temps']; ?></td>
		<td><?php echo $res['commentaires']; ?></td>
		<td style="color:green"><?php echo $res['deleted_by']; ?></td>
		<td><a href="#"onclick="delTrajetDefinitivement('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
	</tr>	
<?php 	
}
?>	
</table>