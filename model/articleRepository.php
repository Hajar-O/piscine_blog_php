<?php

class ArticleRepository {

    public function findArticle(){

        $DBconnection = new DBconnection();
        $pdo = $DBconnection -> connect();

        $stmt = $pdo->query("SELECT * FROM article");
        // retourne dans un tableau tous les produits.
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }
};