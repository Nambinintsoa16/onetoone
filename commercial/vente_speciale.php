  <h5 class="text-center" style="padding-top:10px;padding-bottom:20px;">ENREGISTREMENT VENTE SPECIALE</h5>
  
  <form class="text-center" style="color: #757575;" action="#!">
 
      
            <div class="form-group">
                <input type="text" style="font-size:13px;opacity:0.7;" class="form-control ville" required placeholder="Ville">
            </div>


            <div class="form-group">
                <input type="text" style="font-size:13px;opacity:0.7;" class="form-control quartier" required placeholder="Quartier">
            </div>

        
            
             
             
             <div class="form-group">
                 <a href="#" class="btn btn-primary form-control" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Nouveau client</a>
            </div>
             
             
    <div id="demo" class="collapse form-group">
                 
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
               <select class="form-control sexe">
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
                       <input type="year" style="font-size:13px;opacity:0.7;" class="form-control anne" required placeholder="Année">
                    </div>
                </div>
            </div>
            
            
            
  </div>
  
  
  <div class="form-group">
                 <a href="#" class="btn btn-primary form-control" class="btn btn-primary" data-toggle="collapse" data-target="#exist">Client déjà enregistré</a>
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
                  <label style="font-size:10px;">Sous total :<span class="sous"></span></label>
                  </td>

                  <td>
                  <label class="total text-center" style="font-size:10px;">00 Ar</label>
                </td>
                <td class="text-center"><a href="#" class="btn btn-success valid-commande-speciale"style="font-size:13px;">Valider <i class="fa fa-check-square" aria-hidden="true"></i></td>
                
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








     
         
