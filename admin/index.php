<?php
require("../connexion/connexion.php");
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
<html>
<head>
	<title>Bonjour Jean-Yves</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet"> 
</head>
<body>
		<?php include('menu_nav.php'); ?>
		<div class="container">
		<?php
			$date = date("d M Y");
			$heure = date("H:i");
			$resultat = $pdo -> query("SELECT * FROM utilisateur");
			$utilisateur = $resultat -> fetch();
			echo "<br>";
			echo 'Bonjour ' . $utilisateur['prenom'] . ' ' . $utilisateur['nom'	] . '. ';
			echo "<br>";
			echo "<br>";
			echo '<img id="admin_img" src="../img/'.$utilisateur['avatar']. '" style="widht:100px; height: 100px;"> <br>';
			echo "<br>" . "<br>" . 'Nous sommes le ' . $date .' '. ' et il est ' . $heure .  "<br>";
			echo "<br>";
		?>
		</div>
	</body>
</html>