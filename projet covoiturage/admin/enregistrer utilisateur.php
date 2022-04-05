<script>
	function Activation(id)
	{
		if(confirm("Vous souhaitez vraiment modifier l'état de ce compte?"))
		{
		window.location.href='activation utilisateur.php?id_utilisateur='+id;	
		}
	}
</script>
<script>
	function delUser(id)
	{
		if(confirm("Vous souhaitez vraiment supprimer cet utilisateur?"))
		{
		window.location.href='supprimer utilisateur.php?id_utilisateur='+id;	
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<h1>Enregistrement d'utilisateur</h1><hr>
	<tr>
		<th>Id utilisateur </th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Email</th>
		<th>Mot de passe</th>
		<th>Numéro de téléphone</th>
		<th>Genre</th>
		<th>Photo</th>
		<th>Activation compte</th>
		<th>Supprimer</th>
	</tr>
	<?php  
$i=1;
$con=mysqli_connect("localhost","root","","covoiturage") or die('La connexion à la base de données a échoué');
$sql=mysqli_query($con,"select * from utilisateur");
while($res=mysqli_fetch_assoc($sql))
{
	$id=$res['id_utilisateur'];	
?>
<tr>
		<td><?php echo $id;$i++; ?></td>
		<td><?php echo $res['nom_utilisateur']; ?></td>
		<td><?php echo $res['prenom_utilisateur']; ?></td>
		<td><?php echo $res['email_utilisateur']; ?></td>
		<td><?php echo $res['passsword_utilisateur']; ?></td>
		<td><?php echo $res['telephone_utilisateur']; ?></td>
		<td><?php echo $res['genre_utilisateur']; ?></td>
		<td><?php echo $res['photo_utilisateur']; ?></td>
	<?php
	if($res['activation_compte']=='0'){
	?>
		<td bgcolor="yellow"><a href="#"onclick="Activation('<?php echo $id; ?>')"><?php echo "désactivé"; ?></a></td>
		<?php
	}else if($res['activation_compte']=='1'){
	?>
		<td><a href="#"onclick="Activation('<?php echo $id; ?>')"><?php echo "Activé"; ?></a></td>
	<?php
	}
	?>
		<td><a href="#"onclick="delUser('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
	</td>
	</tr>	
<?php 	
}
?>	