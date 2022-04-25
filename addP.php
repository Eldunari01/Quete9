<?php

//formulaire
if(isset($_GET['addP'])){
    include 'formP.php';
}

if(isset($_POST['submitP'])){

    //récupération données
    $numero = htmlspecialchars($_POST['numero']);
    $name = htmlspecialchars(ucfirst(strtolower($_POST['name'])));
    $type1 = htmlspecialchars(ucfirst(strtolower($_POST['type1'])));
    $type2 = htmlspecialchars(ucfirst(strtolower($_POST['type2'])));
    $image='';
    if($_FILES["image"]["error"] == 0){upload('pokemon'); $image = "img/pokemon/".basename($_FILES["image"]["name"]);}

    //ajout pokemon
    $insert = "INSERT INTO pokemon (`numero`,`name`,`type1`,`type2`,`image`)
    VALUES ('$numero','$name','$type1','$type2','$image')";
    $db->exec($insert);

    echo
    '<div class="alert alert-success text-center justify-content-center" role="alert">
        Un pokémon a été ajouté
    </div>';

    //refresh
    header("Refresh: 3; URL=index.php?listP");
}
?>