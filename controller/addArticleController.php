<?php

require_once ("../config/config.php");
require_once ("../model/articleRepository.php");
class AddArticleController{

    public function addArticle(){



        // Définir les paramètres et exécuter
        $title = "Mon nouvel article ";
        $content = " lorem ipsum la piscine blabla blabla";
        $date = "2024-07-17";

        $ArticleRepository = new ArticleRepository();
        $ArticleRepository ->insert($title, $content, $date);


    }
}

$AddArticleController = new AddArticleController();
$AddArticleController->addArticle();

