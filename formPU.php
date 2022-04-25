<?php
$sqlQuery = "SELECT * FROM pokemon WHERE id=$id";
$findInfo = $db -> prepare($sqlQuery);
$findInfo -> execute();
$setInfo = $findInfo -> fetch();

$numeroU = htmlspecialchars($setInfo['numero']);
$nomU = htmlspecialchars($setInfo['name']);
$type1U = htmlspecialchars($setInfo['type1']);
$type2U = htmlspecialchars($setInfo['type2']);
$imageU = htmlspecialchars($setInfo['image']);
?>

<div class="collapse" id="form">
<form action="updateP.php?id=<?php echo $id; ?>" enctype="multipart/form-data" method="post" class="col-6 container p-3 justify-content-center">
    <div class= "ml-3" id="form">
        <h2>Formulaire de modification des données</h2>
        <div class="form-group mt-4">
            <label>Numéro</label>
            <input type="number" class="form-control mt-2" name="numero" value="<?php echo $numeroU ?>">
        </div>
        <div class="form-group mt-4">
            <label>Nom</label>
            <input type="text" class="form-control mt-2"  name="name" value="<?php echo $nomU ?>">
        </div>
        <div class="form-group mt-4">
            <label>Type 1</label>
            <input type="text" class="form-control mt-2"  name="type1" value="<?php echo $type1U ?>">
        </div>
        <div class="form-group mt-4">
            <label>Type 2</label>
            <input type="text" class="form-control mt-2"  name="type2" value="<?php echo $type2U ?>">
        </div>
        <div class="form-group mt-4">
            Joindre une image (jpg ou png)
            <input type="file" name="image">
        </div>
        <button type="submit" class="btn btn-warning" name = "submitPU">Enregistrer les modifications</button>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Supprimer</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Voulez-vous vraiment supprimer <?php echo $nomU ?> ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger" name="deleteP">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<br>