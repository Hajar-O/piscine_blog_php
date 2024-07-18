<?php
require_once ("../templates/partial/header.php");
require_once ("../config/config.php"); ?>

<main>

        <h1>Le super blog de la piscine</h1>

        <article>

                    <h3><?php echo $article['title'] ?></h3>
                    <p><?php echo $article['content']?></p>
                    <p><?php echo $article['created_at']?></p>

        </article>


</main>
<?php require_once ("../templates/partial/footer.php");?>




