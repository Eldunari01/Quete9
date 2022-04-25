<?php

//formulaire
if(isset($_GET['addC'])){
    include 'formC.php';
}

if(isset($_POST['submitC'])){

    //récupération données
    $champion = htmlspecialchars(ucfirst(strtolower($_POST['champion'])));
    $ville = htmlspecialchars(ucfirst(strtolower($_POST['ville'])));
    $type = htmlspecialchars(ucfirst(strtolower($_POST['type'])));
    $badge = htmlspecialchars(ucfirst(strtolower($_POST['badge'])));
    $image='';
    if($_FILES["image"]["error"] == 0){upload('champion'); $image = "img/champion/".basename($_FILES["image"]["name"]);}
    
    //ajout champion
    $insert = "INSERT INTO champion (`ville`,`champion`,`type`,`badge`,`image`)
    VALUES ('$ville','$champion','$type','$badge','$image')";
    $db->exec($insert);

    echo
    '<div class="alert alert-success text-center justify-content-center" role="alert">
        Un champion a été ajouté
    </div>';

    //refresh
    header("Refresh: 3; URL=index.php?listC");
}
?>