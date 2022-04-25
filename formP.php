<form action="index.php" enctype="multipart/form-data" method="post" class="col-6 container p-3 justify-content-center">
    <div class= "ml-3" id="form">
        <h2>Ajouter un pokémon</h2>
        <div class="form-group mt-4">
            <label>Numéro</label>
            <input type="number" class="form-control mt-2" min="1" max="151" name = "numero">
        </div>
        <div class="form-group mt-4">
            <label>Nom</label>
            <input type="text" class="form-control mt-2"  name="name">
        </div>
        <div class="form-group mt-4">
            <label>Premier type</label>
            <input type="text" class="form-control mt-2"  name="type1">
        </div>
        <div class="form-group mt-4">
            <label>Deuxième type</label>
            <input type="text" class="form-control mt-2"  name="type2">
        </div>
        <div class="form-group mt-4">
                Joindre une image (jpg ou png)
                <input type="file" name="image">
        </div>
        <button type="submit" class="btn btn-warning" name = "submitP">Ajouter le pokémon</button>
    </div>
</form>
<a href="index.php?listC" class="text-center col-12"><button class="btn btn-dark">Accéder aux pokémons</button></a>