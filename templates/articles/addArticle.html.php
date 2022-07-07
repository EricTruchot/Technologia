<p>AJOUTER UN ARTICLE</p>


<!-- ajout entreprise -->
<form action="index.php?controller=entreprise&task=insert" method="POST">
<label>Ajouter une entreprise:</label>
    <input type="text" name="nom" required>
    <input class="btn" type="submit" value="Ajouter" name="submit">
</form>
<!-- choix entreprise -->

<form action="index.php?controller=articles&task=insert" method="POST" enctype="multipart/form-data">
    <select name="entreprise">
        <!-- <option value="" selected disabled hidden>Entreprise</option> -->
        <?php foreach ($entreprises as $entreprise) : ?>
            <option value="<?= $entreprise['id']; ?>"><?= $entreprise['nom'] ?></option>
        <?php endforeach; ?>
    </select>
    <label>Titre:</label>
    <input type="text" name="titre" required>
    <label>Description:</label>
    <input type="text" name="description" required>
    <label>Contenu:</label>
            <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
            <input class="btn" type="submit" value="Envoyer" name="submit">

</form>
