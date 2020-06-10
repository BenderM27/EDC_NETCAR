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
    
    $id_client = $_POST['id_client'];
    

    $select_client = "select civilite, fidelise, nom, prenom, rue, cp, ville, telephone, mail, naissance, delivrance_permis, points from client where id = $id_client";
    
    $result = executeSQL($select_client);
    
    if($result) {
            while ($row = mysqli_fetch_array($result)) {
                if($row['fidelise'] == 1) {
                    
                

    ?>

    <h1> Devis de votre résevation </h1>

    Vous partez de l'agence de <b><?php echo $_SESSION['agence']; ?></b> le <b><?php echo $_SESSION['date_dep']; ?></b> à <b><?php echo $_SESSION['heure_dep']; ?></b><br /><br />

    Vous rendrez le véhicule dans l'agence de <b><?php echo $_SESSION['nom_ville']; ?></b> le <b><?php echo $_SESSION['date_arriv']; ?></b> à <b><?php echo $_SESSION['heure_arriv'] ; ?></b><br /><br />

    Véhicule de type <b><?php echo $_SESSION['categ']; ?></b> choisis : <b><?php echo $_SESSION['le_vehicule']; ?></b><br /><br />

    Si ce devis vous conviens veuillez effectuer le payement :<br /><br />
    <form action="devis_fini.php" method="post">

        Civilité : <input type="radio" name="civilite" id="civilite" value="<?php echo $row['civilite'];?>" checked required><label for="civilite"><?php echo $row['civilite']; ?></label><br /><br />
        Nom : <input name="nom" id="nom" value="<?php echo $row['nom']; ?>" required><br /><br />
        Prénom : <input name="prenom" id="prenom" value="<?php echo $row['prenom']; ?>" required><br /><br />
        Adresse : <input name="rue" id="rue" value="<?php echo $row['rue']; ?>" required><br /><br />
        Code Postale : <input name="cp" id="cp" value="<?php echo $row['cp']; ?>" required><br /><br />
        Ville : <input name="ville" id="ville" value="<?php echo $row['ville']; ?>" required><br /><br />
        Téléphone : <input name="telephone" id="telephone" value="<?php echo $row['telephone']; ?>" required><br /><br />
        Adresse mail : <input name="mail" id="mail" value="<?php echo $row['mail']; ?>" required><br /><br />
        Date de naissance : <input name="naissance" id="naissance" value="<?php echo $row['naissance']; ?>" required><br /><br />
        Délivrance du permis : <input name="delivrance_permis" id="delivrance_permis" value=" <?php echo $row['delivrance_permis']; ?>" required><br /><br />
        Vos points de fidélité : <input name="mode_payement" id="mode_payement" value="<?php echo $row['points']; ?>" required><br /><br />
        Choix du mode de payement : <input type="radio" name="mode_payement" id="mode_payement" value="CB" required><label for="mode_payement">Carte bancaire</label>
        <input type="radio" name="mode_payement" id="mode_payement" value="Sur place" required><label for="mode_payement">Payement sur place</label><br /><br />

        <input type="submit" value="Payer">

    </form>

    <?php
                    } else {
                    echo 'erreur';
                        header('Location: devis.php');
                        }
        } 
    }
    ?>


</body>

</html>
