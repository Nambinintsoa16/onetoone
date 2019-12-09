<?php
include_once('../fonction/main.php');
$main_gest=new main('localhost','inexped1_gestiondevente','inexped1_admin','crea.dev.121*');
$sql="SELECT * FROM `client` WHERE `idclient` LIKE ?";
$codeClient=$_GET['codeClient'];
$client=$main_gest->query($sql,array($codeClient));

?>
<style>
    .stat_btn{
        position:absolute;
        top:7px;
       left:10px;
       color:#417bea;
       font-size:65px;
    }

    .ajuste{
        position:relative;
        top:-25px;
       left:0px;
       color:white;
       font-size:11px;
       border-radius: 0px;
    }
   
     
</style>
        
        
        
<div class="card">
        
        <img class="card-img-top" class="img-thumbnail"  src="http://magesty.in-expedition.com/img/photoclient/<?=$client['photo']?>">
      <!--  <i class="fa fa fa-star fa-spin stat_btn"></i><span class="ajuste"></span>-->
   
        <button type="button" class="btn btn-primary ajuste">
          <?=$client['Statut']?>
        </button>
        <div class="card-body">
            <p class="card-text text-center col-md-12" style="margin-top:-25px;"> <h4 class="text-center"><strong><?=$client['idclient']?></strong></h4></p>
            <p class="card-text text-center" style="font-size:12px;">
            
                Nom : <?=$client['identifientsurfacebook']?></br>
                Contact : <?=$client['contact']?></br>
                Tranche d'age : <?=$client['trancedage']?></br> 
                Situation matrimoniale :<?=$client['situationmatrimonial']?></br>
                Ville :<?=$client['ville']?></br>
                Quartier :<?=$client['quartier']?></br>
                Date d'enregistrement :<?=$client['datedenregestrement']?></br>
                <a href="?page=historiqueAchatClient&codeClient=<?=$client['idclient']?>" class="" style="font-size:11px;color:green;">Historique d'achat &nbsp;<i class="fa fa-history" aria-hidden="true"></i>
                </a><br/><br/>
    
                        <img class="card-img-top img-thumbnail centrage" style="width:100px;height:100px" alt="QR Code" src="http://magesty.in-expedition.com/img/QRcode/<?=$client['qrcode']?>.png">

            </p>
            
            
        </div>
</div>       
        
        
        
        
        
        
        
        
        
        
        
