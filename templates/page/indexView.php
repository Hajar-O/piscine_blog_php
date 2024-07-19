<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le blog de la piscine</title>
</head>
        <body>
        <?php require_once("../templates/partial/header.html.twig") ?>
                <main>
                     
                     <h2>Les différentes piscines</h2>
                    <button class="buttonArticle"><a href="http://localhost:8888/piscine_blog/public/add-article">Add new article</a></button>


                     <section class="my_articles">

                        <?php foreach ($articles as $article){ ?>

                                <article class="articles">
                                        <h3><?php echo $article['title'] ?></h3>
                                        <!-- <p><?php echo $article['content'] ?></p> -->
                                        <p><?php echo $article['created_at']?></p>
                                        <a href="http://localhost:8888/piscine_blog/public/show-article?id=<?php echo $article['id'] ?>">Voir l'article</a> <br>
                                    <a href="http://localhost:8888/piscine_blog/public/delete-article?id=<?php echo $article['id'] ?>" > Supprimer l'article</a>
                                </article>

                        <?php }?>

                     </section>
                     

                </main>
        <?php require_once("../templates/partial/footer.html.twig") ?>
        </body>
</html>