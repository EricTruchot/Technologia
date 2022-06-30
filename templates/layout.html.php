<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Technologia - <?= $pageTitle ?></title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Acceuil</a></li>

                <?php

                if (!empty($_SESSION['type'])) { ?>

                    <li><a href='index.php?controller=user&task=logout'>Déconnexion</a></li>

                    <?php if ($_SESSION['type'] == 'admin') { ?>

                        <li><a href='index.php?controller=user&task=showAdmin'>Administration</a></li>

                    <?php }
                } elseif (!isset($_SESSION['type'])) { ?>
                    <li><a href='index.php?controller=user&task=showConnexion'>Connexion</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>

    <?= $pageContent ?>
</body>

</html>