<?php require("../connexion/connexion.php"); 


session_start(); // Connexion/Déconnexion

    if(isset($_SESSION['connexion'])&& $_SESSION['connexion'] == 'connecté') {
        $id_utilisateur=$_SESSION['id_utilisateur'];
        $prenom=$_SESSION['prenom'];
        $nom=$_SESSION['nom'];
    }else{
        header('location:authentification.php');
    }

    if (isset($_GET['deconnect'])) {
        $_SESSION['connexion']='';
        $_SESSION['id_utilisateur']='';
        $_SESSION['prenom']='';
        $_SESSION['nom']='';

        unset($_SESSION['connexion']);

        session_destroy();

        header('location:../index.php');
    }
?>


<!DOCTYPE html>
<html lang="fr">
<title>Profil Admin</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php include('menu_nav.php'); ?>

	<body>
		<?php
			$resultat = $pdo -> query("SELECT * FROM utilisateur");
			$utilisateur = $resultat->fetch();
				echo $utilisateur['id_utilisateur'].'<br>';
		        echo $utilisateur['prenom'].'<br>';
		        echo $utilisateur['nom'].'<br>' ;
		        echo $utilisateur['email'].'<br>' ;
		        echo $utilisateur['telephone'].'<br>' ;
		        echo $utilisateur['mdp'] .'<br>';
		        echo $utilisateur['pseudo'].'<br>' ;
		        echo '<img src="../img/'.$utilisateur['avatar']. ' " style="widht:100px; height: 100px;"> <br>';
		        echo $utilisateur['age'].'<br>' ;
		        echo $utilisateur['sexe'].'<br>' ;
		        echo $utilisateur['etat_civil'].'<br>' ;
		        echo $utilisateur['statut'].'<br>' ;
		        echo $utilisateur['adresse'] .'<br>';
		        echo $utilisateur['code_postal'].'<br>' ;
		        echo $utilisateur['ville'].'<br>' ;
		        echo $utilisateur['pays'].'<br>' ;
		        echo $utilisateur['notes'] .'<br>';
		?>

	<?php include('menu_footer.php'); ?>  <!-- ←Le footer -->
	</body>
</html>

