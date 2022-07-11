<section class="show">
    <h1><?= $article['titre'] ?></h1>
    <div class="carousel">
        <div class="slider">
            <?php for ($i = 0; $i < count($media); $i++) { ?>
                <img <?php
                        if ($media[$i] == $media[0]) { ?> class="active" <?php    }
                                                                            ?> src="<?= $media[$i]['lien'] ?>" alt="<?= $article['titre'] ?>">
            <?php } ?>
        </div>
        <div class="cont-btn">
            <div class="btn-nav left">←</div>
            <div class="btn-nav right">→</div>
        </div>
    </div>
    <div class="info">
        <p>Entreprise: <?= $article['nom'] ?></p>
        <small>Date du post: <?= $article['date'] ?></small>
    </div>
    <p><?= $article['description'] ?></p>


    <!-- MODIFICATION ADMIN -->
    <?php
    if ((isset($_SESSION['type']) && $_SESSION['type'] == 'admin')) {
    ?>
        <div class="admin">
            <h2>Modification de l'article:</h2>
            <form action="index.php?controller=articles&task=updateArticle" method="POST">
                <div>
                    <label>Selection de l'entreprise:</label>
                    <select name="modifEntreprise">
                        <option value="<?= $article['EntrepriseId']; ?>"><?= $article['nom'] ?></option>
                        <?php foreach ($entreprises as $entreprise) : ?>
                            <option value="<?= $entreprise['id']; ?>"><?= $entreprise['nom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label class="titre">Choix du titre:</label>
                    <input type="text" name="modifTitre" value="<?= $article['titre'] ?>">
                </div>
                <label class="titre">Description:</label>

                <textarea type="text" name="modifDescription" cols="40" rows="7"><?= $article['description'] ?></textarea>
                <input type="text" hidden name="articleId" value="<?= $article['id'] ?>">
                <input class="btn" type="submit" value="Modifier" name="submit" onclick="return window.confirm('Êtes vous sûr de vouloir modifier cet article ?')">
            </form>


            <form action="index.php?controller=articles&task=addMediaToArticle" method="POST" enctype="multipart/form-data">
                <label>Ajout d'image:</label>
                <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
                <input type="text" hidden name="articleId" value="<?= $article['id'] ?>">
                <input class="btn" type="submit" value="Envoyer" name="submit">
            </form>
            <div class="images">
                <?php foreach ($media as $img) : ?>
                    <div class="image">
                        <a href="index.php?controller=articles&task=deleteImage&id=<?= $img['id'] ?>&articleId=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cette image ?`)">Supprimer</a>
                        <img src="<?= $img['lien'] ?>" alt="<?= $article['titre'] ?>">
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php } ?>
</section>