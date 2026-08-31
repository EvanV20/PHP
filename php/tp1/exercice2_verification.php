<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 2 - Résultat</title>
</head>
<body>
    <h1>EXERCICE 2</h1>

<?php
$motdepasse = $_POST['motdepasse'];

if ($motdepasse != "3XrZ") {
    echo "<p>erreur de mot de passe !</p>";
} else {
    echo "<p>Bonjour 007</p>";
}
?>

</body>
</html>
