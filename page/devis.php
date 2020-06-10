<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETCAR</title>
    <link rel="stylesheet" href="../lib/bootstrap4/css/bootstrap.css">
    <script src="../lib/jquery/jquery3.5.1.min.js"></script>
    <script src="../fonction/fonction.js"></script>
    <?php include "../fonction/connect.php" ?>
</head>

<body>

    <?php
    $agence_dep = $_SESSION['id_agence_dep'];
    $agence_arriv = $_SESSION['id_agence_arriv'] = $_POST['id_agence_arriv'];
    $date_dep = $_SESSION['date_dep'] = $_POST['date_dep'];
    $heure_dep = $_SESSION['heure_dep'] = $_POST['heure_dep'];
    $date_arriv = $_SESSION['date_arriv'] = $_POST['date_arriv'];
    $heure_arriv = $_SESSION['heure_arriv'] = $_POST['heure_arriv'];
    $_SESSION['nom_ville'];
    $_SESSION['prix'] = 0;
    $categ_vehicule = $_SESSION['categ'];
    $ID_vehicule = $_SESSION['id_vehicule'];
    
    $insert_reserv = "insert into reservation(agence_dep,agence_arriv,categ_vehicule,ID_vehicule,date_dep,date_arriv) 
    values($agence_dep,$agence_arriv,'$categ_vehicule',$ID_vehicule,'$date_dep $heure_dep:00','$date_arriv $heure_arriv:00');";
    
    $result = executeSQL($insert_reserv);
    
    $select_agence_arriv = "select ville from agence where id = '$_SESSION[id_agence_arriv]'";
    
    $result = executeSQL($select_agence_arriv);
    
    if($result) {
            while ($row = mysqli_fetch_array($result)) {
                $_SESSION['nom_ville'] = $row['ville'];
            }
    }
    
    $select_prix = "select prix from vehicule_$_SESSION[categ] where id = $ID_vehicule;";
    $result = executeSQL($select_prix);
    
    if($result) {
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['prix'] = $row['prix'];
        }
    }
            


    ?>

    <h1> Devis de votre résevation </h1>

    Vous partez de l'agence de <b><?php echo $_SESSION['agence']; ?></b> le <b><?php echo $_SESSION['date_dep']; ?></b> à <b><?php echo $_SESSION['heure_dep']; ?></b><br /><br />

    Vous rendrez le véhicule dans l'agence de <b><?php echo $_SESSION['nom_ville']; ?></b> le <b><?php echo $_SESSION['date_arriv']; ?></b> à <b><?php echo $_SESSION['heure_arriv']; ?></b><br /><br />

    Véhicule de type <b><?php echo $_SESSION['categ']; ?></b> choisis : <b><?php echo $_SESSION['le_vehicule']; ?></b><br /><br />

    Si ce devis vous conviens veuillez remplir ce formulaire et effectuer le payement :<br />
    <form action="devis_rempli.php" method="post">
        êtes vous un client fidèle ? <input name="id_client" id="id_client" placeholder="Insérer votre code client">
        <input type="submit" value="Valider" onclick="recherche_client()"><br />
        <h5 id="erreur" style="color : red"></h5><br />

    </form>

    <form action="devis_fini.php" method="post">

        Civilité : <input type="radio" name="civilite" id="civilite" value="M" required><label for="civilite">M</label>
        <input type="radio" name="civilite" id="civilite" value="Mme"><label for="civilite" required>Mme</label><br /><br />
        Nom : <input name="nom" id="nom" required><br /><br />
        Prénom : <input name="prenom" id="prenom" required><br /><br />
        Adresse : <input name="rue" id="rue" required><br /><br />
        Code Postale : <input name="cp" id="cp" required><br /><br />
        Ville : <input name="ville" id="ville" required><br /><br />
        Téléphone : <input name="telephone" id="telephone" required><br /><br />
        Adresse mail : <input name="mail" id="mail" required><br /><br />
        Date de naissance : <input type="date" name="naissance" id="naissance" required><br /><br />
        Délivrance du permis : <input type="date" name="delivrance_permis" id="delivrance_permis" required><br /><br />
        Choix du mode de payement : <input type="radio" name="mode_payement" id="mode_payement" value="CB" required><label for="mode_payement"> Carte bancaire</label>
        <input type="radio" name="mode_payement" id="mode_payement" value="Sur place"><label for="mode_payement" required> Payement sur place</label><br /><br />

        <input type="submit">

    </form>


</body>

</html>
