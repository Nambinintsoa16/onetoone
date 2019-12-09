<?php 
$titre = "BONJOUR ET BIENVENUE";
include "header.php";
session_start();
include_once('../include/include.php');
$sql="SELECT `Nom`,`Prenom`,`date_d_embauche`,`CIN_COM`,`Contact_flotte` FROM `personnel` WHERE `matricule` LIKE ?";
$matricule=$main->query($sql,array($_SESSION['matricule']));


?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid">
            <div class="row" >
        <div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-10 ofsset-sm-1 col-12 badge_content" style="background-color:rgb(255,255,255);box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
-webkit-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
border:solid 1px #ccc;
min-height:00px;">
            <div class="row entete justify-content-center" style="background-color:rgb(255,255,255);">
               <div class="col-md-6 entete_text" style="padding-top:25px">
                   <div style="width:150px;position:relative;margin:auto;overflow:hidden">
                    <img  style="width:150px" src="images/logomobile.png" alt="">
                  </div>
                   
               </div>
                
            </div>
             <div class="row entete justify-content-center" style="background-color:rgb(255,255,255);margin-bottom:35px;margin-top:-10px">
               <div class="col-md-6 entete_text" style="padding-top:0px;">
                   <div class="text-center" style="margin-bottom:10px!important;color:#000;font-weight:bold;padding-top:0px;paddding-bottom:0px;font-size:25px"  > 
                   <span style="color:#00b9f9;letter-spacing: 10px;font-weight:bold">COACH
                  <p style="color:#000;font-weight:normal;font-size:14px;margin-top:-5px;letter-spacing: 3px;">D'ANIMATION </span></p> </div>
                   
               </div>
                
            </div>
             <div class="row" style="background: linear-gradient(#00b9f9, #0062eb);height:20px;margin-top:60px">
                 <div style="width:150px;height:150px;border-radius:50%;border:5px solid #00b9f9;background:#fff;top:-55px;position:relative;margin:auto;overflow:hidden">
                     <img class=""  style="height: 150px;width:150px" src="../image/personnel/<?=$_SESSION['matricule'] ?>.jpg" alt="">
                 </div>
                
            </div>
             <div class="row" style="background-color:rgb(255,255,255) ;border-top:4px solid rgb(57,57,57,57); height:5px; margin-top:10px">
                
            </div>
            <div class="row" style="background: linear-gradient(#00b9f9, #0062eb);height:10px;margin-top:3px">
             
            </div>
            <div class="row" style="background-color:rgb(56,56,56);height:20px">
             
                
            </div>
            <div class="row" style="background-color:rgb(56,56,56);height:20px">
             
                
            </div>
            <div class="row" style="background-color:rgb(56,56,56,56);height:20px">
             
                
            </div>
            
 
             <div class="row" style="background-color:rgb(56,56,56);min-height:120px;border-left: 10px solid #0062eb;border-right: 10px solid #0062eb">
                 <div class="col-md-12">
                        <h3 class="text-center text-white" style="font-size:20px;font-weight:bold" ><?=$matricule['Nom'];?></h3>
                        <h5 class="text-center text-white" style="font-weight:bold"><?=$matricule['Prenom'];?></h5>
                        <h5 class="text-center text-white" style="font-weight:bold"><?=$matricule['CIN_COM'];?></5>
                         <h5 class="text-center text-white" style="font-weight:bold"><?=$_SESSION['matricule']?></5>
                        
                 </div>
            </div>
            
             <div class="row" style="background-color:rgb(56,56,56);min-height:100px;padding-bottom:20px;border-bottom:solid 10px #0062eb " >
               <div style="width:120px;height:120px;border:2px solid #ddd;background:#fff;top:0px;position:relative;margin:auto;overflow:hidden;border-radius:5px;" >
                     <img class="img-thumbnail"  src="../image/QRCode/AP19641.png" alt="" style="width:118px; height:118px;">
                     
                 </div>
                
            </div>
        </div>

        </div>
      </div>
    </div>
  </div>
  <!-- Content Wrapper. Contains page content -->
   <!-- /.content-wrapper -->
   <?php include "footer.php";?>
 