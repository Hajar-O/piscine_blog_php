<?php

require_once ("../config/config.php");
require_once ("../model/articleRepository.php");
class ArticleController{

    public function addArticle(){

        $isRequestOk = false;
// Condition qui vérifie si la requête envoyé est bien de type POST.



        if($_SERVER["REQUEST_METHOD"] === "POST"){

            // Définir les paramètres et exécuter
            $title = $_POST['title'];
            $content = $_POST['content'];
            $date = new DateTime('NOW');
            $date = $date->format('Y-m-d');


            $ArticleRepository = new ArticleRepository();
            // je stock dans la variable $isRequestOk les paramètres entrés dans la méthode insert.
            $isRequestOk = $ArticleRepository ->insert($title, $content, $date);
        }



        require_once ("../templates/page/addArticleView.php");
    }

    public function showArticle(){
        // récupère l'id passé dans l'url de la requête.
        $id = $_GET["id"];

        // on intancie le repository pour accéder à la methode.
        $articleRepository = new ArticleRepository();
        //on appelle la méthode qui permet de récupérer l'article en fonction de l'ID.
        $article = $articleRepository ->findOneById($id);

        require_once ("../templates/page/showArticleView.php");
    }

    public function deleteArticle(){
        // récupère l'id passé dans l'url de la requête.
        $id = $_GET["id"];

        // on intancie le repository pour accéder à la methode.
        $articleRepository = new ArticleRepository();
        //on appelle la méthode qui permet de supprimer l'article en fonction de l'ID.
        $article = $articleRepository ->deleteById($id);

        require_once ("../templates/page/deleteArticle.php");
    }
}



