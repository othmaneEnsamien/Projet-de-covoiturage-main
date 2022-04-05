<?php 
if(isset($update))
{
$sql=mysqli_query($con,"select * from administrateur where email_administrateur='$admin_email' and password_administrateur='$op' ");
	if(mysqli_num_rows($sql))
	{
		if($np==$cp)
		{
		mysqli_query($con,"update administrateur set password_administrateur='$np' where email_administrateur='$admin_email' ");	
		echo "<h3 style='color:blue'>Mot de passe modifié avec succés</h3>";
		}
		else
		{
			echo "<h3 style='color:red'>Le nouveau mot de passe ne correspond pas la confirmation</h3>";
		}
	}
	else
	{
	echo "<h3 style='color:red'>L'ancien mot de passe ne correspond pas</h3>";	
	}
	
}
?>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered table-striped table-hover">
	<h1>Modifier Mot de passe</h1><hr>
	<tr style="height:40">
		<th>Entrer votre ancien mot de passe</th>
		<td><input type="password" name="op" class="form-control" required></td>
	</tr>

	<tr>	
		<th>Entrer votre nouveau mot de passe</th>
		<td><input type="password" name="np" class="form-control" required>
		</td>
	</tr>
	
	<tr>	
		<th>Confirmer votre nouveau mot de passe</th>
		<td><input type="password" name="cp" class="form-control"required/>
		</td>
	</tr>
	
	<tr>
		<td colspan="2" align="center">
			<input type="submit" class="btn btn-primary" value="Modifier Mot de passe" name="update"required>
		</td>
	</tr>
</table> 
</form>