<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Fichiers</title>
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
</head>
<body>
	<?php
		include("layouts/menu.php");
	?>

	<div class="col-lg-6">
		<?php echo form_open("files/search/".$this->session->userdata("username"), array('class' => 'navbar-form navbar-left')); ?>
			<div class="form-group">
				<input class="form-control" placeholder="Rechercher un fichier" type="text" name="search">
			</div>
			<div class="col-lg-10">
				<span>Par: </span>
				<div class="radio">
					<label>
						<input name="option" id="optionsRadios1" value="1" checked="" type="radio">
						Nom de fichier
					</label>
				</div>
				<div class="radio">
					<label>
						<input name="option" id="optionsRadios2" value="2" type="radio">
						Lien
					</label>
				</div>
			</div>
			<button type="submit" class="btn btn-default">Chercher</button>
		<?php echo form_close(); ?>
	</div>

	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">Vos fichier</div>
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
									<a href=".base_url().'files/update/'.$this->session->userdata('username')."/".$info[$i]->id.">modifier/supprimer</a>,
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