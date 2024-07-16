<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le blog de la piscine</title>
</head>
        <body>
        <?php require_once("../templates/partial/header.php") ?>
                <main>
                     
                     <h2>Les différentes piscines</h2>

                     <section class="my_articles">

                        <?php foreach ($articles as $article){ ?>

                                <article class="articles">
                                        <h3><?php echo $article['title'] ?></h3>
                                        <!-- <p><?php echo $article['content'] ?></p> -->
                                        <p><?php echo $article['created_at']?></p>
                                </article>

                        <?php }?>

                     </section>
                     

                </main>
        <?php require_once("../templates/partial/footer.php") ?>
        </body>
</html>