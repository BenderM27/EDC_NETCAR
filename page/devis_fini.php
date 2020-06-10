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
    $civilite = $_POST['civilite'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['rue'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];
    $mail = $_POST['mail'];
    $naissance = $_POST['naissance'];
    $delivrance_permis = $_POST['delivrance_permis'];
    $mode_payement = $_POST['mode_payement'];
    
    
    
    
    ?>

    <h1>Bravo ! Votre devis est complet </h1>
