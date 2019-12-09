<?php 
    include_once('../fonction/main.php');
    $main=new main();
    $sql="SELECT produit.idProduit,produit.designation FROM `produit`";
    $resultat=$main->queryAll($sql);
?>
<div class = "container">
         <div class="row">
            <div class="col-md-12 img-container">
                <h4>Liste des produits</h4>
                <input class = "form-control inputiltre" id="demo" type = "text" placeholder = "Rechercher"><br>
                <table class="table text-center ajuste-table table-bordered">
                            <thead>
                            <tr class="bg-info blanc">
                                <th>Code produit</th>
                                <th>Photo</th>
                                <th>Désignation</th>
                            </tr>
                            </thead>
                            <tbody id="test">
                               <?php foreach($resultat as $resultat){?>
                                <tr>
                                    <td class="text-center" >
                                        <!--nom du produit-->
                                    <a href="?page=detail_produit&idProduit=<?=$resultat['idProduit']?>" class="text-info stretched-linky">   <?=$resultat['idProduit']?></a>
                                       
                                    </td>
                                    <td class="">
                                        <?php  
                                            $filename = "../image/produit/".$resultat['idProduit'].".jpg";
                                            //test si le fichier existe ou pas
                                            if (file_exists($filename)) {?>
                                                <img id="" class=" img img-rounded aj" src="../image/produit/<?=$resultat['idProduit']?>.jpg" alt="Photo Produit" style="width:60px;height:60px;">                                   
                                            <?php  
                                            }else{ 
                                            ?>
                                                <img id="" class="ajuste-photo" src="../image/produit/PRO015.png" alt="Insérez photo" style="width:60px;height:60px;">
                                            <?php };
                                        ?>
                                        
                                    </td>
                                    <td class="text-center">
                                        <?= $resultat['designation']; ?>
                                    </td>
                                </tr>
                               <?php } ?>
                            </tbody>
                </table>
            </div>
    </div>
</div>