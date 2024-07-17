<?php

require_once ("../config/config.php");
class AddArticleController{

    public function addArticle()
    {
        // j'établie la connexion à la BDD.
        $DBconnection = new DBconnection();
        $pdo = $DBconnection->connect();


        // Définir les paramètres et exécuter
        $title = "Mon nouvel article ";
        $content = " lorem ipsum la piscine blabla blabla";
        $date = "2024-07-17";

        // Préparer la requête d'insertion. la vérification des données fournis par l'utilisateur est fait avec le 'prepare' et 'bindParam'
        $sql = "INSERT INTO article (title, content, created_at) VALUES (:title, :content, :created_at)";
        $stmt=$pdo->prepare($sql);


// on remplace les paramètres par les vraies valeurs:

        // On réalise l'opération sur plusieurs étapes pour éviter les injections externieurs SQL.
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':created_at', $date);

// Exécuter la requête
        if ($stmt->execute()){
            echo "Nouvel article ajouté avec succès";
        } else {
            echo "Erreur lors de l'ajout de l'article";
        }
    }
}

$AddArticleController = new AddArticleController();
$AddArticleController->addArticle();

