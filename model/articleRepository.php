<?php

class ArticleRepository {

    public function findArticles(){
// j'intencie une nouvelle classe BDconnection
        $DBconnection = new DBconnection();
        // j'appelle la méthode qui permet la connexion à la DBB.
        $pdo = $DBconnection -> connect();
// j'utilise le Query() qui permet de faite une requête à la base de données et selectionne toutes colonnes de la table article.
        $stmt = $pdo->query("SELECT * FROM article");
        // retourne dans un tableau tous les produits.
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }
    public function insert ($title,$content, $date){

        // j'établie la connexion à la BDD.
        $DBconnection = new DBconnection();
        $pdo = $DBconnection->connect();

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
};