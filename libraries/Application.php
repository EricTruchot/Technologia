<?php

class Application //appel un controller et une function
{
    public static function process()
    {
        //definition de la page par defaut
        $controllerName = "Articles";
        $task = "index";

        if (!empty($_GET['controller'])){ // réupère le parametre "controller" si il existe
            $controllerName = ucfirst($_GET['controller']);
        }
        if (!empty($_GET['task'])){ // réupère le parametre "task" si il existe
            $task = $_GET['task'];
        }
        //exemple:
        //si: index.php?controller=article&tarsk=show
        //alors on chercher le fichier Article, la function show


        //puis on concat le tout pour indiquer que l'on recherche dans le dossier Controllers
        $controllerName = "\Controllers\\" . $controllerName;

        //controllerName appel donc une classe, on peut en faire un objet
        $controller = new $controllerName();
        //on recherche dans la nouvelle classe la function qui est stocké dans $task
        $controller->$task();
    }
}
