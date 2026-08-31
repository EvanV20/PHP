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
            <form action="submitassosciation.php" method="post">
                <div class="form-group">
                    <div>
                        <label for="prof-select">Bienvenu entres vos information&nbsp;:</label>
                    </div>
                    <div>
                        <label>Nom&nbsp;:</label>
                        <input type="text" name="nom" id="nom-input">
                    </div>
                    <div>
                        <label>age&nbsp;:</label>
                        <input type="text" name="age" id="age-input">
                    </div>
                    <div>
                        <label>mail&nbsp;:</label>
                        <input type="email" name="mail" id="mail-input">
                    </div>
                    <div>
                        <label>don&nbsp;:</label>
                        <input type="text" name="don" id="don-input">
                    </div>
                </div>
                <input type="submit" value="Submit">
            </form>
            <button onclick="window.location.href='resultats.php'">Résultats</button>
        </div>
        <div class="footer-bar"></div>
    </div>
</body>
</html>
