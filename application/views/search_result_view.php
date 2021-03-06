<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Résultat</title>
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
</head>
<body>
	<?php
		include("layouts/menu.php");
	?>

	<div class="col-lg-6">
		<div class="panel panel-default">
		<div class="panel-heading">Resultat de votre recherche :</div>
			<table class="table">
				<thead>
					<tr>
						<th>Apperçu</th>
						<th>Nom</th>
						<th>Url</th>
						<th>Gestion</th>
					</tr>
				</thead>
				<tbody>
					<?php
						for($i = 0; $i < count($info); $i++)
						{
							echo "<tr>";

							echo 
								"<td><img src=".base_url().$info[$i]->url." alt='Icone' class='miniature'></td>";

							echo 
								"<td>" . $info[$i]->file_name . "</td>";

							echo 
								"<td><a href=". base_url() . $info[$i]->url . ">". base_url() . $info[$i]->url ."</a></td>";

							echo 
								"<td>
									<a href=". base_url() . $info[$i]->url ." download=''>telecharger</a>
								</td>";

							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>