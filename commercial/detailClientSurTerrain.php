<?php 
    include_once('../fonction/main.php');
      $sql="SELECT * FROM `clientTr` WHERE `codeClient` LIKE ?";
    $client=$main->query($sql,array($_GET['codeClient']));
    //CLT-TR-0000097-19-10
?>


<div class="card">
    <?php if(file_exists("../image/client/".$client['codeClient'].".jpg")){ ?>
       
       <img class="card-img-top" class="img-thumbnail"  src="../image/client/<?=$client['codeClient'].".jpg"?>">
    <?php } else{?>
    
         <img src="http://magesty.in-expedition.com/img/photoclient/CLT-pardefaut.jpg" alt="Photo client sur terrain" class="img-thumbnail">
    <?php }?>
    <div class="card-body">
        <p class="card-text text-center col-md-12" style="margin-top:-25px;font-size:12px;"> 
            <h4 class="text-center" style="font-size:13px"><strong><?=$_GET['codeClient']?></strong></h4>
        </p>
        <p class="card-text text-center" style="font-size:12px;display:block">
       
            Nom et Prénom  : <?= $client['Nom']." "?> <?= $client['Prenom']?></br>
            Ville :<?=$client['ville']?></br>
            Quartier :<?=$client['quartier']?></br>
            <?php $contact=str_split($client['contact']);  ?>
            Contact :<?= "+261 ".$contact[1].$contact[2]."&nbsp;".$contact[3].$contact[4].$contact[5]."&nbsp;".$contact[6].$contact[7]?></br>
        
            <a href="?page=historiqueAchatClientSurTerrain&codeClient=<?=$client['codeClient']?>" class="" style="font-size:11px;color:green;">Historique d'achat &nbsp;<i class="fa fa-history" aria-hidden="true"></i>
            <br/><br/>
            <?php if(file_exists("../image/QRCode/QRCODE_CLIENT/".$client['codeClient'].".png")){ ?>
                    <img class="card-img-top img-thumbnail centrage " style="width:100px;height:100px"  src="../image/QRCode/QRCODE_CLIENT/<?=$client['codeClient'].".png"?>">
            <?php } else{?>
                
                <img class="img-thumbnail imd-fluid imageQr bg-dark" src="" title="Aucun image qrcode" style="width:100px;height:100px;">    
               <br>
               <span style="position:relative;bottom:65px;font-size:16px;">
                   <span class="bg-warning" style="width:100px;">Aucun Qrcode</span>
                </span>
            
             
            <?php }?>
            
       </p>

    </div>

  </div>  
        

