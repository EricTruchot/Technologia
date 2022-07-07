<p>PAGE ADMIN AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>

<a href="index.php?controller=user&task=showAddArticle">ajouter un article</a>
<?php foreach ($articles as $article) : ?>
    <h2><?= $article['titre'] ?></h2>
    <small>Ecrit le <?= $article['date'] ?></small>
    <p><?= $article['description'] ?></p>
    <?php
    if ($_SESSION['type'] == 'admin') { ?>
 <a href="index.php?controller=articles&task=show&id=<?= $article['id'] ?>">En savoir plus</a>
 <a href="index.php?controller=articles&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
<?php } endforeach ?>


<!-- <script>
        document.getElementById('button').addEventListener('click', (event) => {
        event.preventDefault();

        let URL = "index.php?controller=articles&task=insert"
        let form = document.getElementById('form')
        let formData = new FormData(form)
       
        fetch(URL, {
                body: formData,
                method: "post"
            })
            .then(function(response) {
                return response.json()
            })
            .then(function(data) {

                if(data == true ){
                    document.location.href = "index.php?controller=articles&task=showAdmin"
                        alert("article envoyé")
                }else

document.getElementById('error').innerText = data
                
            })
    })
    </script> -->