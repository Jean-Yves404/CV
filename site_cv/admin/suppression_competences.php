<?php
if (isset($_GET['action']) && $_GET['action'] == 'suppression'){
     $resultat = $pdo -> prepare("SELECT * FROM competences WHERE id_competences = :id_competences");
     $resultat -> bindParam(':id_competences',$_GET['id_competences'],PDO::PARAM_INT);
     $resultat -> execute();
     // Le resultat doit apparaitre sousforme de tableau on fait un PDO::FETCH_ASSOC
      $produit_a_supprimer = $resultat -> fetch(PDO::FETCH_ASSOC);

      $resultat = $pdo -> prepare("DELETE FROM competences WHERE id_competences = :id_competences");
      $resultat -> bindParam(':id_loisir',$_GET['competences'],PDO::PARAM_INT);
      $resultat -> execute();
      $produit .= '<div class="validation">La competence <b>'. $_GET['id_competences'] . '</b> a bien été supprimé</div>';
      //$_GET['action'] = 'affichage';
      header('location:?action=affichage');
 }
 ?>