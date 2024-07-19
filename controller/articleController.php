<?php

require_once ("../config/config.php");
require_once ("../model/articleRepository.php");
class ArticleController{
    private $twig;

     function __construct(){
        $loader = new \Twig\Loader\FilesystemLoader('../templates');
        $this -> twig = new \Twig\Environment($loader);
    }
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



// on instencie une nouvelle classe Twig pour indiquer ou se trouvent tous les fichers twig.
       // $loader = new \Twig\Loader\FilesystemLoader('../templates');
       // $twig = new \Twig\Environment($loader);

        echo $this->twig -> render('page/addArticleView.html.twig', [
            'isRequestOk' => $isRequestOk
        ]);    }

    public function showArticle(){
        // récupère l'id passé dans l'url de la requête.
        $id = $_GET["id"];

        // on intancie le repository pour accéder à la methode.
        $articleRepository = new ArticleRepository();
        //on appelle la méthode qui permet de récupérer l'article en fonction de l'ID.
        $article = $articleRepository ->findOneById($id);

// on instencie une nouvelle classe Twig pour indiquer ou se trouvent tous les fichers twig.
        //$loader = new \Twig\Loader\FilesystemLoader('../templates');
        //$this->twig = new \Twig\Environment($loader);

        echo $this->twig -> render('page/showArticleView.html.twig', [
            'article' => $article
        ]);    }

    public function deleteArticle(){
        // récupère l'id passé dans l'url de la requête.
        $id = $_GET["id"];

        // on intancie le repository pour accéder à la methode.
        $articleRepository = new ArticleRepository();
        //on appelle la méthode qui permet de supprimer l'article en fonction de l'ID.
        $deleteOk = $articleRepository ->deleteById($id);

        // redirection vers la page d'affichage des articles.
        if($deleteOk){
            header("location:http://localhost:8888/piscine_blog/public/");
        } else {
// on instencie une nouvelle classe Twig pour indiquer ou se trouvent tous les fichers twig.
            //$loader = new \Twig\Loader\FilesystemLoader('../templates');
            //$twig = new \Twig\Environment($loader);

            echo $this->twig -> render('page/deleteArticleFailView.html.twig', [
                'deleteOk' => $deleteOk
            ]);
        }
    }

}



