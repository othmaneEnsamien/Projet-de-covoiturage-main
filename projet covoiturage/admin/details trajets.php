	<script>
	function delTrajet(id)
	{
		if(confirm("Vous souhaitez vraiment supprimer ce trajet?"))
		{
		window.location.href='supprimer trajet.php?id_trajet='+id;	
		}
	}
</script>
<table class="table table-striped table-hover">
	<h1 style="color:green">Détails des trajets</h1><hr>
	
	<tr>
		<th>Id trajet</th>
		<th>Id utilisateur</th>
		<th>Departure</th>
		<th>Destination</th>
		<th>Prix</th>
		<th>Places disponibles</th>
		<th>Date</th>
		<th>Temps</th>
		<th>Commentaires</th>
		<th>Supprimer</th>
	</tr>
<?php 
include('../connection.php');
$i=1;
$sql=mysqli_query($con,"select * from carcteristiquestrajet");
while($res=mysqli_fetch_assoc($sql))
{
$datetime = date("Y-m-d");
$id=$res['id_trajet'];	
$name=$res['id_utilisateur'];
$departure=$res['departure'];
$destination=$res['destination'];
$prix=$res['prix'];
$places_disponibles=$res['places_disponibles'];	
$date=$res['date'];
$temps=$res['temps'];
$commentaires=$res['commentaires'];
if($datetime <=$date ){
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['id_utilisateur']; ?></td>
		<td><?php echo $res['departure']; ?></td>
		<td><?php echo $res['destination']; ?></td>
		<td><?php echo $res['prix']; ?></td>
		<td><?php echo $res['places_disponibles']; ?></td>
		<td><?php echo $res['date']; ?></td>
		<td><?php echo $res['temps']; ?></td>
		<td><?php echo $res['commentaires']; ?></td>
		<td><a href="#"onclick="delTrajet('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
	</tr>	
<?php 
}
}
?>	
</table>
<table class="table table-striped table-hover">
	<h1 style="color:blue">Anciens trajets</h1><hr>
	
	<tr>
		<th>Id trajet</th>
		<th>Id utilisateur</th>
		<th>Departure</th>
		<th>Destination</th>
		<th>Prix</th>
		<th>Places disponibles</th>
		<th>Date</th>
		<th>Temps</th>
		<th>Commentaires</th>
		<th>Supprimer</th>
	</tr>
	<?php 
include('../connection.php');
$i=1;
$sql=mysqli_query($con,"select * from carcteristiquestrajet");
while($res=mysqli_fetch_assoc($sql))
{
$datetime = date("Y-m-d");
$id=$res['id_trajet'];	
$name=$res['id_utilisateur'];
$departure=$res['departure'];
$destination=$res['destination'];
$prix=$res['prix'];
$places_disponibles=$res['places_disponibles'];	
$date=$res['date'];
$temps=$res['temps'];
$commentaires=$res['commentaires'];
if($datetime >$date ){
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['id_utilisateur']; ?></td>
		<td><?php echo $res['departure']; ?></td>
		<td><?php echo $res['destination']; ?></td>
		<td><?php echo $res['prix']; ?></td>
		<td><?php echo $res['places_disponibles']; ?></td>
		<td><?php echo $res['date']; ?></td>
		<td><?php echo $res['temps']; ?></td>
		<td><?php echo $res['commentaires']; ?></td>
		<td><a href="#"onclick="delTrajet('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
	</tr>	
<?php 
}
}
?>	
</table>