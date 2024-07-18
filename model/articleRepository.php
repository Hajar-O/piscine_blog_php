<?php

class ArticleRepository {

    private $pdo;
    function __construct() {
        // j'intencie une nouvelle classe BDconnection
        $DBconnection = new DBconnection();
        // j'appelle la méthode qui permet la connexion à la DBB.
        $this->pdo = $DBconnection -> connect();
    }
    public function findArticles(){

// j'utilise le Query() qui permet de faite une requête à la base de données et selectionne toutes colonnes de la table article.
        $stmt = $this->pdo->query("SELECT * FROM article");
        // retourne dans un tableau tous les produits.
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }
    public function insert ($title,$content, $date){

        // j'établie la connexion à la BDD

        // Préparer la requête d'insertion. la vérification des données fournis par l'utilisateur est fait avec le 'prepare' et 'bindParam'
        $sql = "INSERT INTO article (title, content, created_at) VALUES (:title, :content, :created_at)";
        $stmt=$this->pdo->prepare($sql);


        // on remplace les paramètres par les vraies valeurs:

        // On réalise l'opération sur plusieurs étapes pour éviter les injections externieurs SQL.
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':created_at', $date);

// J'enregistre le résultat du booleen dans la variable $isRequestOk.
        $isRequestOk = $stmt->execute();

        return $isRequestOk;
        // Exécuter la requête


    }

    public function findOneById($id){

    // Préparation de la requête SQL.
        $sql = "SELECT * FROM article WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

// Je remplace le parametres par la vraie valeur.
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    //j'exécute de la requête SQL
        $stmt->execute();
        //j'affiche l'article.
        $article = $stmt->fetch(PDO::FETCH_ASSOC);


        return $article;
    }

    public function deleteById($id){
        // Préparation de la requête SQL pour supprimer un article.
        $sql = "DELETE FROM article WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        // Je remplace le parametres par la vraie valeur.
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    //j'exécute de la requête SQL
        $stmt->execute();


    }

};