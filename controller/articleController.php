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
        $articleRepository = new ArticleRepository();
        $article = $articleRepository ->findOneById(1);

        require_once ("../templates/page/articleView.php");
    }
}

$ArticleController = new ArticleController();
$ArticleController->addArticle();

