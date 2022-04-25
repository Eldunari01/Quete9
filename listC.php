<?php

$sqlQuery = 'SELECT * FROM champion ORDER BY id ASC';
$utilisateur1 = $db -> prepare($sqlQuery);
$utilisateur1 -> execute();
$utilisateurFetch = $utilisateur1 -> fetchAll();

foreach ($utilisateurFetch as $value){
    ?>
    <div class="text-center col-3 mb-3" id="listCard">
        <div class="card bg-dark" style="height: 400px;">
            <div class="card-header"><?php echo $value['champion']; ?></div>
            <div class="card-body bg-dark">
                <?php if(!empty($value['image']));{ ?>
                <p><img src="<?php echo $value['image']; ?>"><?php }
                if(empty($value['image'])){ echo '<img src="img/champion/default">'; }
                ?>
                </p>
                <p class="card-text"><?php
                echo 'Ville : '.$value['ville'];?>
                <br>Type : <img src="img/type/<?php echo $value['type']; ?>">
                <br>Badge : <img src="img/badge/<?php echo $value['badge']; ?>" id="badge">
            </div>

            <a href="updateC.php?id=<?php echo $value['id']; ?>"><button type="button"  class="btn btn-outline-light">Voir plus</button></a>
            <br>
        </div>
    </div>
    
    <?php
}

?>