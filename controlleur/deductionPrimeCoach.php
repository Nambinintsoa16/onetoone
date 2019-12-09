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
  
       <div class="row" style="padding:10px 0px">
           <div class="col-md-12">
                    <blockquote>
                        <h4 class="text-left py-2" style="font-size:20px;color:#000">Choisissez</h4>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                  <select class="form-control choix_deduc_bon">
                                      <option value="deduction">Déduction</option>
                                      <option value="primebon">Prime et bonus</option>
                                  </select>
                            </div>
                            <div class="form-group col-md-4">
                                  <select class="form-control choix_coach">
                                      <option value="0">Les coach</option>
                                      <?php
                                            $sql="SELECT `matricule`,`Nom`,`Prenom` FROM `personnel`,fonction WHERE fonction.DesFonction LIKE ? AND `Fonction_Acutelle` = fonction.id";
                                            $les_coach = $main->queryAll($sql,array('coach'));
                                            foreach($les_coach as $les_coach): ?>
                                      <option value="<?=$les_coach['matricule']?>"><?=$les_coach['matricule'].'|'.$les_coach['Nom'].' '.$les_coach['Prenom']?></option>
                                      <?php endforeach; ?>
                                  </select>
                            </div>
                        </div>
                    </blockquote>
           </div>
           <div class="col-md-12 deduction_de_coach">
                    <blockquote>
                            <h4 class="text-left py-2" style="font-size:20px;color:#000"><span class="titre">Déduction</span><span class="coach"></span><span class="remarque"> *veuillez choisir un coach</span></h4>
                          <div class="form-row">
                              
                                <div class="form-group col-md-4">
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
      <div class="col-md-12 bonus_de_coach d-none">
                    <blockquote>
                            <h4 class="text-left py-2" style="font-size:20px;color:#000"><span class="titre">Prime et bonus</span><span class="coach"></span><span class="remarque"> *veuillez choisir un coach</span></h4>
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