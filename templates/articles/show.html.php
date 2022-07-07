<h1><?= $article['titre'] ?></h1>
<small>Ecrit le <?= $article['date'] ?></small>
<p>Entreprise: <?= $article['nom'] ?></p>
<hr>
<p><?= $article['description'] ?></p>

<?php foreach ($media as $img) : ?>
<img src="<?= $img['lien'] ?>" alt="<?= $article['titre'] ?>">
<?php endforeach ?>
<!-- MODIFICATION ADMIN -->

<form action="index.php?controller=articles&task=insert">
    <p>Selection entreprise:</p>
<select name="entreprise">
        <!-- <option value="" selected disabled hidden>Entreprise</option> -->
        <?php foreach ($entreprises as $entreprise) : ?>
            <option value="<?= $entreprise['id']; ?>"><?= $entreprise['nom'] ?></option>
        <?php endforeach; ?>
    </select>
    <p class="titre">Titre</p>
    <input type="text" name="modifTitre" value="<?= $article['titre'] ?>">
    <p class="titre">Description</p>
    <input type="text" name="modifDescription" value="<?= $article['description'] ?>">
</form>

<?php foreach ($media as $img) : ?>
<img src="<?= $img['lien'] ?>" alt="<?= $article['titre'] ?>">
<a href="index.php?controller=articles&task=deleteImage&id=<?= $img['id'] ?>&articleId=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cette image ?`)">Supprimer</a>
<?php endforeach ?>