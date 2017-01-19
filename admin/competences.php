<?php require("../connexion/connexion.php"); ?>

<?php // On insère une compétence
    if(isset($_POST['competences'])){ // On vérifie si on insert une nouvelle compétence
        if($_POST['competences']!='' && $_POST['titre_competence']!=''){
            $competences = addslashes($_POST['competences']);
            $titre_competence = addslashes($_POST['titre_competence']);

        $pdo->exec("INSERT INTO competences VALUES (NULL, '$competences', '$titre_competence')");
            header('location:../admin/competences.php');
            exit();

    	}else{

    	}

    	
        } // ferme le isset

//on supprime competence

if(isset($_GET['id_competences'])){
    $suppression = $_GET['id_competences'];
    $sql = "DELETE FROM competences WHERE id_competences =
     '$suppression'";
    $pdo -> query($sql);
}

?>



<?php require ("../connexion/connexion.php"); ?>
<!DOCTYPE html>
<html lang="fr">
	<head>
	<meta charset="utf-8">
    	<title>Compétences</title>
    	<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
    	<?php include('menu_nav.php'); ?>
    

	<body>
    <div id="contenu">
        <header>
    
        </header>
        <h1> Les compétences numériques    </h1>
        <div id="menu">
            <h2>Connexion : déconnexion</h2>
        </div>

        <div id="contenuPrincipal">
            <div>
                <form action="" method="POST">
                    <table width="200px" border="1">
                    <thead>
                        <th></th>
                        <th>Compétences</th>
                        <th>Titre</th>
                    </thead>
                        <tr>
                            <td>Compétences</td>
                            <td><input type="text" name="competences" id="competences" size="50" required></td>
                            <td><input type="text" name="titre_competence" id="titre_competence" size="50" required></td>
                        </tr>
                        <tr>
                            <td colspan="4"><input type="submit" value="Ajouter une compétence"></td>
                        </tr>
                    </table>
                </form>
            </div>
                <?php
                    $sql = $pdo->prepare("SELECT * FROM competences");
                    $sql->execute(); // execute la
                    $nbr_competence = $sql->rowCount(); // compte les lignes
                ?>
                <p>Vous avez <?php echo $nbr_competence; ?> compétences   </p>
                <table border="2">
                    <caption>Liste des compétences</caption>
                    <thead>
                        <th>Titre de la compétences</th>
                        <th>Compétences</th>
                        <th>Suppression</th>
                        <th>Modifier</th>
                    </thead>
                    <tr>
                        <?php while($ligne = $sql->fetch()){ ?>
                        <td><?php echo $ligne['titre_competence'].'<br>'; ?> </td>
                        <td><?php echo $ligne['competences'].'<br>'; ?> </td>
                        <td><a href="competences.php?id_competences=<?php echo $ligne['id_competences']; ?>"> <img src="../img/delete.png" style="width: 30px; height: 30px;"></a></td>
                        <td><a href="modif_competences.php?id_competences=<?php echo $ligne['id_competences']; ?>"><img src="../img/edit.png" style="width: 30px; height: 30px;">    </a></td>
                        <!-- //On modifie competence (cf modif_competences.php) -->
                    </tr>
                    <?php } ?>
                </table>
        </div>

    </div>
</body>



</html>
