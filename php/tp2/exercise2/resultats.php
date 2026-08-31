<?php

use Amenadiel\JpGraph\Graph\Graph;
use Amenadiel\JpGraph\Plot\BarPlot;

function chargerDons(string $fichier): array
{
    $dons = [];

    if (file_exists($fichier)) {
        $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lignes as $ligne) {
            $champs = array_map('trim', explode('|', $ligne));
            if (count($champs) === 4) {
                $dons[] = [
                    'nom'  => $champs[0],
                    'age'  => (int) $champs[1],
                    'mail' => $champs[2],
                    'don'  => (float) $champs[3],
                ];
            }
        }
    }

    return $dons;
}

function afficherGraphique(array $dons): void
{
    require __DIR__ . '/jpgraph/src/config.inc.php';

    $noms     = array_column($dons, 'nom');
    $montants = array_column($dons, 'don');
    $largeur  = max(500, count($dons) * 90 + 150);

    $graph = new Graph($largeur, 400);
    $graph->SetScale('textlin');
    $graph->SetMargin(90, 40, 50, 100);

    $graph->title->Set('Dons reçus par donateur');
    $graph->title->SetFont(FF_DV_SANSSERIF, FS_BOLD, 14);

    $graph->xaxis->SetTickLabels($noms);
    $graph->xaxis->SetLabelAngle(30);
    $graph->yaxis->title->Set('Montant du don (€)');
    $graph->yaxis->title->SetFont(FF_DV_SANSSERIF, FS_NORMAL, 10);
    $graph->yaxis->SetTitleMargin(35);

    $barPlot = new BarPlot($montants);
    $barPlot->SetFillColor('#6c5ce7');
    $barPlot->SetColor('#4834d4');
    $barPlot->value->Show();
    $barPlot->value->SetFormat('%d €');

    $graph->Add($barPlot);
    $graph->Stroke();
}

$dons = chargerDons(__DIR__ . '/resultats.txt');

if (isset($_GET['graphique'])) {
    afficherGraphique($dons);
    exit;
}

$nbDons     = count($dons);
$totalDons  = array_sum(array_column($dons, 'don'));
$moyenneAge = $nbDons > 0 ? array_sum(array_column($dons, 'age')) / $nbDons : 0;
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
            <h2>Résultats des dons</h2>

            <?php if ($nbDons === 0) : ?>
                <p>Aucun don enregistré pour le moment.</p>
            <?php else : ?>
                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Age</th>
                        <th>Mail</th>
                        <th>Don (€)</th>
                    </tr>
                    <?php foreach ($dons as $d) : ?>
                    <tr>
                        <td><?= htmlspecialchars($d['nom']) ?></td>
                        <td><?= $d['age'] ?></td>
                        <td><?= htmlspecialchars($d['mail']) ?></td>
                        <td><?= number_format($d['don'], 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>

                <div class="stats">
                    <p>Nombre de dons&nbsp;: <strong><?= $nbDons ?></strong></p>
                    <p>Somme globale reçue&nbsp;: <strong><?= number_format($totalDons, 2) ?> €</strong></p>
                    <p>Moyenne d'âge des donateurs&nbsp;: <strong><?= number_format($moyenneAge, 1) ?> ans</strong></p>
                </div>

                <h2>Graphique des dons</h2>
                <img src="resultats.php?graphique" alt="Graphique des dons par donateur (JpGraph)">
            <?php endif; ?>

            <div>
                <button onclick="window.location.href='association.php'">Retour au formulaire</button>
            </div>
        </div>
        <div class="footer-bar"></div>
    </div>
</body>
</html>
