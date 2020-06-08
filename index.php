<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETCAR</title>
    <link rel="stylesheet" href="lib/bootstrap4/css/bootstrap.css">
    <?php include "fonction/connect.php" ?>
</head>

<body>
    <h1> Bienvenue sur NetCar </h1>
    <h3> Veuillez choisir votre agence </h3>

    <?php
    
        $sql = "SELECT id,ville,lundi,mardi,mercredi,jeudi,vendredi,samedi,dimanche FROM agence, horaire WHERE ID = ID_agence;";
    
        $result = executeSQL($sql);
    
        if($result) {
            while ($row = mysqli_fetch_array($result)) {
          ?>


    <div class="agences">
        <form action="page/choix_categ.php" method="POST">
            <h5>Ville : <?php echo $row['ville']; ?></h5>
            <h5>Horaire : </h5>
            <table>
                <tr>
                    <th>Lundi : </th>
                    <th><?php echo $row['lundi']; ?></th>
                </tr>
                <tr>
                    <th>Mardi : </th>
                    <th><?php echo $row['mardi']; ?></th>
                </tr>
                <tr>
                    <th>Mercredi : </th>
                    <th><?php echo $row['mercredi']; ?></th>
                </tr>
                <tr>
                    <th>Jeudi : </th>
                    <th><?php echo $row['jeudi']; ?></th>
                </tr>
                <tr>
                    <th>Vendredi : </th>
                    <th><?php echo $row['vendredi']; ?></th>
                </tr>
                <tr>
                    <th>Samedi : </th>
                    <th><?php echo $row['samedi']; ?></th>
                </tr>
                <tr>
                    <th>Dimanche : </th>
                    <th><?php echo $row['dimanche']; ?></th>
                </tr>
            </table>
            <input name="agence" id="agence" value="<?php echo $row['ville']; ?>" hidden>
            <input name="id_agence_dep" id="id_agence_dep" value="<?php echo $row['id']; ?>" hidden>
            <input type="submit" value="Choisir cette agence">
        </form>
    </div>

    <?php     
            }
        }
    
    ?>

</body>

</html>
