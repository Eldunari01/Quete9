<?php

$sqlQuery = 'SELECT * FROM pokemon ORDER BY numero ASC';
$utilisateur1 = $db -> prepare($sqlQuery);
$utilisateur1 -> execute();
$utilisateurFetch = $utilisateur1 -> fetchAll();

foreach ($utilisateurFetch as $value){
    ?>
    <div class="text-center col-3 mb-3" id="listCard">
        <div class="card bg-dark" style="height: 400px;">
            <div class="card-header"><?php echo $value['name']; ?></div>
            <div class="card-body bg-dark">
                <p class="card-text"><?php
                echo 'Numéro : '.$value['numero']; 
                echo '<br>Type : '?><img src="img/type/<?php echo $value['type1'];?>">
                <?php if(!empty($value['type2'])){ ?><img src="img/type/<?php echo $value['type2'];?>"><?php } ?>
                <br> <br><?php if(!empty($value['image']));{ ?>
                <img src="<?php echo $value['image']; ?>"><?php }
                if(empty($value['image'])){ echo'<img src="img/pokemon/default">'; }
                ?>
                </p>
            </div>
            <a href="updateP.php?id=<?php echo $value['id']; ?>"><button type="button"  class="btn btn-outline-light">Voir plus</button></a>
            <br>
        </div>
    </div>
    
    <?php
}

?>