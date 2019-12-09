<?php
    include_once("../include/include.php");
    if(isset($_POST['ville']) AND isset($_POST['date'])){
        if(!empty($_POST['ville']) AND !empty($_POST['date'])){
            $date = new DateTime($_POST['date']);
            $ville=$_POST['ville'];
            $sql="SELECT `trajet` FROM `mes_terrains` WHERE `id_coach` LIKE '".$_SESSION['matricule']."' AND `date_ter` LIKE '".$date->format('Y-m-d')."'";
            $trajet1=$main->query($sql);
            ?>
            
            <?php
           
            echo $trajet1['trajet'].'<img src="../../image/carte/map ampandrana.png" alt="" width="100%" style="margin-top:10px;marigin-bottom:10px">';
            echo "Carte de la ville";
            
        }else{
            echo "Pas de ville et de trajet";
        }
    }else{
        echo "Erreur";
    }