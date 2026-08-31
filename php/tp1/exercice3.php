<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 3 - Je suis trop fort</title>
</head>
<body>
    <h1>EXERCICE 3</h1>

    <form action="exercice3.php" method="post">
        <p>
            Saisissez un nombre : <input type="text" name="nombre">
        </p>
        <input type="submit" value="Envoyer">
    </form>

<?php
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];

    for ($i = 0; $i < $nombre; $i++) {
        echo "<p>je suis trop fort</p>";
    }
}
?>

</body>
</html>
