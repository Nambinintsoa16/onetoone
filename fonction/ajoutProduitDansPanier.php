<?php
    include_once("../include/include.php");
        if(isset($_POST['idProduit'])){
           if(!empty($_POST['idProduit'])){
                  $sql="INSERT INTO `panier` (`id`, `desigbation`, `IdProduit`, `date`, `status`) VALUES (?,?,?,?,?)";
                  $resultat=$main->query($sql,array(NULL,$_POST['designation'],$_POST['idProduit'],date("Y-m-d"),'Actif'));
                   echo '<h4 class="text-success text-center">Nouveau Produit ajouté dans Panier</h4>';
                   
           }else{
               echo '<h4 class="text-danger text-center">Veuillez complete tous les champs</h4>';
           }
       }else{
           echo '<h4 class="text-danger text-center">Erreur d`\' insertion</h4>';
       }
?>