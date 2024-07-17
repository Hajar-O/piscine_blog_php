<?php

class ArticleRepository {

    public function findArticle(){
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
};