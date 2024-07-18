<?php
require_once ("../templates/partial/header.php"); ?>

<main>
    <h1>Ajouter un article</h1>

    <section class="formAddArticle">
            <form method="post">
                    <label> Title</label>
                <input type="text" name="title">

                    <label> Content </label>
                        <input type="text" name="content">

                    <button>Submit</button>
            </form>
    </section>
<! je test le résultat du booleen, si TRUE alors j'affiche mon HTML.-->
    <?php if($isRequestOk) {?>

        <p>L'article a bien été enregirsté.</p>


    <?php } ?>
</main>

<?php require_once ("../templates/partial/footer.php")?>