<p>AJOUTER UN ARTICLE</p>


<!-- ajout entreprise -->

<!-- choix entreprise -->
<form action="index.php?controller=articles&task=insert" method="POST">
    <select name="entreprise">
        <!-- <option value="" selected disabled hidden>Entreprise</option> -->
        <?php foreach ($entreprises as $entreprise) : ?>
            <option value="<?= $entreprise['idCategorie']; ?>"><?= $entreprise['nom'] ?></option>
        <?php endforeach; ?>
    </select>
    <label>Titre:</label>
    <input type="text" name="titre" required>
    <label>Description:</label>
    <input type="text" name="description" required>
    <button type="submit">Envoyer</button>


</form>