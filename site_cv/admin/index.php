<?php
require("../connexion/connexion.php");
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
			echo '<img id="photo" src="../img/'.$utilisateur['avatar']. '" style="widht:100px; height: 100px;"> <br>';
			echo "<br>" . "<br>" . 'Nous sommes le ' . $date .' '. ' et il est ' . $heure .  "<br>";
			echo "<br>";
		?>
		</div>
	</body>
</html>