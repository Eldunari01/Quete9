<form action="index.php" enctype="multipart/form-data" method="post" class="col-6 container p-3 justify-content-center">
    <div class= "ml-3" id="form">
        <h2>Ajouter un champion</h2>
        <div class="form-group mt-4">
            <label>Champion</label>
            <input type="text" class="form-control mt-2" name = "champion">
        </div>
        <div class="form-group mt-4">
            <label>Ville</label>
            <input type="text" class="form-control mt-2"  name="ville">
        </div>
        <div class="form-group mt-4">
            <label>Type</label>
            <input type="text" class="form-control mt-2"  name="type">
        </div>
        <div class="form-group mt-4">
            <label>Badge</label>
            <input type="text" class="form-control mt-2"  name="badge">
        </div>
        <div class="form-group mt-4">
            Joindre une image (jpg ou png)
            <input type="file" name="image">
        </div>
        <button type="submit" class="btn btn-warning" name = "submitC">Ajouter le champion</button>
    </div>
</form>
<!-- retour -->
<a href="index.php?listC" class="text-center col-12"><button class="btn btn-dark">Accéder aux champions</button></a>