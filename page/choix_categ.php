<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
</head>

<body>
    <?php
    $_SESSION['agence'] = $_POST['agence'];
    $_SESSION['id_agence_dep'] = $_POST['id_agence_dep'];
    ?>
    <h2>Agence : <?php echo $_SESSION['agence']; ?></h2>
    <h1>Veuillez choisir la catégorie de véhicule voulu : </h1>
    <h3><a href="tourisme.php">Tourisme</a></h3>
    <h3><a href="utilitaire.php">Utilitaire</a></h3>


</body>
</html>
