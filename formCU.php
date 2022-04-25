<?php 
$sqlQuery = "SELECT * FROM champion WHERE id=$id";
$findInfo = $db -> prepare($sqlQuery);
$findInfo -> execute();
$setInfo = $findInfo -> fetch();

$championU = htmlspecialchars($setInfo['champion']);
$villeU = htmlspecialchars($setInfo['ville']);
$typeU = htmlspecialchars($setInfo['type']);
$badgeU = htmlspecialchars($setInfo['badge']);
$imageU = htmlspecialchars($setInfo['image']);
?>

<div class="collapse" id="form">
<form action="updateC.php?id=<?php echo $id; ?>" enctype="multipart/form-data" method="post" class="col-6 container p-3 justify-content-center">
    <div class= "ml-3" id="form">
        <h2>Formulaire de modification des données</h2>    
        <div class="form-group mt-4">
            <label>Champion</label>
            <input type="text" class="form-control mt-2" name = "champion" value="<?php echo $championU ?>">
        </div>
        <div class="form-group mt-4">
            <label>Ville</label>
            <input type="text" class="form-control mt-2"  name="ville" value="<?php echo $villeU ?>">
        </div>
        <div class="form-group mt-4">
            <label>Type</label>
            <input type="text" class="form-control mt-2"  name="type" value="<?php echo $typeU ?>">
        </div>
        <div class="form-group mt-4">
            <label>Badge</label>
            <input type="text" class="form-control mt-2"  name="badge" value="<?php echo $badgeU ?>">
        </div>
        <div class="form-group mt-4">
            Joindre une image (jpg ou png)
            <input type="file" name="image" value="<?php echo $imageU ?>">
        </div>
        <button type="submit" class="btn btn-warning" name = "submitCU">Enregistrer les modifications</button>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Supprimer</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Voulez-vous vraiment supprimer <?php echo $championU ?> ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger" name="deleteC">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<br>