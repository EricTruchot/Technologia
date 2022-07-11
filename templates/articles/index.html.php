<div class="top">
    <h1>Technologia</h1>
    <p>"Any sufficiently advanced technology is indistinguishable from magic."</br></br>- Arthur C. Clarke</p>
</div>

<div class="content">
    <?php foreach ($articles as $article) : ?>
        <div class="card">

                <?php for ($i = 0; $i < count($media); $i++) {
                    if ($media[$i]['Article_id'] == $article['id']) {
                ?>
                        <img src="<?= $media[$i]['lien'] ?>" alt="<?= $article['titre'] ?>">
                        <?php $i = count($media) ?>
                <?php }
                } ?>

            <h2><?= $article['titre'] ?></h2>
            <p>Entreprise: <span><?= $article['nom'] ?></span></p>
            <!-- <p><?= $article['description'] ?></p> -->

            <a class="btn" href="index.php?controller=articles&task=show&id=<?= $article['id'] ?>">En savoir plus</a>
            <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'admin') { ?>
                <a class="btn delete" href="index.php?controller=articles&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
            <?php } ?>
        </div>
    <?php endforeach ?>
</div>