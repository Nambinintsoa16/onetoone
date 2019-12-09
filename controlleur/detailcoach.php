<?php 
include_once("../include/include.php");
include ("header.php");
$coach = $_GET['coach'];
$sql="SELECT `Nom`,`Prenom` FROM `personnel` WHERE `matricule` LIKE ?";
$details_coach=$main->query($sql,array($coach));
?>
<!--tsy azo fafana --><span class="controlleur d-none"><?=$_SESSION['matricule']?></span><!-- FIN -->
<div class="content-wrapper">
   <div class="container">
   <!--   <div class="row" style="background-image:url('images/pannier.jpg');min-height:270px;padding-top:30px;padding:30px 20px">
           <div class="col-md-6" style="padding:0px 5px">
               <div >
                <div class="row"  style="background:white;min-height:200px;-webkit-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);
box-shadow: 3px 2px 5px 0px rgba(0,0,0,0.75);padding:20px 20px">
                    
                   <div class="col-md-5 col-sm-5 col-5" style="height:150px;border-radius:5px; padding:40px 15px;cursor:pointer;background:#<?php if(isset($_GET['couleur']) and !empty($_GET['couleur'])){ echo $_GET['couleur']; }else{ echo "C0C0C0";} ?>" data-toggle="modal" data-target="#detailpanier">
                      <i class="fa fa-shopping-cart" style="font-size:36px;color:#fff;text-align:center;"></i> <br> <span style="color:#fff;font-size:22px" class="texte panier_id">Panier <?=$_GET['designation'];?></span> 
                   </div> 
                   <div class="col-md-7 col-sm-7 col-7" style="padding:0px 20px">
                       Equipes atachés
                    <ul style="list-style-type:none;padding-left: 10px;font-size:12px">

                       <li>- </li>
     

                    </ul>
                   <p style="margin-top:-10px;">
                       Prévision C A<br>
                     <span style="padding-left:10px;font-size:12px"> - 7,000,000 Ar </span> 
                   </p>
                    
                   </div>
                  
                </div>
            </div>
          </div>
        
       </div> -->
       
       <div class="row" style="padding:10px 0px">
           
           <div class="col-md-12">
                  <blockquote>
                            <h4 class="text-left py-2" style="font-size:20px;color:#000"><!--tsy azo fafana ny span--><span class="coach"><?=$coach?></span>| <?=$details_coach['Nom']." ".$details_coach['Prenom']?></h4>
                  </blockquote>      
            </div>
           <div class="col-md-12">
                    <blockquote>
                            <h4 class="text-left py-2" style="font-size:20px;color:#000">Déduction</h4>
                          <div class="form-row">
                                <div class="form-group col-md-4 change_observation">
                                  <select class="form-control description_coach">
                                      <option>Déscription</option>
                                      <option>Telephone</option>
                                      <option>Absence </option>
                                      <option>Manque </option>
                                      <option>Malus </option>
                                      <option>Autre </option>
                                  </select>
                                </div>
                                <div class="form-group col-md-3 obs"><input type="text" class="form-control observation" name="observation"  placeholder="Observation"></div>
                                <div class="form-group col-md-4">
                                    <input type="date" class="form-control date_deduction_coach" name="date">
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control time_deduction_coach" type="time" value="13:45:00">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control montant_deduction_coach" name="montant"  placeholder="Montant (*Ar)">
                                </div>
                                <div class="form-group col-md-1">
                                 
                                    <i class="fa fa-plus-square ajoutdeduction_coach" style="font-size:40px;color:#33b5e5;cursor:pointer"></i>
                                    
                                </div>
                          </div>
                          
                    </blockquote>
      </div>
      <div class="col-md-12">
                    <blockquote>
                            <h4 class="text-left py-2" style="font-size:20px;color:#000">Prime et bonus</h4>
                          <div class="form-row">
                                <div class="form-group col-md-3"><input type="text" class="form-control motif" name="motif"  placeholder="Motif"></div>
                                <div class="form-group col-md-4">
                                    <input type="date" class="form-control date_bonus_coach" name="date">
                                </div>
                                <div class="form-group col-md-4">
                                    <input class="form-control time_bonus_coach" type="time" value="13:45:00">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control montant_bonus_coach" name="montant"  placeholder="Montant (*Ar)">
                                </div>
                                <div class="form-group col-md-1">
                                 
                                    <i class="fa fa-plus-square ajoutbonus_coach" style="font-size:40px;color:#33b5e5;cursor:pointer"></i>
                                    
                                </div>
                          </div>
                          
                    </blockquote>
      </div>
   </div>
</div>
</div>
<?php include "footer.php";?>