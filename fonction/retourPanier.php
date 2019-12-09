<?php
    include_once('../include/include.php');
    $sql="SELECT `IdProduit` FROM `panier` WHERE `desigbation` LIKE ?";
    $data=$main->queryAll($sql,array($_POST['panier']));
?>
 <input class = "form-control  col-md-12" id = "demo" type = "text" placeholder = "Cherche ici,..">
<table class="table" style="margin-top:30px;"> 
    <thead class="thead-dark">
        <tr>
            <th class="text-center" style="font-size:12px;">Produit</th>
            <th class="text-center" style="font-size:12px;">Aperçu</th>
        </tr>
    </thead>
    <tbody id="test">
        <?php  if($data):  foreach($data as $data):
            $sql="SELECT `designation`,`quantite` FROM `produit` WHERE `idProduit` LIKE ?";
            $produit=$main->query($sql,array($data['IdProduit']));
        ?>
        <tr>
          <td class="text-center"><a href="?page=information_sur_produit&codeProduit=<?=$data['IdProduit']?>"><p style="font-size:11px;"><?= $data['IdProduit'];?><br/><?=$produit['designation'];?></p></a></td>    
          <td><img class="img-thumbnail" style="height:70px;" src="../image/produit/<?=$data['IdProduit']?>.jpg"></td>    
        </tr>
        <?php endforeach; endif; ?>
    </tbody>
    <tfoot></tfoot>
</table>

