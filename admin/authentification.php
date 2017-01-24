<?php require '../connexion/connexion.php'  ?>
<?php

session_start(); // Mettre dans toutes les pages SESSION et identification 

if(isset($_POST['connexion'])){// on envoie le formulaire avec le name du bouton, connexion on a cliqué sur le bouton

	$email=addslashes($_POST['email']);
	$mdp=addslashes($_POST['mdp']);

		$sql = $pdo->prepare("SELECT * FROM utilisateur WHERE email='$email' AND mdp='$mdp' "); // On vérifie le courriel et mot de passe et ...
		$sql->execute();
		$nbr_utilisateur= $sql->rowCount(); // On compte, et il y est, le compte répond 1 sinon, le compte répond 0 (est-ce le vrai admin ou pas ?)

			if($nbr_utilisateur==0){//on ne l'a pas trouvé ??
			$msg_connexion_err="Erreur d'authentification !";
			}else{// on trouve l'email et le mdp c'est bien l'admin il  est bien inscrit 
				$ligne = $sql->fetch();//pour retrouver son nom et prénom

			$_SESSION['connexion']='connecté';
			$_SESSION['id_utilisateur']=$ligne['id_utilisateur'];
			$_SESSION['prenom']=$ligne['prenom'];
			$_SESSION['nom']=$ligne['nom'];

				header('location:index.php'); // Vers la page d'accueil de l'admin

			}

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="../css/style_formulaire.css">
	<meta charset="uft-8">
	<title>Connexion</title>
</head>
<body>
	
	<div>
		<form method="post">
    <div class="container">
      <img src="../img/nwar.jpg" alt="image" />
    <div class="form-input"><i class="fa fa-user fa-2x" aria-hidden="true"></i>
     <input  type="text" name="email"  placeholder="Veuillez entrer votre @ " /></div>
    <div class="form-input"><i class="fa fa-lock fa-2x" aria-hidden="true"></i>
      <input type="password" name="mdp"  placeholder="Veuillez entrer votre mot de passe" /></div>
   <input type="submit" id="submit" name="connexion" value="valider"/><br>
      <a href="#">Mot de passe oublié ?</a>
  </div></form>
	</div>	
</body>
</html>