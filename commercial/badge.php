<?php
$sql="SELECT `Nom`,`Prenom`,`date_d_embauche`,`CIN_COM`,`Contact_flotte` FROM `personnel` WHERE `matricule` LIKE ?";
$matricule=$main->query($sql,array($_SESSION['matricule']));
?>

<div class="container" style="padding:0px 0px">
     <div class="row" >
        <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-10 ofsset-sm-1 col-12 badge_content" style="background-color:rgb(255,255,255);box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
border:solid 1px #ccc;
min-height:00px;">
            <div class="row entete justify-content-center" style="background-color:rgb(255,255,255);">
               <div class="col-md-6 entete_text" style="padding-top:25px">
                   <div style="width:150px;position:relative;margin:auto;overflow:hidden">
                    <img  style="width:150px" src="../image/logomobile.png" alt="">
                  </div>
                   
               </div>
                
            </div>
             <div class="row entete justify-content-center" style="background-color:rgb(255,255,255);margin-bottom:35px;margin-top:0px">
               <div class="col-md-6 entete_text" style="padding-top:0px;">
                   <div class="text-center" style="margin-bottom:10px!important;color:#000;font-weight:bold;padding-top:0px;paddding-bottom:0px;font-size:22px"  > 
                   <span style="color:#f50302;letter-spacing: 0px;font-weight:normal">ANIMATRICE
                  </div>
                   
               </div>
                
            </div>
             <div class="row" style="background: #fe0000;height:20px;margin-top:60px">
                 <div style="-webkit-box-shadow: inset 0px 1px 0px 5px rgba(227,43,126,1);
-moz-box-shadow: inset 0px 1px 0px 5px rgba(227,43,126,1);
box-shadow: inset 0px 1px 0px 5px rgba(227,43,126,1);width:150px;height:150px;border-radius:50%;border:5px solid #fff;background:#fff;top:-55px;position:relative;margin:auto;overflow:hidden">
                     <img class=""  style="height: 150px;width:150px" src="../image/personnel/<?=$_SESSION['matricule'] ?>.jpg" alt="">
                 </div>
                
            </div>
             <div class="row" style="background-color:rgb(255,255,255) ;border-top:4px solid rgb(57,57,57,57); height:5px; margin-top:10px">
                
            </div>
            <div class="row" style="background:  #fe0000;height:10px;margin-top:3px">
             
            </div>
            <div class="row" style="background-color:rgb(56,56,56);height:20px">
             
                
            </div>
            <div class="row" style="background-color:rgb(56,56,56);height:20px">
             
                
            </div>
            <div class="row" style="background-color:rgb(56,56,56,56);height:20px">
             
                
            </div>
            
 
             <div class="row" style="background-color:rgb(56,56,56);min-height:120px;border-left: 10px solid  #fe0000;;border-right: 10px solid #fe0000;">
                 <div class="col-md-12">
                        <h3 class="text-center text-white" style="font-size:20px;font-weight:bold" ><?=$matricule['Nom']?></h3>
                        <h5 class="text-center text-white" style="font-weight:bold"><?=$matricule['Prenom']?></h5>
                        <h5 class="text-center text-white" style="font-weight:bold"><?php 
                        $cin=str_split($matricule['CIN_COM']);
                       echo $cin[0].$cin[1].$cin[2]."-".$cin[3].$cin[4].$cin[5]."-".$cin[6].$cin[7].$cin[8]."-".$cin[9].$cin[10].$cin[11];
                       
                        ?></5>
                         <h5 class="text-center text-white" style="font-weight:bold"><?=$_SESSION['matricule']?></5>
                        
                 </div>
            </div>
            
             <div class="row" style="background-color:rgb(56,56,56);min-height:100px;padding-bottom:20px;border-bottom:solid 10px  #fe0000;" >
               <div style="width:120px;height:120px;border:2px solid #ddd;background:#fff;top:0px;position:relative;margin:auto;overflow:hidden;border-radius:5px;" >
                <a  data-lightbox="roadtrip" title="<?=$_SESSION['matricule']?>" src="../image/QRCode/<?=$_SESSION['matricule']?>.png"><img class="img-thumbnail"  src="../image/QRCode/<?=$_SESSION['matricule']?>.png" alt="" style="width:118px; height:118px;"></a>
                 </div>
                
            </div>
        </div>

        </div>
  
</div>


