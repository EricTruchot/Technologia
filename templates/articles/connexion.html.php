<section class="login">
    <h1>Connexion:</h1>
<form action="index.php?controller=user&task=login" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Mot de passe:</label>
    <input type="password" name="mdp" required>
    <!-- <input type="text" hidden name="idUser" value=""> -->
    <button type="submit">Connexion</button>
</form>
</section>