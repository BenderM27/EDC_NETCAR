<?php session_start(); ?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETCAR</title>
    <link rel="stylesheet" href="">
    <?php include "../fonction/connect.php" ?>
</head>

<body>
    <?php 
    $_SESSION['le_vehicule'] = $_POST['le_vehicule'];
    $_SESSION['id_vehicule'] = $_POST['id_vehicule'];
    ?>
    <h2>Agence : <?php echo $_SESSION['agence']; ?></h2>
    <h2>Catégorie : <?php echo $_SESSION['categ']; ?></h2>
    <h2>Véhicule : <?php echo $_SESSION['le_vehicule']; ?></h2>
    <h1> Réservation de véhicule </h1>
    <form action="devis.php" method="POST" class="form_reservation">
        Date de début de réservation : <input type="date" name="date_dep" id="date_dep" required><br /><br />

        Date à laquel vous voulez rendre le véhicule : <input type="date" name="date_arriv" id="date_arriv" required><br /><br />

        Agence dans laquel vous voulez rendre le véhicule : <select>
            <?php $sql = "SELECT id, ville FROM agence;";
    
        $result = executeSQL($sql);
    
        if($result) {
            while ($row = mysqli_fetch_array($result)) {
        ?>

            <option value="<?php echo $row['id']; ?>" name="id_agence_arriv" id="id_agence_arriv"><?php echo $row['ville']; ?></option>
            <?php } }?>
        </select><br /><br />
        <input type="submit" value="Voir mon devis">
    </form>

</body>

</html>
