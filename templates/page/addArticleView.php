<?php
require_once ("../templates/partial/header.php"); ?>

<main>
    <h1>Ajouter un article</h1>

    <form method="post">
            <label> Title
                <input type="text" name="title">
            </label>

            <label> Content
                <input type="text" name="content">
            </label>
            <button>Submit</button>


    </form>
<! je test le résultat du booleen, si TRUE alors j'affiche mon HTML.-->
    <?php if($isRequestOk) {?>

        <p>L'article a bien été enregirsté.</p>


    <?php } ?>
</main>

<?php require_once ("../templates/partial/footer.php")?>