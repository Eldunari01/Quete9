<?php include 'settings/head.php'; include 'settings/db.php'; include 'settings/fonction.php';

$id = strip_tags($_GET['id']);

//card
$sqlQuery = "SELECT * FROM champion WHERE id=$id";
$utilisateur1 = $db -> prepare($sqlQuery);
$utilisateur1 -> execute();
$selectC = $utilisateur1 -> fetchAll();

foreach ($selectC as $value){
?>
<div class="text-center col-5 mb-3 mt-5 container-fluid">
    <div class="card bg-dark mb-3">
      <div class="row">
        <div class="col-md-4 mt-5" id="cardImgc">
            <?php if(!empty($value['image']));{ ?>
            <img src="<?php echo $value['image']; ?>"><?php }
            if(empty($value['image'])){ echo'<img src="img/champion/default">'; }
            ?>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-header"><?php echo $value['champion']; ?></h5>
            <p class="card-text"><br><?php echo 'Ville : '.$value['ville']; ?>
                <br>Type : <img src="img/type/<?php echo $value['type']; ?>">
                <br>Badge : <img src="img/badge/<?php echo $value['badge']; ?>" id="badge">
                <br>id : <?php echo $value['id']; ?>
                <br>Date de création : <br><?php echo $value['created_at']; ?>
                <br>Dernière modification : <br><?php echo $value['modified_at']; ?>
            </p>
            <button type="button" class="btn btn-outline-light" data-toggle="collapse" href="#form" name="form">Modifier</button>
            <br>
          </div>
        </div>
      </div>
    </div>
</div>
<?php 

}

//formulaire
include 'formCU.php';

//retour
?><div class="text-center mb-3"><a href="index.php?listC"><button class="btn btn-success">Retour</button></a></div><?php


//modification
if(isset($_POST['submitCU'])){

    $championU = htmlspecialchars(ucfirst($_POST['champion']));
    $villeU = htmlspecialchars($_POST['ville']);
    $typeU = htmlspecialchars($_POST['type']);
    $badgeU = htmlspecialchars($_POST['badge']);

    $insert = "UPDATE champion SET `champion`='$championU',`ville`='$villeU',`type`='$typeU',`badge`='$badgeU', `modified_at`=CURRENT_TIME WHERE id=$id";
    $db->exec($insert);

    if(!empty($_FILES["image"]["name"])){
        $imageU = "img/champion/".basename($_FILES["image"]["name"]);

        $insert = "UPDATE champion SET `image`='$imageU' WHERE id=$id";
        $db->exec($insert);

        upload('champion');
    }

    //refresh
    //header("Refresh: 3; URL=updateC.php?id=$id");

    echo
    '<div class="alert alert-success text-center mt-3" role="alert">
        Le champion a été modifié
    </div>';

    ?><div class="text-center mb-3"><a href="updateC.php?id=<?=$id?>"><button class="btn btn-warning">Actualiser</button></a></div><?php
}

//suppression
if(isset($_POST['deleteC'])){
    $sqlQuery = "DELETE FROM champion WHERE id=$id;";
    $delete = $db -> prepare($sqlQuery);
    $delete -> execute();

    echo
    '<div class="alert alert-danger text-center mt-3" role="alert">
        '.$_POST['champion'].' va s\'auto détruire
    </div>';

    ?><div class="text-center mb-3"><a href="index.php?listC"><button class="btn btn-warning">Fuir avant l'explosion</button></a></div><?php

    //refresh
    //header("Refresh: 3; URL=index.php?listC");
}
?>

<footer>&copy; Colin Calbet</footer>