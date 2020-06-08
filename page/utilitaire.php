<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETCAR</title>
    <link rel="stylesheet" href="../lib/bootstrap4/css/bootstrap.css">
    <?php include "../fonction/connect.php" ?>
</head>

<body>
    <?php
    $_SESSION['categ'] = 'Utilitaire';
    ?>
    
    <h2>Agence : <?php echo $_SESSION['agence']; ?></h2>
    <h2>Catégorie : Utilitaire</h2>
    <h1> Voici les véhicule de tourisme disponible </h1>
    <?php
    
        $sql = "SELECT id, charge_utile, longueur, largeur, hauteur, prix, modele, marque from vehicule_utilitaire;";
    
        $result = executeSQL($sql);
    
        if($result) {
            while ($row = mysqli_fetch_array($result)) {
          ?>


    <div class="vehicule_utilitaire">
        <form action="reservation.php" method="POST">
        <h5>Marque : <?php echo $row['marque']; ?></h5>
        <h5>Modèle : <?php echo $row['modele']; ?></h5>
        <h5>Charge utile : <?php echo $row['charge_utile'] ?> Kg</h5>
        <h5>Longueur : <?php echo $row['longueur']; ?></h5>
        <h5>Largeur : <?php echo $row['largeur']; ?></h5>
        <h5>Hauteur : <?php echo $row['hauteur']; ?> Litre</h5>
        <h5>Prix/jour : <?php echo $row['prix']; ?>€</h5>
        <input name="le_vehicule" id="le_vehicule" value="<?php echo $row['marque'] .' '. $row['modele'] ;?>"hidden>
        <input name="id_vehicule" id="id_vehicule" value="<?php echo $row['id'];?>"hidden>
        <input type="submit" value="Choisir ce véhicule">
        </form>
    </div>

    <?php     
            }
        }
    
    ?>

</body>

</html>
