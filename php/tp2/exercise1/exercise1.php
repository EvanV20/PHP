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
            <form action="traitement.php" method="post">
                <div class="form-group">
                    <label for="prof-select">Choisissez un Professeur&nbsp;:</label>
                    <select name="prof" id="prof-select">
                        <option value="">--Veuillez choisir une option--</option>
                        <option value="girod">M. GIROD</option>
                        <option value="agostinelli">Made. AGOSTINELLI </option>
                        <option value="donne">Made. DONNE</option>
                        <option value="vogler">Made VOGLER</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cour-select">Choisissez un Cours&nbsp;:</label>
                    <select name="cour" id="cour-select">
                        <option value="">--Veuillez choisir une option--</option>
                        <option value="anglais">Cours Anglais</option>
                        <option value="francais">Cours Français</option>
                        <option value="hardware">Cours hardware</option>
                        <option value="software">Cours software</option>
                        <option value="flash">Flash</option>
                        <option value="visite">visite annecy</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="text">nombre de cour commandé&nbsp;:</label>
                    <input type="text" id="text" name="text">
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="footer-bar"></div>
    </div>
</body>
</html>
