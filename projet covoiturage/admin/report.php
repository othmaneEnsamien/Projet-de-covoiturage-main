<script>
	function delFeedback(id)
	{
		if(confirm("Vous souhaitez vraiment supprimer ce signal?"))
		{
		window.location.href='supprimer signal.php?id_report='+id;	
		}
	}
</script>
<table class="table table-striped table-hover">
	<h1>Signal</h1><hr>
	<tr>
		<th>Numéro</th>
		<th>Nom && Prénom</th>
		<th>Email</th>
		<th>Téléphone</th>
		<th>Sujet</th>
		<th>Message</th>
		<th>Supprimer</th>
	</tr>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from report");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['id_report'];	
$name=$res['name_user'];
$email=$res['mail_user'];
$mobile	=$res['phone_user'];
$subject=$res['subject'];
$message=$res['message'];
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['name_user']; ?></td>
		<td><?php echo $res['mail_user']; ?></td>
		<td><?php echo $res['phone_user']; ?></td>
		<td><?php echo $res['subject']; ?></td>
		<td><?php echo $res['message']; ?></td>
		<td><a href="#"onclick="delFeedback('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove"style='color:red'></span></a></td>
	</tr>	
<?php 	
}
?>	
</table>