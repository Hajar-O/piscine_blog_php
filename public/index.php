<?php


require_once('../controller/ArticleController.php');
require_once('../controller/IndexController.php');
// récupération de l'uri
    $requestUri = $_SERVER['REQUEST_URI'];
//analyse l'url reçu
    $uri = parse_url($requestUri, PHP_URL_PATH);

//ajoute le chemin d'accès manquant à l'url pour la redirection vers le controller correspondant
    $endUri = str_replace('/piscine_blog/public/', '', $uri);
    $endUri = trim($endUri, '/');

// Renvoie sur le controller correspondant en fonction du contenu de $endUri
        if ($endUri === "") {

            $indexController = new IndexController();
            $indexController->index();

        } else if ($endUri === "add-article") {

            $addArticleController = new ArticleController();
            $addArticleController->addArticle();

        } else if ($endUri === "show-article") {

            $addArticleController = new ArticleController();
            $addArticleController->showArticle();

        } else if ($endUri === "delete-article") {
            $addArticleController = new ArticleController();
            $addArticleController->deleteArticle();
        } else {
            echo '<p>Dégage</p>';
        }