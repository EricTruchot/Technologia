<div class="top">
    <h1>TECHNOLOGIA</h1>
    <p>"Any sufficiently advanced technology is indistinguishable from magic."</br></br>- Arthur C. Clarke</p>
    <div class="bandeau">
<img src="/style/img/img1.jpg" alt="img 1">
<img src="/style/img/img3.jpg" alt="img 3">
<img src="/style/img/img4.jpg" alt="img 4">
<img src="/style/img/img5.jpg" alt="img 5">
</div>
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
        </div>
    <?php endforeach ?>
</div>