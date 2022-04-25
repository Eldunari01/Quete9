<?php include 'settings/head.php'; include 'settings/db.php'; include 'settings/fonction.php';

$id = strip_tags($_GET['id']);

//card
$sqlQuery = "SELECT * FROM pokemon WHERE id=$id";
$utilisateur1 = $db -> prepare($sqlQuery);
$utilisateur1 -> execute();
$utilisateurFetch = $utilisateur1 -> fetchAll();

foreach ($utilisateurFetch as $value){
?>
<div class="text-center col-5 mb-3 mt-5 container-fluid">
    <div class="card bg-dark mb-3">
      <div class="row">
        <!-- gauche -->
        <div class="col-md-4 mt-5" id="cardImgp">
            <?php if(!empty($value['image']));{ ?>
            <img src="<?php echo $value['image']; ?>"><?php }
            if(empty($value['image'])){ echo'<img src="img/pokemon/default">'; }
            ?>
        </div>
        <!-- droite -->
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-header"><?php echo $value['name']; ?></h5>
            <p class="card-text"><br><?php echo 'Numéro : '.$value['numero']; ?>
                <br>Type : <img src="img/type/<?php echo $value['type1'];?>">
                <?php if(!empty($value['type2'])){ ?><img src="img/type/<?php echo $value['type2'];?>"><?php } ?>
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
include 'formPU.php';

//retour
?><div class="text-center mb-3"><a href="index.php?listP"><button class="btn btn-success">Retour</button></a></div><?php

//modification
if(isset($_POST['submitPU'])){

    if(!empty($_POST['numero'])){$numeroU = htmlspecialchars($_POST['numero']);}
    if(isset($_POST['name'])){$nameU = htmlspecialchars($_POST['name']);}
    if(isset($_POST['type1'])){$type1U = htmlspecialchars($_POST['type1']);}
    if(isset($_POST['type2'])){$type2U = htmlspecialchars($_POST['type2']);}

    $insert = "UPDATE pokemon SET `numero`='$numeroU',`name`='$nameU',`type1`='$type1U',`type2`='$type2U', `modified_at`=CURRENT_TIME WHERE id=$id";
    $db->exec($insert);

    if(!empty($_FILES["image"]["name"])){
        $imageU = "img/pokemon/".basename($_FILES["image"]["name"]);

        $insert = "UPDATE pokemon SET `image`='$imageU' WHERE id=$id";
        $db->exec($insert);

        upload('pokemon');
    }

    echo
    '<div class="alert alert-success text-center mt-3" role="alert">
        Le pokémon a été modifié
    </div>';

    ?><div class="text-center mb-3"><a href="updateP.php?id=<?=$id?>"><button class="btn btn-warning">Actualiser</button></a></div><?php

    //refresh
    //header("Refresh: 3; URL=index.php?listP");
}

//suppression
if(isset($_POST['deleteP'])){
    $sqlQuery = "DELETE FROM pokemon WHERE id=$id;";
    $delete = $db -> prepare($sqlQuery);
    $delete -> execute();

    echo
    '<div class="alert alert-danger text-center mt-3" role="alert">
        '.$_POST['name'].' va s\'auto détruire
    </div>';

    ?><div class="text-center mb-3"><a href="index.php?listC"><button class="btn btn-warning">Fuir avant l'explosion</button></a></div><?php
}
?>