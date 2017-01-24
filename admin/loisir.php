<?php require ("../connexion/connexion.php");

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
<head>
<meta charset="utf-8">
    <title>Loisirs</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
    <?php include('menu_nav.php'); ?>
    <?php include('suppression_loisirs.php'); ?>