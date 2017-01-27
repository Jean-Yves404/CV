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
    if(isset($_POST['titre_exp'])){ // On vérifie si on insert une nouvelle compétence
        if($_POST['titre_exp']!='' && $_POST['sous_titre_exp']!='' && $_POST['dates']!='' && $_POST['description']!=''){
            $titre_exp = addslashes($_POST['titre_exp']);
            $sous_titre_exp = addslashes($_POST['sous_titre_exp']);
            $dates = addslashes($_POST['date_exp']);
            $description = addslashes($_POST['description']);
            $id_experiences = addslashes($_POST['id_experiences']);

        $pdo->exec("INSERT INTO experiences VALUES (NULL, '$titre_exp', '$sous_titre_exp ', '$dates', '$description', 'id_experiences' '1')");
            header('location: ../admin/experiences.php');
            exit();

            }//←fermeture du if
        } //←fermeture du isset

//↓ Suppression d'une experience ↓
    if(isset($_GET['id_experience'])){
    $suppression = $_GET['id_experience'];
    $sql = "DELETE FROM experiences WHERE id_experiences = '$suppression'";
    $pdo -> query($sql);
    }
    
// Modification Expérience:
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
        $sql = $pdo->query("SELECT * FROM utilisateur") ;
        $ligne = $sql->fetch();
        ?>
        <meta charset="utf-8">
        <title > <?php echo 'Expériences | ' . $ligne['nom'].' '.$ligne['prenom']; ?></title>
        <link rel="stylesheet" type="text/css" href="../css/style.css"> <!-- ←Feuille de style -->
        <!-- ↓ Ck Editor ↓ -->
        <script src="../ckeditor/ckeditor.js"></script>
        <!-- ↑ CK Editor ↑ -->
    </head>

    <body>
        <header>
            <?php require("../admin/menu_nav.php"); ?>
        </header>
            <h1> Les expériences</h1>

        <div class="wrapper">
                <form action="experiences.php" method="POST" id="formExp">
                    <table width="200px" border="">
                        <tr>                    
                            <td>Titre experience</td> 
                            <td><input type="text" name="titre_exp" size="50" value="" required></td>                           
                        </tr>
                        <tr>
                            <td>Sous-Titre experience</td> 
                            <td><input type="text" name="sous_titre_exp" value="" size="50"  required></td>                           
                        </tr>
                        <tr>    
                            <td>Date</td> 
                            <td><input type="text" name="dates" value="" size="50"  required></td>                           
                        </tr>
                        <tr>
                            <td>Description</td> 
                            <td><textarea id="editor1" name="description" value="" size="100" cols="80" rows="10" required></textarea>
                            <script>CKEDITOR.replace('editor1');</script></td>                          
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Insérer une experience"></td>
                        </tr>
                    </table>    
                </form>
        </div>

        <div class="wrapper">
                <?php 
                    $sql = $pdo->prepare("SELECT * FROM experiences");
                    $sql->execute(); // execute la 
                    $nbr_experience = $sql->rowCount(); // compte les lignes
                ?>
                    
                    <br><br><br>
                    <table border="2">
                        <caption>Liste des expériences</caption>
                            <thead>
                                <th>Titre de l'experience</th>
                                <th>Sous-titre</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </thead>
                            <tr>
                                <?php while($ligne = $sql->fetch()){ ?>
                                <td> <?= $ligne['titre_exp'].'<br>' ?></td>
                                <td> <?= $ligne['sous_titre_exp'].'<br>'?></td>
                                <td> <?= $ligne['dates'].'<br>'?></td>
                                <td> <?= $ligne['description'].'<br>'?></td>  
                                <td><a href="modif_experiences.php?id_experiences=<?= $ligne['id_experiences']; ?>"><img src="../img/edit.png" style="width: 50px;"></a></td>
                                <td><a href="experiences.php?id_experiences=<?= $ligne['id_experiences']; ?>"><img src="../img/delete.png" style="width: 50px;"></a></td>
                            </tr>   
                    <?php };?>
                    </table>
        </div>
        <?php include('menu_footer.php'); ?>
    </body>
</html>