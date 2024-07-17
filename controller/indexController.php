<?php
require_once("../config/config.php");
require_once("../model/articleRepository.php");

class indexController {

    public function index(){
// j'instencie une nouvelle classe ArticleRepository
        $articleRepository = new ArticleRepository();
        // j'appelle la méthode qui va afficher tous les articles.
        $articles = $articleRepository -> findArticles();
    // j'appelle la vue qui affiche le HTML
        require_once("../templates/page/indexView.php");
    }
};

$indexController = new IndexController();
$indexController -> index();
