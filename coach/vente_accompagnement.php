<?php 
    $titre = "Vente d'accompagnement";
    include "header.php";
    $sql="SELECT `com_1`,`com_2`,`panier`,`id_mission` FROM `mes-accompagnement` WHERE `date_accomp` LIKE ? AND `id_coach` LIKE ?";
    $accomp=$main->query($sql,array(date('Y-m-d'),$_SESSION['matricule'])); 
    $_SESSION['panier'] = $accomp['panier'];
    $_SESSION['idMission']=$accomp['id_mission'];
?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-corp">
      <div class="container-fluid">
                        
                        <h4 class="" style="padding-top:10px;padding-bottom:20px;font-size:16px;">PANIER | <a href="#" class="badge badge-primary detailPaniercoach" id="<?= $accomp['panier']; ?>"><?= $accomp['panier']; ?></a>
                            <a href="calendrier_accomp.php" class="btn btn-primary btn-xs pull-right" style="margin-right:0px">Calendrier de vente</a>
                        </h4>
                        
                          <form class="text-center" style="color: #757575;" action="#!">
                              
                                    <div class="form-group ">
                                       <select class="form-control comm"  style="font-size:13px;opacity:0.7;" >
                                           <option>Mes accompagnement</option>
                                           <option><?= $accomp['com_1']; ?></option>
                                           <option><?= $accomp['com_2']; ?></option>
                                       </select>
                                    </div>
                                    
                              
                                    <div class="form-group">
                                        <input type="text" style="font-size:13px;opacity:0.7;" class="form-control ville" required placeholder="Ville">
                                    </div>
                        
                        
                                    <div class="form-group">
                                        <input type="text" style="font-size:13px;opacity:0.7;" class="form-control quartier" required placeholder="Quartier">
                                    </div>

                                    <div class="form-group">
                                        <a href="#" class="btn btn-primary evaluation form-control" data-toggle="modal" data-target="#evaluation" data-whatever="" style="margin-top:1px">Evaluation : <span class="note_moyenne_aff">0</span> de moyenne</a>
                                    </div>
                                    <!-- MODAL DE L EVALUATION DU COMMERCIAL -->
                                            <div class="modal fade" id="evaluation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Motif</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form>
                                                          <div class="input-group mb-2 mr-sm-2">
                                                             <label for="presentation" class="form-control" width="100px">Présentation</label>
                                                            <input type="text"  class="form-control note_presentation note text-center" id="presentation" maxLength="1" placeholder="Note">
                                                            <div class="input-group-prepend">
                                                              <div class="input-group-text">&nbsp;/&nbsp;5</div>
                                                            </div>
                                                          </div>
                                                          
                                                          <div class="input-group mb-2 mr-sm-2">
                                                             <label for="argumentaire" class="form-control">Argumentaire</label>
                                                            <input type="text" class="form-control note_argumentaire text-center note" id="argumentaire" maxLength="1" placeholder="Note">
                                                            <div class="input-group-prepend">
                                                              <div class="input-group-text">&nbsp;/&nbsp;5</div>
                                                            </div>
                                                          </div>
                                                          
                                                          <div class="input-group mb-2 mr-sm-2">
                                                             <label for="cible" class="form-control">Cible</label>
                                                            <input type="text" class="form-control note_cible text-center note" id="cible" maxLength="1" placeholder="Note">
                                                            <div class="input-group-prepend">
                                                              <div class="input-group-text">&nbsp;/&nbsp;5</div>
                                                            </div>
                                                          </div>
                                                          
                                                          <div class="input-group mb-2 mr-sm-2">
                                                             <label for="comportement" class="form-control">Comportement</label>
                                                            <input type="text" class="form-control note_comportement text-center note" id="comportement" maxLength="1" placeholder="Note">
                                                            <div class="input-group-prepend">
                                                              <div class="input-group-text">&nbsp;/&nbsp;5</div>
                                                            </div>
                                                          </div>
                                                          
                                                          <div class="input-group mb-2 mr-sm-2">
                                                             <label for="moyenne" class="form-control">Moyenne</label>
                                                             <input type="text" class="form-control note_moyenne text-center" id="moyenne" disabled placeholder="0">
                                                            <div class="input-group-prepend">
                                                              <div class="input-group-text">&nbsp;/&nbsp;5</div>
                                                            </div>
                                                          </div>
                                                        </form>
                                                  </div>
                                                  <div class="modal-footer footer">
                                                    <button type="button" class="btn btn-secondary clear_note" data-dismiss="modal">Fermer</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Enregistrer</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                    <!-- FIN DU MODAL -->
                                   <!-- <div class="form-group ">
                                       <select class="form-control evaluation"  style="font-size:13px;opacity:0.7;" >
                                           <option>Evaluation</option>
                                           <option>Passable</option>
                                           <option>Bien</option>
                                           <option>Tres bien</option>
                                       </select>
                                    </div>-->
                                    
                                    
                        
                             <div class="form-row mb-2">
                                 <div class="col">
                                             <div class="md-form">
                                               
                                                <button type="button" data-target="#exist" data-toggle="collapse"  class="btn btn-secondary btn-xs btn-block cli"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Client fidèle</button>
                                            </div>
                                 </div>
                                  
                                        
                                        <div class="col">
                                             <div class="md-form">
                                                
                                                <button type="button" data-target="#new" data-toggle="collapse" id="newcli" class="btn btn-secondary btn-xs btn-block cli"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nouveau client</button>
                                            </div>
                                        </div>
                                        
                                    </div> 
                                    
                                     
                                  
                                     
                            <div id="new" class="collapse form-group">
                                         
                                    <div class="form-group">
                                        <input type="text" style="font-size:13px;opacity:0.7;" class="form-control Nom" required placeholder="Nom">
                                    </div>
                        
                                    <div class="form-group">
                                        <input type="text" style="font-size:13px;opacity:0.7;" class="form-control Prenom" required placeholder="Prénom">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" style="font-size:13px;opacity:0.7;" class="form-control contact" required placeholder="Numéro téléphone">
                                    </div>
                                    
                                     <div class="form-group ">
                                       <select class="form-control sexe"  style="font-size:13px;opacity:0.7;" >
                                           <option>Femme</option>
                                           <option>Homme</option>
                                       </select>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="col">
                                             <div class="md-form">
                                               <input type="number" style="font-size:13px;opacity:0.7;" class="form-control jour" required placeholder="Jour">
                                            </div>
                                        </div>
                                        
                                        <div class="col">
                                             <div class="md-form">
                                                 <select style="font-size:13px;opacity:0.7;" class="form-control mois" required placeholder="Mois"> 
                                                        <option value="01">Janvier</option>
                                                        <option value="02">Février</option>
                                                        <option value="03">Mars</option>
                                                        <option value="04">Avril</option>
                                                        <option value="05">Mai</option>
                                                        <option value="06">Juin</option>
                                                        <option value="07">Juillet</option>
                                                        <option value="08">Août</option>
                                                        <option value="09">Septembre</option>
                                                        <option value="10">Octobre</option>
                                                        <option value="11">Novembre</option>
                                                        <option value="12">Décembre</option>
                                               </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col">
                                             <div class="md-form">
                                                 <select style="font-size:13px;opacity:0.7;" class="form-control mois" required placeholder="Mois"> 
                                                    <?php for($i=1970;$i<2004;$i++){ ?>
                                                        <option type="year" class="anne" value="<?= $i ?>"><?= $i ?></option>
                                                    <?php } ?>
                                               </select>
                                               <!--<input type="year" style="font-size:13px;opacity:0.7;" class="form-control anne" required placeholder="Année">-->
                                            </div>
                                        </div>
                                        
                                    </div>
                         </div>
                                     
                                     
                            <div id="exist" class="collapse form-group">
                                       
                                               <input type="text" style="font-size:13px;opacity:0.7;" class="form-control codeClient" required placeholder="Nom et prénom du client">
                                          
                          </div>
    
                                    <div class="form-row">
                                     
                                                     <div class="col-md-9 col-sm-9 col-9">
                                                        <input type="text" style="font-size:13px;opacity:0.7;"  class="form-control input-produit codeproduit" required placeholder="Produit">
                                                    </div>
                                      
                                          
                                                
                                             
                                                     <div class="col-md-3 col-sm-3 col-3">
                                                        <a href="#" class="btn btn-primary valider-produit form-control" style="margin-top:1px">ajouter</a>
                                                    </div>
                                           
                                                
                                    </div> 
                                        
                                 
                                    
                                    
                                    
                                    
                                </form>
                            
                           <table class="table table-bordered table-striped" style="font-size:13px; margin-top: 10px;">
                            <thead>
                              <tr>
                        
                                <td style="border-left: solid #fff 1;background-color: #1E90FF; text-align: center;color: #fff; border-left: 1px solid #fff;font-size:13px;">Code</td>
                                <td style="border-left: solid #fff 1;background-color: #1E90FF; text-align: center;color: #fff; border-left: 1px solid #fff;font-size:13px;">QTT</td>
                                <td style="border-left: solid #fff 1;background-color: #1E90FF; text-align: center;color: #fff; border-left: 1px solid #fff;font-size:13px;">Total</td>
                              </tr>
                            </thead>
                             <tbody class="tbody">
                        
                        
                             </tbody>
                               <tfoot>
                                        <tr>
                                          <td>
                                          <label style="font-size:12px;">Sous total :<span class="sous"></span></label>
                                          </td>
                        
                                          <td>
                                          <label class="total text-center soustotal" style="font-size:10px;">00 Ar</label>
                                        </td>
                                        
                                        <td><a href="#" class="form-control btn btn-danger suppr"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                </tfoot>
                         </table>
                         <div class="row" style="padding-bottom:5px">
                             <div class="col-md-12">
                                   <a href="#" class="save_accomp btn btn-success pull-right" style="font-size:13px;margin-left:10px;width:100px" >Enregistrer</a>
                             </div>
                            
                         </div>
                        
                         <div style="postion:absolut;z-index:1000;margin-top:-230px;" class="text-center collapse loading">
                              <img id="ajax-loading" src="../images/loading.gif" alt="Loading" /> 
                         </div>   

                      <!--      
                       <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Message de confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annule</button>
                                <a href="#" class="btn btn-success data-dismiss="modal" btn-modal-success ">Accepter</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="modal erreur" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header text-center">
                                <h5 class="modal-title text-center" id="exampleModalLongTitle">Message d'erreur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body modal-body-erreur text-center">
                                Veuillez remplir correctement tous les informations.
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                        <div class="modal confi" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              
                                
                              <div class="modal-body text-center">
                                  Votre commande à bien été enregistrée avec Succès.
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                              </div>
                              
                            </div>
                          </div>
                        </div> -->

       </div>
    </div>
 </div>
 
 
 <?php include "footer.php";?>
 