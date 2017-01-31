<?php
if (isset($_GET['action']) && $_GET['action'] == 'suppression'){
     $resultat = $pdo -> prepare("SELECT * FROM experiences WHERE id_experiences = :id_experiences");
     $resultat -> bindParam(':id_experiences',$_GET['id_experiences'],PDO::PARAM_INT);
     $resultat -> execute();
     // Le resultat doit apparaitre sousforme de tableau on fait un PDO::FETCH_ASSOC
      $produit_a_supprimer = $resultat -> fetch(PDO::FETCH_ASSOC);

      $resultat = $pdo -> prepare("DELETE FROM experiences WHERE id_experiences = :id_experiences");
      $resultat -> bindParam(':id_loisir',$_GET['experiences'],PDO::PARAM_INT);
      $resultat -> execute();
      $produit .= '<div class="validation">L experiences <b>'. $_GET['id_experiences'] . '</b> a bien été supprimé</div>';
      //$_GET['action'] = 'affichage';
      header('location:?action=affichage');
 }
 ?>