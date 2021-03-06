<?php require("../connexion/connexion.php"); ?>

<?php

session_start();

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){//Si la personne est connecté et la valeur est bien celle de la page d'authentification
	$id_utilisateur = $_SESSION['id_utilisateur'];
	$prenom = $_SESSION['prenom'];
	$nom = $_SESSION['nom'];
}else{// l'utilisateur n'est pas connecté 
	header('location:authentification.php');
}

if(isset($_GET['deconnect'])){
	
	$_SESSION['connexion']= ''; // on vide les variables de session
	$_SESSION['id_utilisateur']= ''; 
	$_SESSION['prenom']= ''; 
	$_SESSION['nom']= ''; 

	unset($_SESSION['connexion']);// on supprime cette variable

	session_destroy();// on détruit la session
	header('location:../index.php');
}
?>

<?php
	if($_POST){ // On vérifie si on insert une nouvelle formation
		if($_POST['titre_f']!='' && $_POST['sous_titre_f']!='' && $_POST['date_f']!='' && $_POST['description_f']!=''){
			$titre_f = addslashes($_POST['titre_f']);
			$sous_titre_f = addslashes($_POST['sous_titre_f']);
			$date_f = addslashes($_POST['date_f']);
			$description_f = addslashes($_POST['description_f']);
			$id_formation = addslashes($_POST['id_formation']);
			// $id_formation = addslashes($_POST['id_formation']);

		$pdo->exec("INSERT INTO formation VALUES (NULL, '$titre_f', '$sous_titre_f	', '$date_f', '$description_f','')");
			header('location: ../admin/formation.php');
			exit();

	}//←fermeture du if
		} //←fermeture du isset

/* ↓ Suppression des formations ↓ */

if(isset($_GET['id_formation'])){
	$suppression = $_GET['id_formation'];
	$sql = "DELETE FROM formation WHERE id_formation ='$suppression'";
	$pdo -> query($sql);
	}
?>



<!DOCTYPE html>
<html lang="fr">
	<head>
		<?php
		$sql = $pdo->query("SELECT * FROM utilisateur") ;
		$ligne = $sql->fetch();
		?>
		<title > <?php echo 'Formations | ' . $ligne['nom'].' '.$ligne['prenom']; ?></title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>

	<body>
		<?php require("../admin/menu_nav.php"); ?>
		<h1> Les formations</h1>
		<br><br><br><br><br><br><br><br><br>	
		<div class="wrapper">

			<form action="formation.php" method="POST">
				<table width="200px" border="1">
				<thead>
					<th>Titre</th>
					<th>Sous-titre</th>
					<th>Date </th>	
					<th>Description</th>
				</thead>
				<tr>
					<td><input type="text" name="titre_f"  size="25" required></td>
					<td><input type="text" name="sous_titre_f"  size="25" required></td>
					<td><input type="text" name="date_f"  size="25" required></td>
					<td><input type="text" name="description_f"  size="25" required></td>
				</tr>
				<tr>
					<td colspan="6"><input type="submit" value="Insérer une formation"></td>
				</tr>
				</table>
			</form>
			<?php 
				$sql = $pdo->prepare("SELECT * FROM formation");
				$sql->execute(); // execute 
				$nbr_formation = $sql->rowCount(); // compte les lignes
			?>
				
					<br><br><br><br>
				
				<table border="2">
				<caption>Liste des expériences</caption>
					<thead>
						<th>Titre de la formation</th>
						<th>Sous-titre</th>
						<th>Date</th>
						<th>Description</th>
						<th>Modifier</th>
						<th>Supprimer</th>
					</thead>
					<tr>
						<?php while($ligne = $sql->fetch()){ ?>
						<td> <?= $ligne['titre_f'].'<br>' ?></td>
						<td> <?= $ligne['sous_titre_f'].'<br>'?></td>
						<td> <?= $ligne['date_f'].'<br>'?></td>
						<td> <?= $ligne['description_f'].'<br>'?></td>	
						<td><a href="modif_formation.php?id_formation=<?= $ligne['id_formation']; ?>"><img class="editdelete" src="../img/edit.png"></a></td>
						<td><a href="formation.php?id_formation=<?= $ligne['id_formation']; ?>"><img class="editdelete" src="../img/delete.png"></a></td>
	               	</tr>	
	               <?php };?>	
				</table>
		</div>
	</body>
</html>