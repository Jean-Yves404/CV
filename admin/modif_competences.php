<?php require("../connexion/connexion.php"); ?>

<?php
//Mise à jour d'une compétence 

if(isset($_POST['competences'])){
	$competences = adsslashes($_POST['competences']);
	$titre_competence = adsslashes($_POST['titre_competence']);
	$pdo -> exect('UPDATE competences SET competences="$competences", titre_competence="$titre_competence" WHERE id_competences="$id_competences"');

		header('location:../admin/competences.php');//Le header pour revenir à la liste des competences de l'utilisateur
		exit();




}
// Je récupère la compétence
 $id_competences = $_GET['id_competences'];//par l'id_competences et $_GET
$sql = $pdo -> query("SELECT * FROM competences WHERE id_competences = ". $id_competences);
$ligne_competence = $sql->fetch();
?>		
<!DOCTYPE html>
<html>
<head>
	<?php
	$sql = $pdo->query("SELECT * FROM utilisateur") ;
	$ligne = $sql->fetch();
?>
	<title ><?php echo 'Compétences | ' . $ligne['nom'].''.$ligne['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<div id="contenu">
		<header>
			<?php require("../admin/menu_nav.php"); ?>
		</header>
			<br><br><br>
			<h1>Modifier les compétences</h1>
		<div id="menu">
			<br><br><br>
			<h2>Connexion : déconnexion</h2>
			<br><br><br>
		</div>

		<div id="contenuPrincipal">
			<div>
					<form action="competences.php" method="POST">
					<label>Modification d'une compétences</label>
						<input type="text" name="titre_competence" value="<?= $ligne_competence['titre_competence']; ?>" required>
						<input type="text" name="competences" value="<?= $ligne_competence['competences']; ?>" required>
						<input hidden name="id_competences" value="<?= $ligne_competence['id_competences']; ?>">
						<input type="submit" value="mettre à jour">
					</form>
			</div>
				<br>
				<p> <?php echo $ligne_competence['id_competences']; ?> </p>
		
		</div>

	</div>
	<?php include('menu_footer.php'); ?><!-- ←Le Footer -->
</body>
</html>