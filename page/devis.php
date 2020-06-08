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
    $agence_dep = $_SESSION['id_agence_dep'];
    $agence_arriv = $_POST['id_agence_arriv'];
    $categ_vehicule = $_SESSION['categ'];
    $ID_vehicule = $_SESSION['id_vehicule'];
    $date_dep = $_POST['date_dep'];
    $heure_dep = $_POST['heure_dep'];
    $date_arriv = $_POST['date_arriv'];
    $heure_arriv = $_POST['heure_arriv'];
    
    
//    $insert_reserv = "insert into reservation(agence_dep,agence_arriv,categ_vehicule,ID_vehicule,date_dep,date_arriv) 
//    values($agence_dep,$agence_arriv,'$categ_vehicule',$ID_vehicule,'$date_dep $heure_dep:00','$date_arriv $heure_arriv:00');";
//    
//    $result = executeSQL($insert_reserv);
    
    $select_agence_arriv = "select ville from agence where id = $agence_arriv";
    
    $result = executeSQL($select_agence_arriv);
    
    if($result) {
            while ($row = mysqli_fetch_array($result)) {
                

    ?>

    <h1> Devis de votre résevation </h1>

    Vous partez de l'agence de <b><?php echo $_SESSION['agence']; ?></b> le : <b><?php echo $date_dep; ?></b> à : <b><?php echo $heure_dep; ?></b><br /><br />
    
    Vous rendrez le véhicule dans l'agence de <b><?php echo $row['ville']; }}; ?></b> le : <b><?php echo $date_arriv; ?></b> à : <b><?php echo $heure_arriv; ?></b><br /><br />
    
    Véhicule de type <b><?php echo $categ_vehicule; ?></b> choisis : <b><?php echo $_SESSION['le_vehicule']; ?></b><br /><br />
    
    Si ce devis vous conviens veuillez remplir ce formulaire et effectuer le payement :<br />
    êtes vous un client fidèle ? <input placeholder="Insérer votre code client"> <button>Valider</button><br /><br />
    <form action="devis_fini.php">
      
       Civilité : <input type="radio" name="civilite" id="civilite" value="M"><label for="civilite">M</label>
       <input type="radio" name="civilite" id="civilite" value="Mme"><label for="civilite">Mme</label><br /><br />
       Nom : <input name="nom" id="nom"><br /><br />
       Prénom : <input name="prenom" id="prenom"><br /><br />
       Adresse : <input name="rue" id="rue"><br /><br />
       Code Postale : <input name="cp" id="cp"><br /><br />
       Ville : <input name="ville" id="ville"><br /><br />
       Téléphone : <input name="telephone" id="telephone"><br /><br />
       Adresse mail : <input name="mail" id="mail"><br /><br />
       Date de naissance : <input type="date" name="naissance" id="naissance"><br /><br />
       Délivrance du permis : <input type="date" name="delivrance_permis" id="delivrance_permis"><br /><br />
       Choix du mode de payement : <input type="radio" name="mode_payement" id="mode_payement" value="CB"><label for="mode_payement">Carte bancaire</label>     
       <input type="radio" name="mode_payement" id="mode_payement" value="Sur place"><label for="mode_payement">Payement sur place</label><br /><br />
       
       <input type="submit">
        
    </form>


</body>

</html>
