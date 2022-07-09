<?php

namespace Services;

class FileServices
{

    public function upload(array $file)
    {
        $target_dir = "./uploads/";

        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        // $fileType = 0; //1 = image, 2 = video
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST["submit"])) {
            // Autorisation de certains type de fichiers
            if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {

                $uploadOk = 1;
                //   $fileType = 1; //image
            }
            // UPLOAD VIDEO 
            // elseif ($imageFileType == "mp4" || $imageFileType == "flv" || $imageFileType == "wmv" || $imageFileType == "mov") {

            //     $uploadOk = 1;
            //     $fileType = 2; //video
            // } 
            else {
                $uploadOk = 0;
                $_SESSION["message"] = "Fichier non supporter";
                \Http::redirect("index.php");
            }
        }
        // Verifie si le fichier existe deja
        if (file_exists($target_file)) {

            $uploadOk = 0;
            $_SESSION["message"] = "Le fichier existe deja";
            \Http::redirect("index.php");
        }
        // Taille maximum du fichier
        if ($file["size"] > 50000000) { //50 Mo

            $uploadOk = 0;
            $_SESSION["message"] = "Fichier trop volumineux";
            \Http::redirect("index.php");
        }

        // Check des erreurs
        if ($uploadOk == 1) {
            // si c'est ok, upload du fichier
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return $target_file;
            } else {

                $_SESSION["message"] = "Erreur d'envoi";
                \Http::redirect("index.php");
            }
        }
    }
}
