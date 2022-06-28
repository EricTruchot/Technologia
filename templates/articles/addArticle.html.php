<p>AJOUTER UN ARTICLE</p>


<!-- ajout entreprise -->

<!-- choix entreprise -->
<form action="index.php?controller=articles&task=insert" method="POST" enctype="multipart/form-data">
    <select name="entreprise">
        <!-- <option value="" selected disabled hidden>Entreprise</option> -->
        <?php foreach ($entreprises as $entreprise) : ?>
            <option value="<?= $entreprise['idEntreprise']; ?>"><?= $entreprise['nom'] ?></option>
        <?php endforeach; ?>
    </select>
    <label>Titre:</label>
    <input type="text" name="titre" required>
    <label>Description:</label>
    <input type="text" name="description" required>
    <label>Contenu:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input class="btn" type="submit" value="Envoyer" name="submit">

</form>