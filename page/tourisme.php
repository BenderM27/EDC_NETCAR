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
    
        $sql = "SELECT clim, porte, passager, coffre, prix, modele, marque from vehicule_tourisme;";
    
        $result = executeSQL($sql);
    
        if($result) {
            while ($row = mysqli_fetch_array($result)) {
          ?>


    <div class="vehicule_tourisme">
        <h5>Marque : <?php echo $row['marque']; ?></h5>
        <h5>Modèle : <?php echo $row['modele']; ?></h5>
        <h5>Climatisaiton :
            <?php if ($row['clim'] == 1){
                    echo "Disponible";
                } else {
                    echo "Indisponible";
                }
            ?>
        </h5>
        <h5>Nb de porte : <?php echo $row['porte']; ?></h5>
        <h5>Nb maximum de passager : <?php echo $row['passager']; ?></h5>
        <h5>Capacité du coffre : <?php echo $row['coffre']; ?> Litre</h5>
        <h5>Prix/jour : <?php echo $row['prix']; ?>€</h5>

        <a href="reservation.php">Choisir ce véhicule</a>
    </div>

    <?php     
            }
        }
    
    ?>

</body>

</html>
