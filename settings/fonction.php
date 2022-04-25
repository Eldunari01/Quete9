<?php

    //upload image
    function upload($directory){
        $uploadOk = 1;
        $imageFileType = pathinfo($_FILES["image"]["name"]);
        $imageFileType = $imageFileType['extension'];
        $target_file = "./img/$directory/" . basename($_FILES["image"]["name"]);

        if ($_FILES["image"]["size"] > 700000) {
            echo '<div class="alert alert-danger text-center" role="alert">
            Le fichier est trop volumineux.</div>';
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            echo '<div class="alert alert-danger text-center" role="alert">
            Les seuls fichiers acceptés sont les jpg et png</div>';
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            echo '<div class="alert alert-danger text-center" role="alert">
            Veuillez selectionner un fichier adapté.</div>';
        }
        else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            } else {
                echo '<div class="alert alert-danger text-center" role="alert">
                Il y a eu une erreur lors de l\'upload de l\'image</div>';
            }
        }
    }

?>