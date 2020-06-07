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
    $agence_dep = $_SESSION['id_agence_dep'];
    $agence_arriv = $_POST['id_agence_arriv'];
    $categ_vehicule = $_SESSION['categ'];
    $ID_vehicule = $_SESSION['id_vehicule'];
    $date_dep = $_POST["date_dep"];
    $date_arriv = $_POST["date_arriv"];
    
    echo $agence_dep.' - '.$agence_arriv.' - '.$categ_vehicule.' - '.$ID_vehicule.' - '.$date_dep.' - '.$date_arriv;
    
    ?>
   
   
    <h1> Devis de votre résevation </h1>
   <form action="devis.php" method="POST" class="form_reservation">
    Date de début de réservation : <input type="date" name="date_dep" id="date_dep" required><br /><br />
    
    Date à laquel vous voulez rendre le véhicule : <input type="date" name="date_arr" id="date_arr" required><br /><br />
    
    Agence dans laquel vous voulez rendre le véhicule : <select>
        <?php $sql = "SELECT ville FROM agence;";
    
        $result = executeSQL($sql);
    
        if($result) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
        
        <option value="agence_arriv"><?php echo $row['ville']; ?></option>
        <?php } }?>
    </select><br /><br />
    <input type="submit" value="Voir mon devis">
    </form>
        
</body>
</html>
