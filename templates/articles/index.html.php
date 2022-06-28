<h1>Nos articles</h1>

<?php foreach ($articles as $article) : ?>
    <h2><?= $article['titre'] ?></h2>
    <small>Ecrit le <?= $article['date'] ?></small>
    <p><?= $article['description'] ?></p>
    <a href="index.php?controller=articles&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
    <a href="index.php?controller=articles&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
<?php endforeach ?>