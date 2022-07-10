<h1>Nos articles</h1>

<?php foreach ($articles as $article) : ?>
    <h2><?= $article['titre'] ?></h2>
    <small>Ecrit le <?= $article['date'] ?></small>
    <p>Entreprise: <?= $article['nom'] ?></p>
    <p><?= $article['description'] ?></p>
    <?php foreach ($media as $img) : 
        if ($img['Article_id'] == $article['id']){
        ?>
<img src="<?= $img['lien'] ?>" alt="<?= $article['titre'] ?>">
<?php } endforeach ?>
    <a href="index.php?controller=articles&task=show&id=<?= $article['id'] ?>">En savoir plus</a>
    <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin') { ?>
    <a href="index.php?controller=articles&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
    <?php } ?>
<?php endforeach ?>