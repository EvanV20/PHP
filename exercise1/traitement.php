<?php
$profs = [
    'girod'        => 'GIROD',
    'agostinelli'  => 'AGOSTINELLI',
    'donne'        => 'DONNE',
    'vogler'       => 'VOGLER',
];

$cours = [
    'anglais'  => 'Anglais',
    'francais' => 'Français',
    'hardware' => 'Hardware',
    'software' => 'Software',
    'flash'    => 'Flash',
    'visite'   => 'visite Annecy',
];

$prof = trim($_POST['prof'] ?? '');
$cour = trim($_POST['cour'] ?? '');
$text = trim($_POST['text'] ?? '');

$erreurs = [];

if (!isset($profs[$prof])) {
    $erreurs[] = 'nom du professeur';
}

if (!isset($cours[$cour])) {
    $erreurs[] = 'nom du cours';
}

if (!ctype_digit($text)) {
    $erreurs[] = 'nombre de cours';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1 : ACHAT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="layout">
        <div class="logo-box">
            <img src="../assets/php-elephant.svg" alt="Logo PHP">
        </div>
        <div class="top-bar">
            <h1>Exercice 1 : ACHAT</h1>
        </div>
        <div class="sidebar">
            <nav>
                <a href="../index.php">Accueil</a>
                <a href="exercise1.php" class="active">Exercice 1 : ACHAT</a>
                <a href="../exercise2/association.php">Exercice 2 : DONS</a>
            </nav>
        </div>
        <div class="content">
            <?php if (!empty($erreurs)) : ?>
                <p>Les champs suivants n'ont pas été saisis :</p>
                <ul class="erreurs">
                    <?php foreach ($erreurs as $champ) : ?>
                        <li><?= htmlspecialchars($champ) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>
                    Vous avez commandé <?= (int) $text ?> cours de
                    <?= htmlspecialchars($cours[$cour]) ?>
                    auprès du professeur <?= htmlspecialchars($profs[$prof]) ?>.
                </p>
            <?php endif; ?>

            <button onclick="window.location.href='exercise1.php'">Retour</button>
        </div>
        <div class="footer-bar"></div>
    </div>
</body>
</html>
