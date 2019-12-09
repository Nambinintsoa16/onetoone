<?php
$sql="SELECT historique_personnel.id,historique_personnel.personnel,historique_personnel.heure,historique_personnel.date,historique_personnel.activite,
historique_personnel.point,vente.idVP,vente.heure,vente.codeproduit,vente.quantite,historique_personnel.facture,vente.facture FROM `historique_personnel`,`vente` WHERE historique_personnel.id LIKE ? AND vente.heure LIKE ? AND historique_personnel.facture LIKE ?";
$vente = $main->query($sql,array($_GET['id'],$_GET['heure'],$_GET['facture']));
?>
<style> 
    .b1{
        font-size:10px;
    }
    h2{
        font-size:10px;
    }
    .h1{
        font-size:10px;
        font-weight: bold;
    }
    .container{
        margin-top:10px;
    }
    span{
        font-size: 10px;
        text-transform:capitalize;
        margin-left:10px;
    }
    p{
        font-size: 10px;
    }
    .b2{
        width:200px;
        font-size: 10px;
        font-weight: bold;
    }
    active{
        color:black;
    }
</style>
<html>
    <div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item b1">
                <a href="?page">Accueil</a></li>
           <li class="breadcrumb-item b1">
                <a href="?page=moncompte">Mon Compte</a></li>
            <li class="breadcrumb-item b1" aria-current="page">Information sur les points</li>
        </ol>
    </nav>
    <article class="container">
        <div class="row">
            <div class="col-md-4"><h2>Date : <span><?= $vente['date'] ?></span> </h2></div>
             <div class="col-md-4"><h2>Heure : <span><?= $vente['heure']?></span> </h2></div>
            <div class="col-md-4"><h2>Type : <span><?= $vente['activite']?></span> </h2></div>
        </div>
        <hr>
        <div class="row"> 
        <div class="col-md-6"> <label for="boutonpt" class='h1'>Nombre de points</label> </div>
        <div class="col-md-6"><button class="btn btn-success b2" id="boutonpt"><?=$vente['point'] ?></button></div>
        </div>
        <hr>
        <h1 class="h1">Historique de vente</h1> </div>
        <div class="container">
        <table class="table table-bordered" style="font-size: 10px;">
            <thead>
                <tr>
                    <th>Code Produit</th>
                    <th>Quantité</th>
                    <th>N° Facture</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $vente = $main->queryAll($sql,array($_GET['id'],$_GET['heure'],$_GET['facture']));
                      $sql="SELECT prix.prixdetail,prix.prixgros,produit.designation FROM prix,`produit` WHERE produit.idProduit LIKE ? AND prix.statut LIKE 'on'";
                       
                foreach($vente as $vente) {
                    $titre_produit=$main->query($sql,array($vente['codeproduit']));?>
                <tr>
                    <td><a href="<?="../image/produit/".$vente['codeproduit'].".jpg" ?>" data-lightbox="roadtrip" title="<?= $titre_produit['designation'] ."<br>Prix detail: ". number_format($titre_produit['prixdetail'],0,","," ")." Ar <br>Prix de gros: ". number_format($titre_produit['prixgros'],0,","," ") ." Ar"?>" data-toggle="lightbox"><?= $vente['codeproduit'] ?></a></td>
                    <td><?= $vente['quantite'] ?></td>
                    <td><?php if($vente['facture']===''){
                        echo "Aucune facture";
                    }else{
                    echo $vente['facture'];
                    }; ?></td>
                </tr>
                <?php }; ?>    
            </tbody>
        </table>
        </div>
    </article>
</html>  