<?php 
    include "header.php";
    include_once("../include/include.php");

$sqlPanier="SELECT `desigbation`, `IdProduit` FROM `panier` WHERE `desigbation` LIKE ?";
$resultatPanier=$main->queryAll($sqlPanier,array($_POST['panier']));

                  
foreach($resultatPanier as $resultatPanier){
    //table produit
    $sqlproduit="SELECT `designation`,`idProduit` FROM `produit` WHERE `idProduit` LIKE ? ";//`idProduit`
    $resultatProduit=$main->query($sqlproduit,array($resultatPanier['IdProduit']));
    
    //COMPTER LE NOMBRE DE PRODUIT DANS PANIER
        $sqlNbrPanier="SELECT COUNT(`IdProduit`) as compte FROM `panier` WHERE `IdProduit` LIKE ?  ";
        $rsNbrPanier=$main->query($sqlNbrPanier,array($resultatPanier['IdProduit']));
    //Compter Le nombre de produit vendue    
        $sqlnbrVente="SELECT COUNT(`codeproduit`) as vendue FROM `vente` WHERE `codeproduit` LIKE ?";
        $rsNbrVente=$main->query($sqlnbrVente,array($resultatPanier['IdProduit']));
        //reste produit
        $reste=$rsNbrPanier['compte']-$rsNbrVente['vendue'];
        
        //CA par produit
        $CaProduit="SELECT `prixdetail` FROM `prix` WHERE `idProduit` LIKE ?";
        $ResultatCA=$main->query($CaProduit,array($resultatProduit['idProduit']));//$resultatProduit['idProduit']
        
        $CA=number_format($ResultatCA['prixdetail']*$rsNbrPanier['compte']);// prixdetail*quantite
        
?>

    
                    <tr>
                                  <td><?= $resultatPanier['IdProduit'] ?></td>
                                  <td><?= $resultatProduit['designation'] ?></td>
                                  <td><?=$rsNbrPanier['compte']?></td>
                                  <td><?=$rsNbrVente['vendue']?> </td>
                                  <td><?=$CA." AR"?></td>
                                  <td><?=$reste?></td>
                                  <td>10</td>
                                <?php 
                                    $filename = "../image/produit/".$resultatPanier['IdProduit'].".jpg";
                                
                                    if (file_exists($filename)) {
                                ?>
                                    <td><img src="../image/produit/<?= $resultatPanier['IdProduit'] ?>.jpg" width="80px" alt="<?= $resultatPanier['IdProduit'] ?>"></td>
                                <?php  
                                    }else{ 
                                ?>
                                
                                  <td><img src="../image/produit/image.jpg" width="80px" alt="<?= $resultatPanier['IdProduit'] ?>"></td>
                                <?php } ?>
                                  <td><a href="info-produit.php?Idproduit=<?=$resultatPanier['IdProduit']?>"> 
                                    <i class="fa fa-edit" style="font-size: 20px;margin-top: 5px;color: #00a65a "></i>
                                  </a></td>
                    </tr>



<?php }


?>
