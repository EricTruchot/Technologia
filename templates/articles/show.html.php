<h1><?= $article['titre'] ?></h1>
<small>Ecrit le <?= $article['date'] ?></small>
<p>Entreprise: <?= $article['nom'] ?></p>
<hr>
<p><?= $article['description'] ?></p>

<?php foreach ($media as $img) : ?>
    <img src="<?= $img['lien'] ?>" alt="<?= $article['titre'] ?>">
<?php endforeach ?>
<!-- MODIFICATION ADMIN -->



<form action="index.php?controller=articles&task=updateArticle" method="POST">
    <p>Selection entreprise:</p>
    <select name="modifEntreprise">
        <option value="<?= $article['EntrepriseId']; ?>"><?= $article['nom'] ?></option>
        <?php foreach ($entreprises as $entreprise) : ?>
            <option value="<?= $entreprise['id']; ?>"><?= $entreprise['nom'] ?></option>
        <?php endforeach; ?>
    </select>
    <p class="titre">Titre</p>
    <input type="text" name="modifTitre" value="<?= $article['titre'] ?>">
    <p class="titre">Description</p>
    <input type="text" name="modifDescription" value="<?= $article['description'] ?>">
    <input type="text" hidden name="articleId" value="<?= $article['id'] ?>">
    <input class="btn" type="submit" value="Modifier" name="submit" onclick="return window.confirm('Êtes vous sûr de vouloir modifier cet article ?')">
</form>


<form  action="index.php?controller=articles&task=addMediaToArticle" method="POST" enctype="multipart/form-data">
<label>Contenu:</label>
<input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
<input type="text" hidden name="articleId" value="<?= $article['id'] ?>">
<input class="btn" type="submit" value="Envoyer" name="submit">
</form>

<?php foreach ($media as $img) : ?>
    <img src="<?= $img['lien'] ?>" alt="<?= $article['titre'] ?>">
    <a href="index.php?controller=articles&task=deleteImage&id=<?= $img['id'] ?>&articleId=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cette image ?`)">Supprimer</a>
<?php endforeach ?>