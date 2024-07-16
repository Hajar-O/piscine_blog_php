<?php
require_once("../config/config.php");
require_once("../model/articleRepository.php");

class indexController {

    public function index(){

        $articleRepository = new ArticleRepository();
        $articles = $articleRepository -> findArticle();
    
        require_once("../templates/page/indexView.php");
    }
};

$indexController = new IndexController();
$indexController -> index();
