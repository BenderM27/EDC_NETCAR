<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETCAR</title>
    <?php include "../fonction/connect.php" ?>
</head>

<body>
    <h1> Voici les véhicule de tourisme disponible </h1>
    <?php
    
        $sql = "SELECT charge_utile, longueur, largeur, hauteur, prix, modele, marque from vehicule_utilitaire;";
    
        $result = executeSQL($sql);
    
        if($result) {
            while ($row = mysqli_fetch_array($result)) {
          ?>


    <div class="vehicule_utilitaire">
        <h5>Marque : <?php echo $row['marque']; ?></h5>
        <h5>Modèle : <?php echo $row['modele']; ?></h5>
        <h5>Charge utile : <?php echo $row['charge_utile'] ?> Kg</h5>
        <h5>Longueur : <?php echo $row['longueur']; ?></h5>
        <h5>Largeur : <?php echo $row['largeur']; ?></h5>
        <h5>Hauteur : <?php echo $row['hauteur']; ?> Litre</h5>
        <h5>Prix/jour : <?php echo $row['prix']; ?>€</h5>

        <a href="reservation.php">Choisir ce véhicule</a>
    </div>

    <?php     
            }
        }
    
    ?>

</body>

</html>