<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 1 - Votre âge</title>
</head>
<body>
<?php

$annee = $_POST['annee'];
$mois  = $_POST['mois'];
$jour  = $_POST['jour'];


$anneeActuelle = date("Y");
$moisActuel    = date("m");
$jourActuel    = date("d");

// Calcul de l'âge
$age = $anneeActuelle - $annee;

// Si l'anniversaire n'est pas encore passé cette année, on retire 1 an
if ($moisActuel < $mois || ($moisActuel == $mois && $jourActuel < $jour)) {
    $age--;
}
?>

    <h1>EXERCICE 1</h1>
    <p>Vous êtes né(e) le <?php echo $jour . "/" . $mois . "/" . $annee; ?>.</p>
    <p>Vous avez <?php echo $age; ?> ans.</p>

</body>
</html>
