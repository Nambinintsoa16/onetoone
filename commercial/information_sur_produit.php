<?php
include_once('../include/include.php');
if(isset($_GET['codeProduit']) AND !empty($_GET['codeProduit'])):
   $sql="SELECT * FROM `produit` WHERE `idProduit` LIKE ?";
   $produit=$main->query($sql,array($_GET['codeProduit']));
   $sql="SELECT `prixdetail`,`prixgros` FROM `prix` WHERE `idMission` LIKE ? AND `idProduit` LIKE ?";
   $prix=$main->query($sql,array($_SESSION['idMission'],$_GET['codeProduit']));
   if($produit):
    $contImage=scandir("../image/produit");
    if(in_array($produit['idProduit'].'.jpg',$contImage )){
        $image="../image/produit/".$produit['idProduit'].".jpg";
    }else{
        $image="../images/point_interro.jpg";  
    }
       
?>
<style>
     @media screen and (min-width: 992px) { /*ORDINATEUR*/
        .text-size{
            font-size:13px;
        }
        .fondSize{
            height:150px;
            width:150px;
        }
        .ajustement-text{
              margin-left:200px;
        }
    }
    
    @media screen and (min-width: 768px) { /*TABLETTE*/
        .text-size{
            font-size:13px;
        }
        .fondSize{
            height:150px;
            width:150px;
        }
        .ajustement-btn{
            font-size:13px;margin-bottom:5px;margin-top:5px;width:160px;
            margin-left:5px;
        }
        .nav1{
            flex-wrap: wrap;
            display: flex;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }
    }
   
    @media screen and (max-width: 768px){/*MOBILE*/
        .fondSize{
            height:110px;
        }
        .text-size{
            font-size:10px;
        }
        .ajustement-text{
            position:absolut;margin-top:-120px;font-size:11px;margin-left:130px;
        }
        .ajustement-btn{
            font-size:10px;margin-bottom:5px;margin-top:5px;width:130px;
        }
        .nav{
            flex-wrap: nowrap;
 
        }
    }
</style>
<div class="jumbotron jumbotron-fluid" style="">
  <div class="container" >
    <div class="row">
       <div class="col-md-5">
            <a href="<?=$image?>" data-lightbox="roadtrip" title="
                <div class='text-center '>
                    <h4 class='text-center'><?=$produit['codeproduit']?></h4>
                    <h3 class='text-center' style='font-size:12px;'>
                         Code produit:<?= $produit['idPoduit'] ?>
                         Quantité: <?= $produit['quantite']?></br>
                         
                    </h3>
                </div>
            ">
                <img class="img-thumbnail fondSize" src="<?=$image?>"  style="margin-top:-10px;">
            </a>
       </div>
       <div class="col-md-4 ajustement-text">
            <?=$produit['designation']?><br/>
            Qt : <?=$produit['quantite']?><br/>
            <div style="display:inline-block;">
                <span class="btn btn-danger ajustement-btn" style="">Prix Det : <?= number_format($prix['prixdetail'], 2, ',', ' ');?> Ar</span><br/>
            </div>
            <div style="display:inline-block;">
                <span class="btn btn-danger ajustement-btn" style="">Prix Gr :<?=number_format($prix['prixgros'],2,',',' ')?> Ar</span>
            </div>
    
        </div>
     </div>
   </div>
</div>

     <div class="card" >
              <div class="card-header" style="margin:0px;">
                <ul class="nav nav-pills justify-content-center" style="font-size:7px;margin:0px;">
                  <li class="nav-item " ><a class="nav-link active" href="#activity" data-toggle="tab">Déscription</a></li>
                  <li class="nav-item " ><a class="nav-link" href="#timeline" data-toggle="tab">Présentation</a></li>
                  <li class="nav-item " ><a class="nav-link" href="#settings" data-toggle="tab">Argumentaire</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity" style="font-size:10px;">
                    <h4 style="font-size:13px;">Description</h4>      
                    <p><?=$produit['description']?></p>
                     <h4 style="font-size:13px;">Ingrédients</h4>   
                    <p><?=$produit['ingredient']?></p>
                     <h4 style="font-size:13px;">Mode d'utilisation</h4>  
                    <p><?=$produit['modedutilisation']?></p>
                  </div>
                  <div class="tab-pane" id="timeline" style="font-size:10px;">
                      <?=$produit['presentation']?>
                  </div>
                  <div class="tab-pane" id="settings" style="font-size:10px;">
                    <?=$produit['argumentaire']?>

                  </div>
               </div>
             </div>
          </div>  

   <?php else:
       header('Location:?page=ERROR_404');
 endif;
 endif;?>
