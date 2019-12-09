<!-- FICHIER TEST C EST JUSTE POUR LE TEST -->

<h4 class="text-center" style="padding-top:10px;padding-bottom:20px;font-size:16px;">PANIER | <a href="#" class="badge badge-success detailPanier" id="<?= $_SESSION['panier']; ?>"><?= $_SESSION['panier']; ?> </a></h4>
  <form class="text-center" style="color: #757575;" action="#!">
 
      
            <div class="form-group">
                <input type="text" style="font-size:13px;opacity:0.7;" class="form-control ville" required placeholder="Ville">
            </div>


            <div class="form-group">
                <input type="text" style="font-size:13px;opacity:0.7;" class="form-control quartier" required placeholder="Quartier">
            </div>

     <div class="form-row mb-2">
         <div class="col">
                     <div class="md-form">
                        <a href="#" data-toggle="collapse" class="cli" data-target="#exist" style="color:#879ad4;"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Client fidèle</a>
                      
                    </div>
                </div>
           </a>  
                
                <div class="col">
                     <div class="md-form">
                        <a href="#" data-toggle="collapse" class="cli" data-target="#new" id="newcli" style="color:#00a9fe;"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nouveau client </a>
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
            
            
           <!-- <div class="form-group" style="margin-top:15px;">
               <label class="fileContainer btn btn-warning form-control" style="color:#fff;">Photo
                  <input type="file" class="imageClient"/>
                </label>-->
            
                <!--<div class="box col-md-12 col-lg-12" style="padding:0px;">
   <input type="file" name="file-7[]" id="file-7" class="inputfile inputfile-6 collapse " data-multiple-caption="{count} files selected" multiple />
   <label for="file-7" style="width:100%"><span><i class="fa fa-picture-o picture" style="margin-right:5px"></i>PHOTO</span></label>
              </div> 
 
  </div>-->
 </div>
             
             
    <div id="exist" class="collapse form-group">
               
                       <input type="text" style="font-size:13px;opacity:0.7;" class="form-control codeClient" required placeholder="Nom et prénom du client">
                  
  </div>
  
            <div class="form-group">
                <input type="text" style="font-size:13px;opacity:0.7;"  class="form-control input-produit codeproduit" required placeholder="Produit">
            </div>

    


               <div class="form-row mb-2">
                   
                   
                <div class="col">
                     <div class="md-form">
                        <a href="#" class="form-control btn btn-success valider-produit"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                </div>
                
                <div class="col">
                     <div class="md-form">
                        <a href="#" class="form-control btn btn-danger suppr"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      
                    </div>
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
                <td class="text-center"><a href="#" class="btn btn-success valid-commande1"style="font-size:13px;" >Valider <i class="fa fa-check-square" aria-hidden="true"></i></td>
                
                </tr>
        </tfoot>
 </table>
 <div style="postion:absolut;z-index:1000;margin-top:-230px " class="text-center collapse loading">
      <img id="ajax-loading" src="../images/loading.gif" alt="Loading" /> 
 </div>   
   
    
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
</div>


<!-- MODAL panier -->
<div class="modal fade fade-panier" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="../images/loading.gif" alt="photo loading">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>





     
         




     
         
