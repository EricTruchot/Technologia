<?php

namespace Services;

class Services
{

    public function upload()
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        //$fileName = $_FILES["fileToUpload"]["name"];
        $uploadOk = 1;
        $fileType = 0; //1 = image, 2 = video
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            // Allow certain file formats
            if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {

                $uploadOk = 1;
                $fileType = 1;
            } elseif ($imageFileType == "mp4" || $imageFileType == "flv" || $imageFileType == "wmv" || $imageFileType == "mov") {

                $uploadOk = 1;
                $fileType = 2;
            } else {

                $_SESSION['error'] = 'Fichier non supporter';
                $uploadOk = 0;
                \Http::redirect("index.php?controller=user&task=showAdmin");
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {

            $_SESSION['error'] = 'Le fichier existe deja';
            $uploadOk = 0;
            \Http::redirect("index.php?controller=user&task=showAdmin");
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 50000000) { //50 Mo

            $_SESSION['error'] = 'Fichier trop volumineux';
            $uploadOk = 0;
            \Http::redirect("index.php?controller=user&task=showAdmin");
        }


        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $_SESSION['error'] = "Le fichier n'a pas pu etre envoyer";
            $uploadOk = 0;
            \Http::redirect("index.php?controller=user&task=showAdmin");

            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            } else {

                $_SESSION['error'] = "Erreur d'envoie";
                $uploadOk = 0;
                \Http::redirect("index.php?controller=user&task=showAdmin");
            }
        }
        if ($uploadOk == 1) {
            return $target_file;
        }
    }
}
