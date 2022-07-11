<section class="addArticle">
<h1>AJOUTER UN ARTICLE</h1>
<!-- ajout entreprise -->
<form action="index.php?controller=entreprise&task=insert" method="POST">
<p>Ajouter une entreprise:</p>
    <input type="text" name="nom" required>
    <input class="btn" type="submit" value="Ajouter" name="submit">
</form>
<!-- choix entreprise -->

<form action="index.php?controller=articles&task=insert" method="POST" enctype="multipart/form-data">
    <p>Ajouter un article:</p>
<select name="entreprise">
        <!-- <option value="" selected disabled hidden>Entreprise</option> -->
        <?php foreach ($entreprises as $entreprise) : ?>
            <option value="<?= $entreprise['id']; ?>"><?= $entreprise['nom'] ?></option>
        <?php endforeach; ?>
    </select>
    <label>Titre:</label>
    <input type="text" name="titre" required>
    <label>Description:</label>
    <textarea type="text" name="modifDescription" cols="30" rows="7" required></textarea>
    <label>Contenu:</label>
            <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
            <input class="btn" type="submit" value="Envoyer" name="submit">

</form>
</section>