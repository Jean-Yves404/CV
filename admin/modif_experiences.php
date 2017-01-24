<?php require("../connexion/connexion.php"); ?>

<?php
//Mise à jour d'une experience 


if(isset($_POST['titre_e'])){

	$titre_exp = addslashes($_POST['titre_exp']);
	$sous_titre_exp = addslashes($_POST['sous_titre_exp']);
	$dates = addslashes($_POST['dates']);
	$description_e = addslashes($_POST['description_e']);
	$id_experiences = $_POST['id_experiences'];

	$pdo -> exec("UPDATE experiences SET titre_exp='$titre_exp', sous_titre_exp='$sous_titre_exp', dates='$dates', description='$description' WHERE id_experiences='$id_experiences'");

		header('location:../admin/experiences.php');//Le header pour revenir a la lste des experiences de l'utilisateur
		exit();

}
// Je récupère l'experience
$id_experience = $_GET['id_experiences']; //par l'id_experience et $_GET
$sql = $pdo -> query("SELECT * FROM experiences WHERE id_experiences = '$id_experiences'");
$ligne_experience = $sql->fetch();
?>		
<!DOCTYPE html>
<html>
<head>
	<?php
	$sql = $pdo->query("SELECT * FROM utilisateur") ;
	$ligne = $sql->fetch();
	?>
	<title ><?php echo 'Expériences | ' . $ligne['nom'].''.$ligne['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<div id="contenu">
		<header>
			<?php require("../admin/menu_nav.php"); ?>
		</header>
		<h1> Les expériences | modification </h1>
		<div id="menu">
			<h2>Connexion : déconnexion</h2>
		</div>

		<div id="contenuPrincipal">
			<div>
					<form action="modif_experiences.php" method="POST">
					<label>Modification d'une formation</label>
						<input type="text" name="titre_exp" value="<?= $ligne_experience['titre_exp']; ?>" required>
						<input type="text" name="sous_titre_exp" value="<?= $ligne_experience['sous_titre_exp']; ?>" required>
						<input type="text" name="dates" value="<?= $ligne_experience['dates']; ?>" required>
						<input type="text" name="description" value="<?= $ligne_experience['description']; ?>" required>
						<input hidden name="id_experiences" value="<?= $ligne_experience['id_experiences']; ?>">
						<input type="submit" value="mettre à jour">
					</form>
			</div>
				
				<p> <?php echo $ligne_experience['id_experiences']; ?>    </p>
		
		</div>

	</div>
</body>
</html>