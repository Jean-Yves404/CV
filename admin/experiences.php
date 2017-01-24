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



<?php // On insère une compétence
    
        if($_POST){

            $description = addslashes($_POST['description']);
            $date = addcslashes($_POST['dates']);
            $titre_exp = addslashes($_POST['titre_exp']);
            $sous_titre_exp = addcslashes($POST['sous_titre_exp']);

        $pdo->exec("INSERT INTO experiences VALUES ('', '$titre_exp','$sous_titre_exp','$date', '$description')");
            header('location:../admin/experiences.php');
            exit();

    }// ferme le if
      

//on supprime competence

if(isset($_GET['id_experiences'])){
    $suppression = $_GET['id_experiences'];
    $sql = "DELETE FROM experiences WHERE id_experiences =
     '$suppression'";
    $pdo -> query($sql);
}

?>


<?php require ("../connexion/connexion.php"); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <title>Expériences</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
    <?php include('menu_nav.php'); ?>
    <?php include('suppression_loisirs.php'); ?>

<body>
    <div id="contenu">
        <header>
    
        </header>
        <h1> Expériences    </h1>
        <div id="menu">
            <h2>Connexion : déconnexion</h2>
        </div>

        <div id="contenuPrincipal">
            <div>
                <form action="" method="POST">
                    <table width="200px" border="1">
                    <thead>
                        <th></th>
                        <th>Titre </th>
                        <th>Expériences</th>
                    </thead>
                        <tr>
                            <td>Expériences</td>
                            <td><input type="text" name="titre_exp" id="titre_exp" size="50" required></td>
                            <td><textarea id="" name="description" id="description" size="50" required></td>
                            <td><input type="text" name="sous_titre_exp" id="sous_titre_exp" size="50" required></td>
                            <td><input type="text" name="dates" id="dates" size="50" required></td>

                        </tr>

                        <tr>
                            <td colspan="2"><input type="submit" value="Ajouter une éxperience"></td>
                        </tr>
                    </table>
                </form>
            </div>
                <?php
                    $sql = $pdo->prepare("SELECT * FROM experiences");
                    $sql->execute(); // execute la
                    $nbr_experiences = $sql->rowCount(); // compte les lignes
                ?>
                <p>Vous avez <?php echo $nbr_experiences; ?> éxpériences   </p>
                <table border="2">
                    <caption>Liste des éxpériences</caption>
                    <thead>
                        <th>Titre de l'éxpérience</th>
                        <th>Compétences</th>
                        <th>Suppression</th>
                        <th>Modifier</th>
                    </thead>
                    <tr>
                        <?php while($ligne = $sql->fetch()){ ?>
                        <td><?php echo $ligne['titre_exp'].'<br>'; ?> </td>
                        <td><?php echo $ligne['sous_titre_exp'].'<br>'; ?> </td>
                        <td><a href="experiences.php?id_competence=<?php?>"> <img style="width: 30px; height: 30px;" src="../img/delete.png"></a></td>
                        <td><a href="modif_experiences.php?id_competence=<?php ?>"><img style="height: 30px; width: 30px;"  src="../img/edit.png">    </a></td>
                        <!-- //On modifie competence (cf modif_experiences.php) -->
                    </tr>
                    <?php } ?>
                </table>
        </div>

    </div>
</body>

</html>