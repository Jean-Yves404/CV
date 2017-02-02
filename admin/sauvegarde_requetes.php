<?php
// SELECT un e seule réponse
$bdd = $pdo -> query ("SELECT * FROM titre");
$titre = $bdd -> fetch();

// SELECT plusieurs réponses
$bdd = $pdo -> prepare ("SELECT * FROM formation");
$formation = $bdd -> execute();

?>