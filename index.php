<!DOCTYPE html>
<html lang="en">

<?php
//head
include 'settings/head.php';
//db
include 'settings/db.php';
//fonction
include 'settings/fonction.php';
?>

<body>
    <!-- boutons -->
    <header>
    <div id="jumbotron" class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            <div class="col-8">
                <a href="index.php?img"><button type="button"  class="btn btn-outline-light">Home</button></a>
                <a href="index.php?listC"><button type="button"  class="btn btn-light">Champions</button></a>
                <a href="index.php?listP"><button type="button"  class="btn btn-light">Pokémons</button></a>
                <a href="index.php?addC"><button type="button"  class="btn btn-warning">Ajouter un champion</button></a>
                <a href="index.php?addP"><button type="button"  class="btn btn-warning">Ajouter un pokémon</button></a>
            </div>
        </div>
    </div>
    </header>

    <br>
    
    <!-- page -->
    <div class="container-fluid">
        <div class="row">
            <?php
            if(isset($_GET['img'])){
                
            }
            //champions
            include 'addC.php';
            if(isset($_GET['listC'])){
                include 'listC.php';
            }
            //pokémons
            include 'addP.php';
            if(isset($_GET['listP'])){
                include 'listP.php';
            }     
            ?>
        </div>
    </div>

    <footer>&copy; Colin Calbet</footer>
</body>
</html>