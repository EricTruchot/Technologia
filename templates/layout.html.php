<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style/normalize.css">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/fonts/Futura-Light.otf">
    <link rel="stylesheet" href="/fonts/Luxia-Regular.otf">
    <title>Technologia - <?= $pageTitle ?></title>

</head>
<body>
    <header>
        <nav>

            <a href="index.php">Acceuil</a>

            <?php

            if (!empty($_SESSION['type'])) { ?>

                <a href='index.php?controller=user&task=logout'>Déconnexion</a>

                <?php if ($_SESSION['type'] == 'admin') { ?>

                    <a href='index.php?controller=user&task=showAddArticle'>Ajouter un article</a>

                <?php }
            } elseif (!isset($_SESSION['type'])) { ?>
                <a href='index.php?controller=user&task=showConnexion'>Connexion</a>
            <?php } ?>

            </nav>
        <?php if (isset($_SESSION['message'])) { //message "systeme" 
        ?>
            <p class="message"><?= $_SESSION['message'] ?></p>

        <?php unset($_SESSION['message']);
        } ?>
        
    </header>
    <main>
        <?= $pageContent ?>
    </main>
</body>
<script src="/style/app.js"></script>
</html>