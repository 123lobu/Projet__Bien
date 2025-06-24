<?php
    //récupération des données du formulaire
    $nom = htmlspecialchars($_POST['fullname']);
    $postnom = htmlspecialchars($_POST['Postnom']);
    $email = htmlspecialchars($_POST['email']);
    $motdepasse = htmlspecialchars($_POST['motdepasse']);
    $dates = htmlspecialchars($_POST['dates']);
    $genre = htmlspecialchars($_POST['genre']);

    //connexion à la base de données
    try{
        $bdd = new PDO("mysql:host=localhost;dbname=projet", "root", "");
        echo 'connexion établie et encore';
    }
    catch(Exception $e){
        die('Erreur: ' .$e->getMessage());
    }
    //requête sql
    $req = $bdd->prepare("INSERT INTO incription (nom, postnom, email, motdepasse, date_naissance, genre) VALUES (:nom, :postnom, :email, :motdepasse, :dates, :genre)");
    $req->bindParam(':nom', $nom);
    $req->bindParam(':postnom', $postnom);
    $req->bindParam(':email', $email);
    $req->bindParam(':motdepasse', $motdepasse);
    $req->bindParam(':dates', $dates);
    $req->bindParam(':genre', $genre);
    $req->execute();
?> 