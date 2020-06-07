<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETCAR</title>
    <?php include "../fonction/connect.php" ?>
</head>

<body>
    <?php
    $_SESSION['categ'] = 'Tourisme';
    ?> 
    
    <h2>Agence : <?php echo $_SESSION['agence']; ?></h2>
    <h2>Catégorie : Tourisme</h2>
    <h1> Voici les véhicule de tourisme disponible </h1>
    <?php
    
        $sql = "SELECT id, clim, porte, passager, coffre, prix, modele, marque from vehicule_tourisme;";
    
        $result = executeSQL($sql);
    
        if($result) {
            while ($row = mysqli_fetch_array($result)) {
          ?>


    <div class="vehicule_tourisme">
        <form action="reservation.php" method="POST">
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
