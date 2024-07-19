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

        // on instencie une nouvelle classe Twig pour indiquer ou se trouvent tous les fichers twig.
        $loader = new \Twig\Loader\FilesystemLoader('../templates');
        $twig = new \Twig\Environment($loader);

    echo $twig -> render('page/index.html.twig', [
        'articles' => $articles
    ]);
        //require_once("../templates/page/indexView.php");
    }
};


