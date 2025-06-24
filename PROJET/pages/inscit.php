<?php
    //récupération des données du formulaire
    $nom = htmlspecialchars($_POST['fullname']);
    $postnom = htmlspecialchars($_POST['Post-nom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $date = htmlspecialchars($_POST['date']);
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
    $req = $bdd->prepare("INSERT INTO incription (nom, postnom, email, password, date_naissance, genre) VALUES (:nom, :postnom, :email, :password, :date, :genre)");
    $req->bindParam(':nom', $nom);
    $req->bindParam(':postnom', $postnom);
    $req->bindParam(':email', $email);
    $req->bindParam(':password', $password);
    $req->bindParam(':date', $date);
    $req->bindParam(':genre', $genre);
    $req->execute();
?> 