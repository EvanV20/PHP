<?php

$nom  = isset($_POST['nom'])  ? trim($_POST['nom'])  : '';
$age  = isset($_POST['age'])  ? trim($_POST['age'])  : '';
$mail = isset($_POST['mail']) ? trim($_POST['mail']) : '';
$don  = isset($_POST['don'])  ? trim($_POST['don'])  : '';

$erreurs = [];

if ($nom === '') {
    $erreurs[] = 'nom';
}

if ($age === '' || !ctype_digit($age)) {
    $erreurs[] = 'age';
}

if ($mail === '' || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = 'mail';
}

if ($don === '' || !is_numeric($don) || $don <= 0) {
    $erreurs[] = 'don';
}

if (empty($erreurs)) {
    $ligne = $nom . ' | ' . $age . ' | ' . $mail . ' | ' . $don . PHP_EOL;
    file_put_contents(__DIR__ . '/resultats.txt', $ligne, FILE_APPEND | LOCK_EX);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 2 : DONS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="layout">
        <div class="logo-box">
            <img src="../assets/php-elephant.svg" alt="Logo PHP">
        </div>
        <div class="top-bar">
            <h1>Exercice 2 : DONS</h1>
        </div>
        <div class="sidebar">
            <nav>
                <a href="../index.php">Accueil</a>
                <a href="../exercise1/exercise1.php">Exercice 1 : ACHAT</a>
                <a href="association.php" class="active">Exercice 2 : DONS</a>
            </nav>
        </div>
        <div class="content">
            <?php if (!empty($erreurs)) : ?>
                <p>Les champs suivants n'ont pas été saisis correctement&nbsp;:</p>
                <ul class="erreurs">
                    <?php foreach ($erreurs as $champ) : ?>
                        <li><?= htmlspecialchars($champ) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>Merci pour votre don ! Voici le récapitulatif&nbsp;:</p>
                <p>Nom: <?= htmlspecialchars($nom) ?></p>
                <p>Age: <?= htmlspecialchars($age) ?></p>
                <p>Mail: <?= htmlspecialchars($mail) ?></p>
                <p>Don: <?= htmlspecialchars($don) ?> €</p>
            <?php endif; ?>

            <button onclick="window.location.href='association.php'">Retour</button>
            <button onclick="window.location.href='resultats.php'">Voir les résultats</button>
        </div>
        <div class="footer-bar"></div>
    </div>
</body>
</html>
